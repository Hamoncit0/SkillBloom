<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forma de Pago</title>
    <!-- Incluir Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Incluir tu propio archivo CSS -->
    <link rel="stylesheet" href="../css/Fpago.css">
</head>
<body>
    <div class="container payment-form">
        <h2 class="text-center">Selecciona tu Método de Pago</h2>

        <form id="paymentForm" action="" method="POST">
            <div class="mb-4">
                <label class="form-label">Opciones de Pago:</label>
                <div class="form-check payment-option">
                    <input class="form-check-input" type="radio" name="paymentMethod" id="bankTransfer" value="transfer" required>
                    <label class="form-check-label" for="bankTransfer">
                        Transferencia Bancaria
                    </label>
                </div>
                <div class="form-check payment-option">
                    <input class="form-check-input" type="radio" name="paymentMethod" id="paypal" value="paypal" required>
                    <label class="form-check-label" for="paypal">
                        PayPal
                    </label>
                </div>
            </div>

            <!-- Información de Transferencia Bancaria -->
            <div id="bankTransferInfo" class="d-none">
                <h5>Detalles para Transferencia Bancaria</h5>
                <p>Realiza tu transferencia a la siguiente cuenta:</p>
                <ul>
                    <li><strong>Banco:</strong> Nombre del Banco</li>
                    <li><strong>Cuenta:</strong> 1234567890</li>
                    <li><strong>CLABE:</strong> 123456789012345678</li>
                </ul>
            </div>

            <!-- Información de PayPal -->
            <div id="paypalInfo" class="d-none">
                <h5>Pagar con PayPal</h5>
                <p>Serás redirigido a PayPal para completar tu pago.</p>
            </div>

            <button type="submit" class="btn btn-primary">Pagar</button>
        </form>
    </div>

    <!-- Incluir Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Incluir tu archivo JavaScript -->
    <script src="js/pagos.js"></script>
</body>
</html>
