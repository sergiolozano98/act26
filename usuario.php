<?php
include "db.php";
/**
 *
 */
class Usuario extends db
{
  function __construct()
  {
    //De esta forma realizamos la conexion a la base de datos
    parent::__construct();
  }
  //Insertamos un nuevo usuario
  function insertarUsuario($nombre,$apellidos,$mail,$pass){
    //Construimos la consulta
    $sql="INSERT INTO usuario (id,nombre,apellidos,mail,pass)
          VALUES (NULL, '".$nombre."', '".$apellidos."','".$mail."', '".sha1($pass)."')";
    //Realizamos la consulta
    $resultado=$this->realizarConsulta($sql);
    if($resultado!=false){
      //Recogemos el ultimo usuario insertado
      $sql="SELECT * from usuario ORDER BY id DESC";
      //Realizamos la consulta
      $resultado=$this->realizarConsulta($sql);
      if($resultado!=false){
        return $resultado->fetch_assoc();
      }else{
        return null;
      }
    }else{
      return null;
    }
  }
  //Devolvemos un nuevo usuario
  function buscarUsuario($usuario){
    //Construimos la consulta
    $sql="SELECT * from usuario WHERE nombre='".$usuario."'";
    //Realizamos la consulta
    $resultado=$this->realizarConsulta($sql);
    if($resultado!=false){
      if($resultado!=false){
        return $resultado->fetch_assoc();
      }else{
        return null;
      }
    }else{
      return null;
    }
  }
  function mostrarInfo($usuario){
    //Construimos la consulta
    $sql="SELECT * from usuario WHERE nombre='".$usuario."'";
    //Realizamos la consulta
    $resultado=$this->realizarConsulta($sql);
    if($resultado!=false){
      if($resultado!=false){
        return $resultado->fetch_assoc();
      }else{
        return null;
      }
    }else{
      return null;
    }
  }

  function actualizarUsuario($nombre,$mail,$apellidos){
    $sql="UPDATE usuario set  mail='".$mail."', apellidos='".$apellidos."' where nombre='".$nombre."'";
    $resultado=$this->realizarConsulta($sql);
    if ($resultado!=null) {
     return False;
    }
  }
  //comprobamos el mail y si devuelve mas de una fila es que tiene mas de un mail y si da mas de uno salta el erro de mail utilizado
  function Comprobaremail($email){
   $sql="SELECT mail from usuario WHERE mail='".$email."'";
   //Realizamos la consulta
   $resultado=$this->realizarConsulta($sql);
   if($resultado!=null){
     if ($resultado->num_rows>0) {
       return null;
     }else {
       return 1;
     }
   }else{
     return null;
   }
 }
}
 ?>
