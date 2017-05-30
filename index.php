<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registro de usuario</title>
    <link rel="stylesheet" href="css.css">
  </head>
  <body>
    <div>
      <h2>Formulario de Login</h2>
      <form method="post" action="index.php">
        <label for="fname">Usuario</label>
        <input type="text"  name="nombre"

        <label for="pass0">Contraseña</label>
        <input type="password"  name="pass0">

        <input type="hidden" name="accion" value="login">
        <input type="submit" value="login">
        <a href="registro.php"><input type="button" value="registrar" /></a>
      </form>
      <?php
    if (isset($_POST['nombre']) && isset($_POST['pass0'])) {
      include 'usuario.php';
      include 'seguridad.php';
      $usuario = new usuario();
      $sesion = new Seguridad();
      $registrado=$usuario->buscarUsuario($_POST['nombre']);
      if ($registrado!=null) {
        //Si la contraseña que ponemos para conectarnos es la misma que tenemos en la
        //base de datos entonces el usuario se puede loguear
        if ($registrado['pass']==sha1($_POST['pass0'])) {
          echo "Usuario logueado";
          $sesion->addUsuario($registrado['nombre']);
          header('Location: miperfil.php');
        }else {
          echo "Usuario o contraseña incorrectas";
        }
      }else {
        echo "Usuario no encontrado";
      }
    }
     ?>

  </body>
</html>
