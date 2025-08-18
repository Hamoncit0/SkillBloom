<?php

require 'clases/controllers/CategoryController.php';
require 'clases/controllers/CourseController.php';
require 'clases/entities/User.php';
$categoryController = new CategoryController();

$categoryList = $categoryController->getCategories();

$courseController = new CourseController();
// Iniciar la sesión si no está ya iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['user'])) {
    $userId = $_SESSION['user']->id;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $courseData = json_decode($_POST['course'], true);

    $newCourse = new Course();
    $newCourse->title =  $courseData['title'];
    $newCourse->description =  $courseData['description'];
    $newCourse->idCategory =  $courseData['idCategory'];
    $newCourse->price =  $courseData['price'];
    $newCourse->idInstructor = $userId;

    // Manejar la imagen y el video
    $newCourse->previewImage = $_POST['previewImage'];

    if (isset($_FILES['previewVideo']) && $_FILES['previewVideo']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = __DIR__ . '/uploads/videos/'; // Carpeta donde se guardarán los videos
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true); // Crear la carpeta si no existe
        }

        $videoName = uniqid('video_', true) . '.' . pathinfo($_FILES['previewVideo']['name'], PATHINFO_EXTENSION);
        $videoPath = $uploadDir . $videoName;

        if (move_uploaded_file($_FILES['previewVideo']['tmp_name'], $videoPath)) {
            $newCourse->previewVideoPath = '/uploads/videos/' . $videoName; // Ruta accesible para la aplicación
        } else {
            echo json_encode(['error' => 'Failed to save the video.']);
            exit;
        }
    } else {
        echo json_encode(['error' => 'No video file uploaded or an error occurred.']);
        exit;
    }

    $newCourseId = $courseController->createCourse($newCourse);


    $courseLevels = [];
    foreach ($_POST['levels'] as $index => $level) {
        $newLevel = new Level();
        $newLevel->title = $level['name'];
        $newLevel->description = $level['description'];

        // Manejar archivo de contenido
        if (isset($_FILES["levels"]["name"][$index]["content"]) && $_FILES["levels"]["error"][$index]["content"] === UPLOAD_ERR_OK) {
            $levelsDir = __DIR__ . '/uploads/levels/';
            if (!is_dir($levelsDir)) {
                mkdir($levelsDir, 0777, true);
            }

            $levelFileName = uniqid('level_', true) . '.' . pathinfo($_FILES["levels"]["name"][$index]["content"], PATHINFO_EXTENSION);
            $levelFilePath = $levelsDir . $levelFileName;

            if (move_uploaded_file($_FILES["levels"]["tmp_name"][$index]["content"], $levelFilePath)) {
                $newLevel->contentPath = '/uploads/levels/' . $levelFileName;
            } else {
                echo json_encode(['error' => 'Failed to save level content.']);
                exit;
            }
        }

        $courseLevels[] = $newLevel;
    }

    $levelsId = $courseController->createLevel($courseLevels);

    $courseController->bindLevelToCourse($newCourseId, $levelsId);
    

    echo json_encode(['success' => true, 'message' => 'Course created successfully.']);
    exit;
}

require 'views/newCourse.view.php';