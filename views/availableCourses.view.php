<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Cursos Disponibles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/availableCourses.css">
    <script src="scripts.js" defer></script>
</head>
<body>
    <div class="container">
    <header>
            <?php include 'partials/nav.php'; ?>
        </header>
        <main>
            <section id="cursos">
                <h2 class="title text-center">Cursos Disponibles</h2>
                <div class="filters">
                    <label for="course-filter">Filtrar Cursos:</label>
                    <select id="course-filter">
                        <option value="mejores-calificados">Mejores Calificados</option>
                        <option value="mas-vendidos">Más Vendidos</option>
                        <option value="mas-recientes">Más Recientes</option>
                    </select>

                    <label for="category-filter">Categorías:</label>
                    <select id="category-filter">
                        <option value="categoria1">Categoría 1</option>
                        <option value="categoria2">Categoría 2</option>
                        <option value="categoria3">Categoría 3</option>
                    </select>
                </div>
                <div class="courses-container">
                    <div class="course">
                        <img src="ruta_a_imagen_del_curso.jpg" alt="Imagen del Curso">
                        <h4>Curso de Programación Web</h4>
                        <p><strong>Promedio de Calificación:</strong> 4.5/5</p>
                        <p><strong>Ingresos:</strong> $499.99</p>
                        <p><strong>Personas Inscritas:</strong> 50</p>
                        <p><strong>Cantidad de Comentarios:</strong> 20</p>
                        <button>Ver Más</button>
                    </div>
                    <div class="course">
                        <img src="ruta_a_imagen_del_curso.jpg" alt="Imagen del Curso">
                        <h4>Curso de Programación Web</h4>
                        <p><strong>Promedio de Calificación:</strong> 4.2/5</p>
                        <p><strong>Ingresos:</strong> $399.99</p>
                        <p><strong>Personas Inscritas:</strong> 40</p>
                        <p><strong>Cantidad de Comentarios:</strong> 15</p>
                        <button>Ver Más</button>
                    </div>
                    <div class="course">
                        <img src="ruta_a_imagen_del_curso.jpg" alt="Imagen del Curso">
                        <h4>Curso de Programación Web</h4>
                        <p><strong>Promedio de Calificación:</strong> 4.8/5</p>
                        <p><strong>Ingresos:</strong> $599.99</p>
                        <p><strong>Personas Inscritas:</strong> 60</p>
                        <p><strong>Cantidad de Comentarios:</strong> 25</p>
                        <button>Ver Más</button>
                    </div>
                    <div class="course">
                        <img src="ruta_a_imagen_del_curso.jpg" alt="Imagen del Curso">
                        <h4>Curso de Programación Web</h4>
                        <p><strong>Promedio de Calificación:</strong> 4.0/5</p>
                        <p><strong>Ingresos:</strong> $299.99</p>
                        <p><strong>Personas Inscritas:</strong> 30</p>
                        <p><strong>Cantidad de Comentarios:</strong> 10</p>
                        <button>Ver Más</button>
                    </div>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
                </div>
            </section>
        </main>
        <?php include 'footer.php'; ?>
    </div>
</body>
</html>
