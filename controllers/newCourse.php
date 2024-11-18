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
    $newCourse->previewImage = $courseData['previewImage'];

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

    $levelsData = json_decode($_POST['levels'], true);

    $courseLevels = [];
    foreach ($levelsData as $level) {
        $newLevel = new Level();
        $newLevel->title = $level['name'];
        $newLevel->description = $level['description'];
        $newLevel->contentPath = 'contenido';

        $courseLevels[] = $newLevel;
    }

    $levelsId = $courseController->createLevel($courseLevels);

    $courseController->bindLevelToCourse($newCourseId, $levelsId);
    

    echo json_encode(['success' => true]);
}

function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

require 'views/newCourse.view.php';