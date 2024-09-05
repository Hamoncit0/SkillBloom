<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calificar Curso</title>
    <link rel="stylesheet" href="../css/calificacion-usu.css">
</head>
<body>
    <div class="container">
        <h2>Calificar Curso</h2>
        <div class="course-title">Nombre del Curso</div>
        <form action="#" method="post">
            <div class="stars">
                <input type="radio" name="rating" id="star5" value="5">
                <label for="star5">&#9733;</label>
                <input type="radio" name="rating" id="star4" value="4">
                <label for="star4">&#9733;</label>
                <input type="radio" name="rating" id="star3" value="3">
                <label for="star3">&#9733;</label>
                <input type="radio" name="rating" id="star2" value="2">
                <label for="star2">&#9733;</label>
                <input type="radio" name="rating" id="star1" value="1">
                <label for="star1">&#9733;</label>
            </div>
            <textarea name="comentario" placeholder="Escribe un comentario sobre el curso..."></textarea>
            <button type="submit">Enviar Calificación</button>
        </form>
    </div>
</body>
</html>
