<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curso - Nivel 1</title>
    <link rel="stylesheet" href="../css/nivel.css">
</head>
<body>
    <header>
        <?php include 'partials/nav.php'; ?>
    </header>
    <div class="course-container">
        <div class="course-header">
            <h1>Curso: [Nombre del Curso]</h1>
            <p>Descripción: [Descripción del Curso]</p>
        </div>

        <div class="course-content">
            <h2>Nivel 1: [Nombre del Nivel]</h2>
            <p>[Descripción del Nivel]</p>

            <div class="video-container">
                <h3>Video del Nivel</h3>
                <video controls>
                    <source src="video_nivel1.mp4" type="video/mp4">
                    Tu navegador no soporta la reproducción de videos.
                </video>
            </div>

            <div class="additional-content">
                <h3>Contenido Adicional</h3>
                <ul>
                    <li><a href="documento1.pdf" target="_blank">Descargar PDF</a></li>
                    <li><a href="https://link-externo.com" target="_blank">Visitar Página Externa</a></li>
                    <li><img src="imagen1.jpg" alt="Imagen Relacionada"></li>
                </ul>
            </div>
        </div>

        <div class="task-submission">
            <h3>Entrega de Tarea</h3>
            <p>Descripción de la tarea.</p>
            <form action="subir_tarea.php" method="post" enctype="multipart/form-data">
                <label for="file">Subir archivo:</label>
                <input type="file" id="file" name="file" required>
                <button type="submit">Enviar Tarea</button>
            </form>
        </div>

        <div class="course-navigation">
            <button onclick="goToPreviousLevel()">Nivel Anterior</button>
            <button onclick="goToNextLevel()">Siguiente Nivel</button>
        </div>
    </div>
</body>
</html>
