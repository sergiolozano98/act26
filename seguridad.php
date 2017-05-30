<?php
class Seguridad
{
private $usuario=null;
function __construct(){
  session_start();
  if(isset($_SESSION["nombre"])) $this->usuario=$_SESSION["nombre"];
}
  public function getUsuario(){
    return $this->usuario;
    echo   $_SESSION["mail"];
  }
  //OJO con SESSION En mayuscula siempre
 public function addUsuario($usuario)
  {
    $_SESSION["nombre"]=$usuario;
    $this->usuario=$usuario;
  }
  //creamos la funcion para que compruebe la coockie 
  public function cookies(){
  if (isset($_COOKIE['fondo'])) {
    $fondo=$_COOKIE['fondo'];
    return $fondo;
  }else{
    return null;
  }
}
}
 ?>
