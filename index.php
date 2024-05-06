<?php
   session_start();

   // Iniciamos unas variables por defecto
   if (!isset($_SESSION['idioma'])) {
       $_SESSION['idioma'] = "Español"; 
   }
   
   if (!isset($_SESSION['perfil'])) {
       $_SESSION['perfil'] = "No"; 
   }
   
   if (!isset($_SESSION['horario'])) {
       $_SESSION['horario'] = "GMT-2"; 
   }
   
   // Aquí va el posteado de las varaibles
   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
       if (!empty($_POST['idioma']) && !empty($_POST['perfil']) && !empty($_POST['horario'])) {
           $_SESSION['idioma'] = $_POST['idioma'];
           $_SESSION['perfil'] = $_POST['perfil'];
           $_SESSION['horario'] = $_POST['horario'];
           $correcto = "Información guardada";
       } else {
           $error = "Faltan campos por rellenar";
       }
   }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<?php if(!empty($error)){?>
        <p><?= $error?></p>
    <?php }?>
    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        <fieldset>
            <legend>Preferencias</legend>
            <?php if(!empty($correcto)){?>
                <p><?= $correcto?></p>
            <?php }?>
            <div>
                <label for="idioma">Idioma</label>
                <select name="idioma">
                    
                    <option hidden></option>
                    <option value="Español" <?= $_SESSION['idioma']=="Español"?'selected':""?>>Español</option>
                    <option value="Ingles" <?= $_SESSION['idioma']=="Ingles"?'selected':""?>>Ingles</option>
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