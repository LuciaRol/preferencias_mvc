<?php
session_start();

// Inicializar variables de sesión si no están establecidas
if (!isset($_SESSION['idioma'])) {
    $_SESSION['idioma'] = "Español"; // Establecer idioma predeterminado como Español
}

if (!isset($_SESSION['perfil'])) {
    $_SESSION['perfil'] = "No"; // Establecer perfil predeterminado como 'No'
}

if (!isset($_SESSION['horario'])) {
    $_SESSION['horario'] = "GMT-2"; // Establecer zona horaria predeterminada como GMT-2
}

// Manejar el envío del formulario para eliminar preferencias y reestablecer las variables por defecto para que no haya errores
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_destroy();
    $_SESSION = array();
    $correcto = "Preferencias predeterminadas reestablecidas";
}
 
// Obtener variables de sesión o usar los valores predeterminados
$idioma = isset($_SESSION['idioma']) ? $_SESSION['idioma'] : "Español";
$perfil = isset($_SESSION['perfil']) ? $_SESSION['perfil'] : "No";
$horario = isset($_SESSION['horario']) ? $_SESSION['horario'] : "GMT-2";
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Mostrar preferencias</title>
</head>

<body>
    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
        <fieldset>
            <h1>Preferencias establecidas</h1>
            <?php if (!empty($correcto)) { ?>
                <p><?= $correcto ?></p>
            <?php } ?>
            <div>
                <h4 for="idioma">Idioma</h4>
                <p><?= $idioma ?></p>
            </div>
            <div>
                <h4 for="perfil">Perfil público</h4>
                <p><?= $perfil ?></p>
            </div>
            <div>
                <h4 for="horario">Zona horaria</h4>
                <p><?= $horario ?></p>
            </div>
            <input type="submit" value="Borrar preferencias">
            <a href="index.php">Establecer preferencias</a>
        </fieldset>
    </form>
</body>

</html>
