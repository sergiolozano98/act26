<?php
//incluimos los ficheros
include "usuario.php";
$usuario=new Usuario();
include "seguridad.php";
$seguridad = new Seguridad();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
  <style media="screen">
    body{
      /*le pasamos al bg color la coockie con el valor del color que queremos*/
      background-color: <?php echo $_COOKIE['fondo']?>
    }
  </style>
	</head>
<body>
<?php
if ($seguridad->getUsuario() == null) {
header('Location: index.php');
}
    echo "<form action='miperfil.php' method='post'>";
    $fila=$usuario->mostrarInfo($_SESSION["nombre"]);
     echo  "Nombre <input type='text' name='nombre' value='".$fila['nombre']."' readonly><br><br>";
     echo "Mail <input type='text' name='mail' value='".$fila['mail']."'><br><br>";;
     echo "Apellidos <input type='text' name='apellidos' value='".$fila['apellidos']."'><br><br>";
   ?>
   <!--Aqui creamos el select con el name colores para pasarselos mas adelenate y ponerlo en una cookie-->
<select name="colores">
  <option value="">Seleciona un color</option>
    <option value="yellow">Amarillo</option>
    <option value="blue">azul</option>
    <option value="red">rojo</option>
    <option value="green">verde</option>
    <option value="black">negro</option>
</select>
<br>
        <input type="hidden" name="accion" value="actualizar">
        <input type="submit" name="" value="actualizar">
      </form>
</body>
<?php
// aquii si existe el post colores lo pasamos a la coockie con la variable que hemos creado $background
  if (isset($_POST['colores'])) {
    $background=$_POST['colores'];
    setcookie('fondo',$background,time()+1);
  }
// FIN COOKIES

	if(isset($_POST["accion"])){
		if ($_POST["accion"]=="actualizar") {
		        $resultado=$usuario->actualizarUsuario($_POST['nombre'],$_POST['mail'],$_POST['apellidos']);
		        if($resultado!=true){
		           echo "<h2>usuario actualizado</h2></br>";
		        }else{
		          echo "Error</br>";
		        }
		}
	}

?>
</html>
