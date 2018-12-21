<?php
require ('config.php');
session_start();
header('Content-Type: text/html; charset=ISO-8859-1');

if(isset($_SESSION['nombre'])){
    $id = $_SESSION['nu_usuario'];
    $profile = $_SESSION['nombre'];
    $profile2 = $_SESSION['hmx'];
    $nivel = $_SESSION['nivel'];




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
     
      <a href="#!" class="brand-logo">HAFELE DE MEXICO S.A. DE C.V.</a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
       <li><a href="#"><b><?php echo $profile; ?> (<?php echo $profile2; ?>)</b></a> </li>
        <li><a href="cobranzaadm.php">Cobranza</a></li>
        <li><a href="estado-cuentadm.php">Estado de cuenta</a></li>
        <li><a href="logout.php">Salir</a></li>
        
      </ul>
      <ul class="side-nav" id="mobile-demo">
         
         <li>
            <div class="userView">
                <div class="background">
                    <img src="img/imagen_fondo_movil.png">
                </div>
              <a href="#!corp"><span class="white-text name">HAFELE DE MEXICO S.A. DE C.V.</span></a>  
              <a href="#!name"><span class="white-text name"><?php echo $profile; ?></span></a>
              <a href="#!hmx"><span class="white-text email"><?php echo $profile2; ?></span></a>
            </div>
         </li>
        <li><a href="cobranzaadm.php"><i class="large material-icons">view_list</i>Cobranza</a></li>
        <li><a href="estado-cuentadm.php">Estado de cuenta <i class="large material-icons">view_list</i></a></li>
          <li>
          <a href="logout.php">Salir<i class="large material-icons">settings_power</i></a></li>
        
      </ul>
    </div>
  </nav>
  </header>
 
<!--        contenedor-->
        <main>
      <div class= "container z-depth-3">
        <!-- Page Content goes here -->
        <br>
        <div class="container">
        <div class="row">
        <div class="col s12">
        <h4 class="center-align">Usuarios HMX</h4>
        </div>
        </div>
       
             <div class="row">
              <div class="col s4"> 
           
           </div>
           <div class="col s4"> 
<button class="btn waves-effect waves-white red" type="submit" name="editar">Nuevo HMX
                    <i class="material-icons right">edit</i>
                    </button>
           </div>
           <div class="col s4"> 
           
           </div>
        </div> 
        <div class="row">
          <div class="col_s12">
           <table class="highlight bordered z-depth-2 responsive-table">
            <thead>
                <tr>
                    <th>HMX</th>
                    <th>Nombre</th>
                 <th>Editar</th>
                 <th>Eliminar</th>
                </tr>
            </thead>
            
            
            <tbody>
                <?php
    $sql= "SELECT * FROM tusuarioshmx";

$resul = mysqli_query($db,$sql);
    
            While($row=mysqli_fetch_array($resul)){
            
            ?>
                <tr>
                    <td><?php echo $row['hmxUsuario'];?></td>
                    <td><?php echo $row['Usuario'];?></td>
                    <td>
                    <button class="btn waves-effect waves-white btn-floating red" type="submit" name="editar">
                    <i class="material-icons right">edit</i>
                    </button>
                    </td>
                    <td>
                    <button class="btn waves-effect waves-white btn-floating red" type="submit" name="eliminar">
                    <i class="material-icons right">delete</i>
                        </button>
                        </td>
                </tr>
                       <?php
            }
              
    
    
            ?>
            </tbody>
            
            
        </table>
        </div>
            </div>
            </div>
            </div>
        </main>     
                       <?php
	require('footer.php');
	  
	  ?>    
                 
<!--          pie de pagina  -->
  </html>
             <?php
            }else{
    session_destroy();

header('location: login.php');
}
              
    
    
            ?>