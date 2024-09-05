<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Cursos - Estudiante</title>
    <link rel="stylesheet" href="../css/dashboard.css">
    <script src="scripts.js" defer></script>
</head>
<body>
    <div class="container">
    <header>
            <?php include 'partials/nav.php'; ?>
        </header>
        <main>
            <section id="cursos">
                <h2>Mis Cursos</h2>
                <div class="filters">
                    <label for="course-filter">Filtrar Cursos:</label>
                    <select id="course-filter">
                        <option value="en-progreso">En Progreso</option>
                        <option value="completados">Completados</option>
                        <option value="pendientes">Pendientes</option>
                    </select>
                </div>
                <div class="courses-container">
                    <div class="course">
                        <img src="ruta_a_imagen_del_curso.jpg" alt="Imagen del Curso">
                        <h4>Curso de Programación Web</h4>
                        <p><strong>Progreso:</strong> 60%</p>
                        <p><strong>Fecha de Inscripción:</strong> 01/06/2024</p>
                        <p><strong>Última Fecha de Ingreso:</strong> 15/08/2024</p>
                        <button>Continuar</button>
                    </div>
                    <div class="course">
                        <img src="ruta_a_imagen_del_curso.jpg" alt="Imagen del Curso">
                        <h4>Curso de Diseño Gráfico</h4>
                        <p><strong>Progreso:</strong> 30%</p>
                        <p><strong>Fecha de Inscripción:</strong> 15/07/2024</p>
                        <p><strong>Última Fecha de Ingreso:</strong> 20/08/2024</p>
                        <button>Continuar</button>
                    </div>
                    <div class="course">
                        <img src="ruta_a_imagen_del_curso.jpg" alt="Imagen del Curso">
                        <h4>Curso de Fotografía Avanzada</h4>
                        <p><strong>Progreso:</strong> 85%</p>
                        <p><strong>Fecha de Inscripción:</strong> 01/05/2024</p>
                        <p><strong>Última Fecha de Ingreso:</strong> 22/08/2024</p>
                        <button>Continuar</button>
                    </div>
                    <div class="course">
                        <img src="ruta_a_imagen_del_curso.jpg" alt="Imagen del Curso">
                        <h4>Curso de Marketing Digital</h4>
                        <p><strong>Progreso:</strong> 45%</p>
                        <p><strong>Fecha de Inscripción:</strong> 10/06/2024</p>
                        <p><strong>Última Fecha de Ingreso:</strong> 18/08/2024</p>
                        <button>Continuar</button>
                    </div>
                </div>
            </section>
        </main>
        <?php include 'partials/footer.php'; ?>
    </div>
</body>
</html>
