<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago con PayPal</title>
    <link rel="stylesheet" href="../css/fpago.css">
</head>
<body>
    <div class="container">
        <h1>Pago con PayPal</h1>
        <p>Serás redirigido a PayPal para completar tu pago.</p>
        <div class="paypal-button-container">
            <p>Si no eres redirigido automáticamente, haz clic en el siguiente botón:</p>
            <a href="https://www.paypal.com" class="button">Pagar con PayPal</a>
        </div>
        <script>
            setTimeout(function() {
                window.location.href = "https://www.paypal.com";
            }, 5000); 
        </script>
    </div>
</body>
</html>
