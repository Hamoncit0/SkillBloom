<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de Inscritos por Curso</title>
    <link rel="stylesheet" href="../css/ventas.css">
</head>
<body>
    
<header>
            <?php include 'partials/nav.php'; ?>
        </header>

    <div class="container">
        <h1>Detalle de Inscritos por Curso</h1>
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
        <table class="details-table">
            <thead>
                <tr>
                    <th>Nombre del Alumno</th>
                    <th>Fecha de Inscripción</th>
                    <th>Nivel de Avance</th>
                    <th>Precio Pagado</th>
                    <th>Forma de Pago</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Alumno 1</td>
                    <td>2024-08-20</td>
                    <td>3</td>
                    <td>$50</td>
                    <td>Tarjeta de Crédito</td>
                </tr>
                <tr>
                    <td>Alumno 2</td>
                    <td>2024-08-21</td>
                    <td>2</td>
                    <td>$30</td>
                    <td>Paypal</td>
                </tr>
                <!-- Más alumnos -->
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4">Total de Ingresos por Curso:</td>
                    <td>$80</td>
                </tr>
            </tfoot>
        </table>
    </div>
    </div>
</body>
</html>
