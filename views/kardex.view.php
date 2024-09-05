<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kardex de Cursos</title>
    <link rel="stylesheet" href="../css/kardex.css"> 
</head>
<body>
    <header>
        <?php include 'partials/nav.php'; ?>
    </header>

    <div class="container">

        <h1 class="title">Kardex de Cursos</h1>

        <div class="filters">
            <div>
                <label for="date-range">Rango de Fechas:</label>
                <input type="date" id="start-date" name="start-date">
                <input type="date" id="end-date" name="end-date">
            </div>
            <div>
                <label for="category">Categoría:</label>
                <select id="category" name="category">
                    <option value="all">Todas</option>
                    <option value="categoria1">Categoría 1</option>
                    <option value="categoria2">Categoría 2</option>

                </select>
            </div>
            <div>
                <label for="status">Estado del Curso:</label>
                <select id="status" name="status">
                    <option value="all">Todos</option>
                    <option value="completed">Solo Cursos Terminados</option>
                    <option value="active">Solo Cursos Activos</option>
                </select>
            </div>
        </div>


        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Título del Curso</th>
                        <th>Progreso</th>
                        <th>Fecha de Inscripción</th>
                        <th>Última Fecha de Ingreso</th>
                        <th>Fecha de Terminación</th>
                        <th>Estado del Curso</th>
                        <th>Categoría</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Curso de Desarrollo Web</td>
                        <td>75%</td>
                        <td>01/03/2024</td>
                        <td>15/07/2024</td>
                        <td>30/07/2024</td>
                        <td>Completado</td>
                        <td>Desarrollo</td>
                    </tr>
                    <tr>
                        <td>Introducción a Python</td>
                        <td>40%</td>
                        <td>15/05/2024</td>
                        <td>20/07/2024</td>
                        <td>N/A</td>
                        <td>Activo</td>
                        <td>Programación</td>
                    </tr>

                </tbody>
            </table>
        </div>


        <button>Exportar a PDF</button>
    </div>
</body>
</html>
