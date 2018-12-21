<?php

session_start();
header('Content-Type: text/html; charset=ISO-8859-1');
if(isset($_POST['entrar'])){
    require("config.php");
    
    $hmx=$_POST['usuario'];
$contrasena=$_POST['password'];


    

$sql='SELECT * FROM tusuarioshmx WHERE hmxUsuario="'.$hmx.'" AND Password="'.$contrasena.'"';
    
$res=mysqli_query($db,$sql)or die(mysqli_error());


 if($row=mysqli_fetch_array($res)){
  if($hmx=$row['hmxUsuario'] && $contrasena==$row['Password']){
      
      $_SESSION['nu_usuario']=$row['idUsuario'];
      $_SESSION['nombre']=$row['Usuario'];
      $_SESSION['hmx']=$row['hmxUsuario'];
      $_SESSION['pass']=$row['Password'];
      $_SESSION['nivel']=$row['idTipo'];
      $_SESSION['vale']=true;
     $t_usr=$row['idTipo'];
      switch($t_usr){
          case 1://Vendedores
               header('location: cobranza.php');
                break;
        case 2://Monitoreadores
               header('location: cobranzaadm.php');
                break;
              
        case 5://Administradores
			  header('location: admin.php');
              // header('location: Admin.php');
                break;
      }
  }
 }else{ 
   session_destroy();
 header('location: login.php');
    
 }

}
?>
