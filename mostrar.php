<?php
session_start();

// Inicializar variables de sesión si no están establecidas
if (!isset($_SESSION['idioma'])) {
    $_SESSION['idioma'] = "Español"; // Establecer idioma predeterminado como Español
}

if (!isset($_SESSION['perfil'])) {
    $_SESSION['perfil'] = "No"; // Establecer perfil predeterminado como No
}

if (!isset($_SESSION['horario'])) {
    $_SESSION['horario'] = "GMT-2"; // Establecer zona horaria predeterminada como GMT-2
}

// Manejar el envío del formulario para eliminar preferencias y reestablecer en default para que no haya errores
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_destroy();
    $_SESSION = array();
    $correcto = "Preferencias reestablecidas a default";
}

// Obtener variables de sesión o usar valores predeterminados
$idioma = isset($_SESSION['idioma']) ? $_SESSION['idioma'] : "Español";
$perfil = isset($_SESSION['perfil']) ? $_SESSION['perfil'] : "No";
$horario = isset($_SESSION['horario']) ? $_SESSION['horario'] : "GMT-2";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
        <fieldset>
            <legend>Preferencias</legend>
            <?php if (!empty($correcto)) { ?>
                <p><?= $correcto ?></p>
            <?php } ?>
            <div>
                <label for="idioma">Idioma</label>
                <p><?= $idioma ?></p>
            </div>
            <div>
                <label for="perfil">Perfil público</label>
                <p><?= $perfil ?></p>
            </div>
            <div>
                <label for="horario">Zona horaria</label>
                <p><?= $horario ?></p>
            </div>
            <input type="submit" value="Borrar preferencias">
            <a href="index.php">Establecer preferencias</a>
        </fieldset>
    </form>
</body>

</html>
