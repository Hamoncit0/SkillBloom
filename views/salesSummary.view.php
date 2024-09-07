<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resumen de Ventas por Curso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/ventas.css">
</head>
<body>
    <header>
        <?php include 'partials/nav.php'; ?>
    </header>

    <div class="container">
        <h1>Resumen de Ventas por Curso</h1>
        <div class="filters">
            <label for="date-range">Rango de Fechas:</label>
            <input type="date" id="start-date">
            <input type="date" id="end-date">
            
            <label for="category">Categoría:</label>
            <select id="category">
                <option value="all">Todas</option>
                <option value="category1">Categoría 1</option>
                <option value="category2">Categoría 2</option>
            </select>
            
            <label for="status">Estado del Curso:</label>
            <select id="status">
                <option value="all">Todos</option>
                <option value="active">Activos</option>
            </select>
        </div>

        <div class="table-container">
            <table class="sales-table">
                <thead>
                    <tr>
                        <th>Nombre del Curso</th>
                        <th>Alumnos Inscritos</th>
                        <th>Nivel Promedio</th>
                        <th>Total de Ingresos</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Curso 1</td>
                        <td>120</td>
                        <td>3.5</td>
                        <td>$5000</td>
                    </tr>
                    <tr>
                        <td>Curso 2</td>
                        <td>80</td>
                        <td>4.2</td>
                        <td>$3200</td>
                    </tr>

                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3">Total de Ingresos por Todos los Cursos:</td>
                        <td>$8200</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

