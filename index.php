<?php
   session_start();

   // Iniciamos unas variables por defecto: en español, perfil privado y hora GMT del meridiano
   if (!isset($_SESSION['idioma'])) {
       $_SESSION['idioma'] = "Español"; 
   }
   
   if (!isset($_SESSION['perfil'])) {
       $_SESSION['perfil'] = "No"; 
   }
   
   if (!isset($_SESSION['horario'])) {
       $_SESSION['horario'] = "GMT"; 
   }
   
   // Aquí va el posteado de las variables
   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
       if (!empty($_POST['idioma']) && !empty($_POST['perfil']) && !empty($_POST['horario'])) {
           $_SESSION['idioma'] = $_POST['idioma'];
           $_SESSION['perfil'] = $_POST['perfil'];
           $_SESSION['horario'] = $_POST['horario'];
           $correcto = "<span style='color: green;'>Información guardada</span>";
           
       } else {
        $error = "<span style='color: red;'>Faltan campos por rellenar</span>";

       }
   }
?>



<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Establecer preferencias</title>
</head>

<body>
<?php if(!empty($error)){?>
        <p><?= $error?></p>
    <?php }?>
    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        <fieldset>
            <h1>Establecer preferencias</h1>
            <?php if(!empty($correcto)){?>
                <p><?= $correcto?></p>
            <?php }?>
            <div>
                <label for="idioma">Idioma</label>
                <select name="idioma">
                    <option hidden></option>
                    <option value="Español" <?= $_SESSION['idioma']=="Español"?'selected':""?>>Español</option>
                    <option value="Ingles" <?= $_SESSION['idioma']=="Inglés"?'selected':""?>>Inglés</option>
                </select>
            </div>
            <div>
                <label for="perfil">Perfil publico</label>
                <select name="perfil">
                    <option hidden></option>
                    <option value="No" <?= $_SESSION['perfil']=="No"?'selected':""?>>No</option>
                    <option value="Si" <?= $_SESSION['perfil']=="Si"?'selected':""?>>Si</option>
                </select>
            </div>
            <div>
                <label for="horario">Zona horaria</label>
                <select name="horario">
                    <option hidden></option>
                    <option value="GMT-2" <?= $_SESSION['horario']=="GMT-2"?'selected':""?>>GMT-2</option>
                    <option value="GMT-1" <?= $_SESSION['horario']=="GMT-1"?'selected':""?>>GMT-1</option>
                    <option value="GMT" <?= $_SESSION['horario']=="GMT"?'selected':""?>>GMT</option>
                    <option value="GMT+1" <?= $_SESSION['horario']=="GMT+1"?'selected':""?>>GMT+1</option>
                    <option value="GMT+2" <?= $_SESSION['horario']=="GMT+2"?'selected':""?>>GMT+2</option>
                </select>
            </div>
            <input type="submit" value="Establecer preferencias">
            <a href="mostrar.php">Mostrar preferencias</a>
        </fieldset>
    </form>
</body>

</html>