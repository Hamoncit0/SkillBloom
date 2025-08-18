<?php

require 'clases/controllers/CategoryController.php';
require 'clases/controllers/CourseController.php';
require 'clases/entities/User.php';

$categoryController = new CategoryController();

$categoryList = $categoryController->getCategories();

// Capturar el ID del curso desde la URL
$courseId = $_GET['id'] ?? null;

if (!$courseId) {
    // Manejar el caso en el que no se proporciona un ID válido
    die('Invalid course ID');
}

$courseController = new CourseController();

// Obtener los detalles del curso
$course = $courseController->getCourseById($courseId);

if (!$course) {
    // Manejar el caso en el que no se encuentra el curso
    die('Course not found');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $courseData = json_decode($_POST['course'], true);

    $newCourse = new Course();
    $newCourse->id = $course->id;
    $newCourse->title = $courseData['title'];
    $newCourse->description = $courseData['description'];
    $newCourse->idCategory = $courseData['idCategory'];
    $newCourse->price = $courseData['price'];

    // Manejar el video (previewVideo)
    $videoStatus = $_POST['previewVideoStatus'] ?? 'unchanged';
    if ($videoStatus === 'updated' && isset($_FILES['previewVideo']) && $_FILES['previewVideo']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = __DIR__ . '/uploads/videos/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $videoName = uniqid('video_', true) . '.' . pathinfo($_FILES['previewVideo']['name'], PATHINFO_EXTENSION);
        $videoPath = $uploadDir . $videoName;

        if (move_uploaded_file($_FILES['previewVideo']['tmp_name'], $videoPath)) {
            $newCourse->previewVideoPath = '/uploads/videos/' . $videoName;
        } else {
            echo json_encode(['error' => 'Failed to save the video.']);
            exit;
        }
    } elseif ($videoStatus === 'deleted') {
        $newCourse->previewVideoPath = null;
    } else {
        $newCourse->previewVideoPath = $course->previewVideoPath;
    }

    // Manejar la imagen (previewImage)
    $imageStatus = $_POST['previewImageStatus'] ?? 'unchanged';
    if ($imageStatus === 'updated') {
        $newCourse->previewImage = $_POST['previewImage'];
    } else {
        $newCourse->previewImage = $course->previewImage;
    }

    // Guardar el curso en la base de datos
    $newCourseId = $courseController->editCourse($newCourse);

    // Manejar niveles
    $existingLevels = $course->levels;
    $newLevels = $_POST['levels']; // Niveles enviados desde el frontend

    $newLevelsIds = [];
    
    $allLevelIds = []; // Aquí se acumularán todas las IDs de los niveles
    // Actualizar niveles existentes
    foreach ($newLevels as $index => $levelData) {
        if (isset($existingLevels[$index])) {
            // Nivel existente, actualizar
            $existingLevel = $existingLevels[$index];
            $existingLevel->title = $levelData['name'];
            $existingLevel->description = $levelData['description'];

            if (isset($_FILES["levels"]["name"][$index]["content"]) && $_FILES["levels"]["error"][$index]["content"] === UPLOAD_ERR_OK) {
                $levelsDir = __DIR__ . '/uploads/levels/';
                if (!is_dir($levelsDir)) {
                    mkdir($levelsDir, 0777, true);
                }

                $levelFileName = uniqid('level_', true) . '.' . pathinfo($_FILES["levels"]["name"][$index]["content"], PATHINFO_EXTENSION);
                $levelFilePath = $levelsDir . $levelFileName;

                if (move_uploaded_file($_FILES["levels"]["tmp_name"][$index]["content"], $levelFilePath)) {
                    $existingLevel->contentPath = '/uploads/levels/' . $levelFileName;
                }
            }

            $courseController->editLevel($existingLevel);
            $allLevelIds[] = $existingLevel->id; // Agregar ID a la lista
        } else {
            // Nivel nuevo, agregar
            $newLevel = new Level();
            $newLevel->title = $levelData['name'];
            $newLevel->description = $levelData['description'];

            if (isset($_FILES["levels"]["name"][$index]["content"]) && $_FILES["levels"]["error"][$index]["content"] === UPLOAD_ERR_OK) {
                $levelsDir = __DIR__ . '/uploads/levels/';
                if (!is_dir($levelsDir)) {
                    mkdir($levelsDir, 0777, true);
                }

                $levelFileName = uniqid('level_', true) . '.' . pathinfo($_FILES["levels"]["name"][$index]["content"], PATHINFO_EXTENSION);
                $levelFilePath = $levelsDir . $levelFileName;

                if (move_uploaded_file($_FILES["levels"]["tmp_name"][$index]["content"], $levelFilePath)) {
                    $newLevel->contentPath = '/uploads/levels/' . $levelFileName;
                }
            }

            $newLevelId= $courseController->createLevelSingle($newLevel);
            $allLevelIds[] = $newLevelId; // Agregar ID a la lista
        }
    }

    $courseController->deleteOrder($course->id);
    // Eliminar niveles sobrantes
    if (count($newLevels) < count($existingLevels)) {
        for ($i = count($newLevels); $i < count($existingLevels); $i++) {
            $courseController->deleteLevel($existingLevels[$i]->id);
        }
    }

    $courseController->bindLevelToCourse($course->id, $allLevelIds);

    echo json_encode(['success' => true, 'message' => 'Course and levels updated successfully.']);
    exit;
}


require 'views/editCourse.view.php';