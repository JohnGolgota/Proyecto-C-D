<?php include '../Inc/header.php'; ?>

<title>Carpe Diem | Bienvenido</title>

<?php include '../Inc/nav.php'; ?>

<div class="card-dialog ">
    <!-- Contenido en la ventana -->
    <div class="card-content align-items-center">

        <!-- Encabezado. Logo -->
        <div class="card-header">
            <img src="../Public/Img/favicon.png" alt="Logo" width="60px">
        </div>

        <!-- Cuerpo. Formulario -->
        <div class="card-body formularios formulario-inicio">

            <form action="UserController.php?action=session" class="" method="POST" novalidate>
                <input type="hidden" name="action" value="session">
                <input type="text" name="UsuarioIS" id="usuarioIS" placeholder="Nombre De Usuario" class="form-control shadow-none" required>
                <input type="password" name="ContrasenaIS" id="contrasenaIS" placeholder="Contraseña" class="form-control shadow-none" required>

                <input type="submit" value="¡Inicia Sesión!" class="btn btn-primary boton-card">
            </form>
        </div>

        <!-- Pie de pagina. metodos de inicio -->
        <div class="card-footer">
            <a href="UserController.php"><img src="../Public/Img/LogosRedes/facebook.png" alt="Facebook" width="50px"></a>
            <a href="#"><img src="../Public/Img/LogosRedes/instagram.png" alt="Google" width="50px"></a>
        </div>
    </div>
</div>
</div>

<?php include '../Inc/footer.php'; ?>