<?php
require ('config.php');
session_start();
header('Content-Type: text/html; charset=ISO-8859-1');

if(isset($_SESSION['nombre'])){
    $id = $_SESSION['nu_usuario'];
    $profile = $_SESSION['nombre'];
    $profile2 = $_SESSION['hmx'];
    $nivel = $_SESSION['nivel'];

//echo $sql;
?>
 
 <!DOCTYPE html>
  <html>
   <?php
    require('headera.php');
     ?>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
       <script type="text/javascript" src="js/javas.js"></script>
        
<!--        Aqui comienza nav-->
      <header>
       <nav>
    <div class="nav-wrapper">
     
      <a href="#!" class="brand-logo center">HAFELE DE M&Eacute;XICO S.A. de C.V.</a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
       <li><a href="#"><b><?php echo $profile; ?> -- <?php echo $profile2; ?></b></a></li>
        <li><a href="comisionesa.php">Cobranza</a></li>
        <li><a href="estado-cuentaa.php">Estado de cuenta</a></li>
        <li><a href="logout.php">Salir</a></li>
        
      </ul>
      <ul class="side-nav" id="mobile-demo">
         
         <li>
            <div class="userView">
                <div class="background">
                    <img src="img/imagen_fondo_movil.png">
                </div>
              <a href="#!corp"><span class="white-text name">HAFELE Intranet</span></a>  
              <a href="#!name"><span class="white-text name"><?php echo $profile; ?></span></a>
              <a href="#!hmx"><span class="white-text email"><?php echo $profile2; ?></span></a>
            </div>
         </li>
        <li><a href="comisionesa.php"><i class="large material-icons">view_list</i>Cobranza</a></li>
        <li><a href="estado-cuentaa.php">Estado de cuenta <i class="large material-icons">view_list</i></a></li>
          <li>
          <a href="logout.php">Salir<i class="large material-icons">settings_power</i></a></li>
        
      </ul>
    </div>
  </nav>
  </header>
 
<!--        contenedor-->
        <main>
      <div class= "z-depth-3">
        <!-- Page Content goes here -->
        <br>
        <div class="container">
        <h4 class="center">Sube tus archivos</h4>
        <br>
           <h6>Cobranza</h6>
            form
            <form action="subirform.php" enctype="multipart/form-data" method="post">
    <div class="file-field input-field">
      <div class="btn red">
        <span>File</span>
        <input type="file">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>
    </div>
  <button class="btn red" type="submit"> Mostrar tablas</button>
  </form>
         <h6>Estado de cuenta</h6>
            <form action="subirform.php" enctype="multipart/form-data" method="post">
    <div class="file-field input-field">
      <div class="btn red">
        <span>File</span>
        <input type="file" name="archivo" accept=".csv" id="archivo">
      </div>
      <div class="file-path-wrapper">
        <input  class="file-path validate" type="text">
      </div>
    </div>
				<button class="btn red" type="submit"> Mostrar tablas</button>
  </form>
          
          </div>
           
        
            </div>
        </main>
                <br>     
                 
<!--          pie de pagina  -->
 <?php
	require('footer.php');
	
	?>
 
  </html>
             <?php
            }else{
    session_destroy();

//header('location: login.php');
}
              
    
    
            ?>