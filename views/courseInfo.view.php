<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Curso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/info-curso.css">
</head>
<body>
<header>
            <?php include 'partials/nav.php'; ?>
        </header>

    <div class="course-details-container">
        <div class="course-info">
            <h2 class="title text-center">Nombre del Curso</h2>
            <p><strong>Categoría:</strong> Programación</p>
            <p><strong>Descripción:</strong> Aprende los fundamentos de la programación con este curso intensivo.</p>
            <p><strong>Promedio de Calificación:</strong> 4.5/5.0</p>
            <div class="rating-stars">
                <span>★★★★☆</span>
            </div>
            <button class="btn-inscribirse">Inscribirse</button>
        </div>
        
        <div class="course-comments">
            <h3>Comentarios</h3>
            <div class="comment">
                <p><strong>Usuario:</strong> Juan Pérez</p>
                <p><strong>Fecha:</strong> 25/08/2024</p>
                <p><strong>Comentario:</strong> Excelente curso, muy recomendado.</p>
            </div>

        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </div>
</body>