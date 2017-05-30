<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registro de usuario</title>
    <link rel="stylesheet" href="css.css">
  </head>
  <body>

      <h2>Formulario de registro</h2>
      <form method="post" action="registro.php">
        <label for="fname">Nombre</label>
        <input type="text"  name="nombre"

        <label for="lname">Apellidos</label>
        <input type="text"  name="apellidos">

        <label for="user">Mail</label>
        <input type="text"  name="mail">

        <label for="pass0">Contraseña</label>
        <input type="password"  name="pass0">

        <label for="pass1">Repite Contraseña</label>
        <input type="password"  name="pass1">

        <input type="hidden" name="accion" value="registro">

        <input type="submit" value="Registrar">
      </form>
      <?php
      $comprobacion=0;
      if (isset($_POST['mail']) && isset($_POST['nombre']) && isset($_POST['apellidos']) && isset($_POST['pass0']) && isset($_POST['pass1'])) {
        include 'usuario.php';
        $usuario = new Usuario();
        $tabla=$usuario->Comprobaremail($_POST['mail']);
        if ($tabla==null) {
          echo "El correo ya esta registrado.";
        }else {
          if ($_POST['pass0']==$_POST['pass1']) {
            $resultado=$usuario->insertarusuario($_POST["nombre"],  $_POST["apellidos"], $_POST["mail"], $_POST["pass0"]);
            if ($resultado==null) {
              echo "Error";
            }else {
              echo "Registro correcto";
              echo "<br>";
              echo "<a href='index.php'>IR A LOGIN</a>";
              }
            }else {
              echo "<a href='registro.php'>Algo falla, revisa tu contraseña.</a>";
          }
        }
      }
       ?>
  </body>
</html>
