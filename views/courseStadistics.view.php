<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Level Statistics</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/estadisticas.css">
    
</head>
<body>
<header>
            <?php include 'partials/nav.php'; ?>
        </header>
    <div class="stats-container">
        <h1>Level 1: Introduction to Course</h1>
        
        <div class="stats-grid">
            <div class="stat-card">
                <h2>Inscritos</h2>
                <p>150</p>
            </div>
            <div class="stat-card">
                <h2>Ganancias</h2>
                <p>$2,500.00</p>
            </div>
            <div class="stat-card">
                <h2>Calificación Promedio</h2>
                <div class="circle-chart" data-percentage="90">
                    <div class="circle-chart-inner">
                        <span>4.5 / 5</span>
                    </div>
                </div>
            </div>
            <div class="stat-card">
                <h2>Comentarios</h2>
                <ul class="comments">
                    <li>"Excelente curso, muy recomendable."</li>
                    <li>"Buena introducción, pero esperaba más detalle."</li>
                    <li>"Muy claro y conciso, perfecto para principiantes."</li>
                </ul>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </div>
</body>
</html>

