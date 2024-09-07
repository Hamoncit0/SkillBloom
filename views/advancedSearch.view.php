<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Búsqueda Avanzada</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/busqueda.css">
    
</head>
<body>
    <header>
        <?php include 'partials/nav.php'; ?>
    </header>

        <h1>Búsqueda Avanzada de Cursos</h1>
    <main>
        <section class="search-advanced">
            <form action="#" method="GET">
                <div class="form-group">
                    <label for="title">Título del Curso</label>
                    <input type="text" id="title" name="title" placeholder="Buscar por título">
                </div>

                <div class="form-group">
                    <label for="category">Categoría</label>
                    <select id="category" name="category">
                        <option value="">Seleccionar Categoría</option>
                        <option value="programacion">Programación</option>
                        <option value="diseño">Diseño</option>
                        <option value="marketing">Marketing</option>
                        <!-- Agrega más opciones según sea necesario -->
                    </select>
                </div>

                <div class="form-group">
                    <label for="level">Nivel</label>
                    <select id="level" name="level">
                        <option value="">Seleccionar Nivel</option>
                        <option value="basico">Básico</option>
                        <option value="intermedio">Intermedio</option>
                        <option value="avanzado">Avanzado</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="price">Precio</label>
                    <select id="price" name="price">
                        <option value="">Seleccionar Rango de Precio</option>
                        <option value="gratis">Gratis</option>
                        <option value="bajo">Bajo</option>
                        <option value="medio">Medio</option>
                        <option value="alto">Alto</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="rating">Calificación</label>
                    <select id="rating" name="rating">
                        <option value="">Seleccionar Calificación</option>
                        <option value="5">5 estrellas</option>
                        <option value="4">4 estrellas</option>
                        <option value="3">3 estrellas</option>
                        <option value="2">2 estrellas</option>
                        <option value="1">1 estrella</option>
                    </select>
                </div>

                <div class="col-md-6">
                        <label for="keywords" class="form-label">Palabras Clave</label>
                        <input type="text" id="keywords" name="keywords" class="form-control" placeholder="Buscar por palabras clave">
                    </div>

                    <div class="col-12">
                        <button type="submit">Buscar</button>
                    </div>
            </form>
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
