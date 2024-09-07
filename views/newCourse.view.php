<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Curso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/crearc.css"> 
</head>
<body>
    <header>
        <nav>
        <img src="../../imagenes/SkillBloom_icon.png" alt="Logo" class="logo">
            <a href="dashboard.html">Cursos Disponibles</a>
            <a href="perfil.html">Perfil</a>
            <a href="mensajes.html">Mensajes</a>
            <div class="search-container">
                <form action="buscar_cursos.php" method="get">
                    <input type="text" name="query" placeholder="Buscar cursos...">
                    <button type="submit">Buscar</button>
                </form>
            </div>
            <a href="busqueda-avanzada.html" class="advanced-search-link">Búsqueda Avanzada</a>
        </nav>
    </header>

        <div class="course-form">
            <h2 class="title text-center">Crear Curso</h2>
            <form id="courseForm">
                <div class="form-group">
                    <label for="title">Título del Curso</label>
                    <input type="text" id="title" name="title" required>
                </div>

                <div class="form-group">
                    <label for="description">Descripción General</label>
                    <textarea id="description" name="description" rows="4" required></textarea>
                </div>

                <div class="form-group">
                    <label for="cost">Costo del Curso</label>
                    <input type="number" id="cost" name="cost" step="0.01" required>
                </div>

                <div class="form-group">
                    <label for="image">Imagen del Curso</label>
                    <input type="file" id="image" name="image" accept="image/*" required>
                </div>

                <button type="submit">Crear Niveles</button>

                <h3 class="title text-center">Niveles del Curso</h3>
                <div class="level-form">
                    <h4 class="title text-center">Nivel 1</h4>
                    <div class="form-group">
                        <label for="levelTitle1">Título del Nivel</label>
                        <input type="text" id="levelTitle1" name="levelTitle1">
                    </div>
                    <div class="form-group">
                        <label for="levelDescription1">Descripción del Nivel</label>
                        <textarea id="levelDescription1" name="levelDescription1" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="levelVideo1">Video del Nivel</label>
                        <input type="file" id="levelVideo1" name="levelVideo1" accept="video/*" required>
                    </div>
                    <div class="form-group">
                        <label for="levelContent1">Contenido Adicional</label>
                        <input type="file" id="levelContent1" name="levelContent1" accept=".pdf, image/*">
                    </div>
                </div>

                <div class="level-form">
                    <h4 class="title text-center">Nivel 2</h4>
                    <div class="form-group">
                        <label for="levelTitle2">Título del Nivel</label>
                        <input type="text" id="levelTitle2" name="levelTitle2">
                    </div>
                    <div class="form-group">
                        <label for="levelDescription2">Descripción del Nivel</label>
                        <textarea id="levelDescription2" name="levelDescription2" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="levelVideo2">Video del Nivel</label>
                        <input type="file" id="levelVideo2" name="levelVideo2" accept="video/*" required>
                    </div>
                    <div class="form-group">
                        <label for="levelContent2">Contenido Adicional</label>
                        <input type="file" id="levelContent2" name="levelContent2" accept=".pdf, image/*">
                    </div>
                </div>

                <button type="submit">Crear Curso</button>
            </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </div>
</body>
</html>

