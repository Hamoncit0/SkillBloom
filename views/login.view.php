
<?php require 'partials/head.php' ?>

<body>
    <div class="container mt-5">
        <div class="login-container">
            <h2>Inicio de Sesión</h2>
            
            <form action="dashboard" method="post">
                
            <div class="mb-3">
            <input type="email" name="email" class="form-control" placeholder="Correo electrónico" required>
            </div>
            <div class="mb-3">
            <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Iniciar Sesión</button>

            </form>
            <div class="links">
                <a href="/signup">¿No tienes una cuenta? Regístrate</a><br>
                <a href="/recoverPassword">Olvidé mi contraseña</a>
            </div>
        </div>
    </div>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1y5P7LTJbiT1wTR" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-mQ93F6bDQHn+qK+R6erMSeVZJq6kTX6blXTcti7Bnw1hbN+l3dYSBxC3w6DE7M9X" crossorigin="anonymous"></script>

</body>