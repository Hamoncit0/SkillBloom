<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Cursos Disponibles</title>
    <link rel="stylesheet" href="../css/dashboard.css">
</head>
<body>
    <div class="container">
    <header>
            <?php include 'partials/nav.php'; ?>
        </header>
        <main>
            <section id="cursos">
                <h2>Cursos Disponibles</h2>
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
                <div id="courses-container" class="courses-container">

                </div>
            </section>

            <div id="courses-container" class="courses-container">
                <div class="course">
                    <img src="ruta_a_imagen_del_curso.jpg" alt="Imagen del Curso">
                    <h4>Curso de Programación Web</h4>
                    <p>Aprende a desarrollar aplicaciones web desde cero. Este curso cubre HTML, CSS, JavaScript y más.</p>
                    <p><strong>Costo:</strong> $99.99</p>
                    <button onclick="location.href='/courseSeeMore';">Ver Más</button>
                </div>
                <div class="course">
                    <img src="ruta_a_imagen_del_curso.jpg" alt="Imagen del Curso">
                    <h4>Curso de Programación Web</h4>
                    <p>Aprende a desarrollar aplicaciones web desde cero. Este curso cubre HTML, CSS, JavaScript y más.</p>
                    <p><strong>Costo:</strong> $99.99</p>
                    <button>Ver Más</button>
                </div>
                <div class="course">
                    <img src="ruta_a_imagen_del_curso.jpg" alt="Imagen del Curso">
                    <h4>Curso de Programación Web</h4>
                    <p>Aprende a desarrollar aplicaciones web desde cero. Este curso cubre HTML, CSS, JavaScript y más.</p>
                    <p><strong>Costo:</strong> $99.99</p>
                    <button>Ver Más</button>
                </div>
                <div class="course">
                    <img src="ruta_a_imagen_del_curso.jpg" alt="Imagen del Curso">
                    <h4>Curso de Programación Web</h4>
                    <p>Aprende a desarrollar aplicaciones web desde cero. Este curso cubre HTML, CSS, JavaScript y más.</p>
                    <p><strong>Costo:</strong> $99.99</p>
                    <button>Ver Más</button>
                </div>
            </div>

        </main>

        <?php include 'partials/footer.php'; ?>
    </div>
</body>