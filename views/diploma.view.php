<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificado de Curso</title>
    <link rel="stylesheet" href="../css/certificado.css">
</head>
<body>

    <div class="certificate-container">
        <div class="certificate-header">
            <h1>Certificado de Finalización</h1>
            <img src="logo.png" alt="Logo de la Institución" class="logo">
        </div>
        <div class="certificate-body">
            <p>Se certifica que</p>
            <h2 id="student-name">Nombre del Alumno</h2>
            <p>ha completado satisfactoriamente el curso</p>
            <h3 id="course-title">Título del Curso</h3>
            <p>el día</p>
            <h4 id="completion-date">Fecha de Terminación</h4>
            <p>Certificado por:</p>
            <h4 id="instructor-name">Nombre del Instructor</h4>
        </div>
        <div class="certificate-footer">
            <p>Firma del Instructor</p>
        </div>
        <button class="print-button" onclick="printCertificate()">Imprimir Certificado</button>

        <button class="print-button" onclick="printCertificate()">Volver</button>
    </div>

    <script>
        function printCertificate() {
            window.print();
        }
    </script>
</body>
</html>
