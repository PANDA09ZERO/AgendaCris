// views/usuario.php

<?php

session_start();

require_once __DIR__ . '/../controller/AuthController.php';

$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nombre = trim($_POST['txtUser'] ?? '');
    $clave = trim($_POST['txtPass'] ?? '');

    if ($nombre === '' || $clave === '') {

        $mensaje = 'Complete todos los campos';

    } else {

        $auth = new AuthController();

        if ($auth->login($nombre, $clave)) {

            header('Location: home.php');
            exit;
        }

        $mensaje = 'Correo o clave incorrectos';
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <meta name="description" content="Software de agenda util y facil de usar">
    <meta name="keywords" content="agenda,gratis,facil,interctiva">
    <meta name="author" content="Panda">

    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="icon"  href="../image/icono.ico">

    <title>Login - AgendaCris</title>

</head>
<body>
    <header>
    </header>
    <main>
        <div class="caja">
            <form action="" method="post" id="frmLogin">
                <img src="../image/agenda.png" alt="logo pe">
                <h1>Acceso al sistema</h1>
                <p>Credenciales</p>
                <input type="text" name="txtUser" id="txtUser" placeholder="Aquí va el usuario" required>
                <input type="password" name="txtPass" id="txtPass" placeholder="Aquí va la contraseña" required>
               <div class="buttons">
                <button type="submit" id="btnPrimary">Ingresar</button>
                <button type="reset" id="btnSecondary">Cancelar</button>
               </div>
            </form>
        </div>

    </main>
    <footer>

    </footer>
</body>
</html>