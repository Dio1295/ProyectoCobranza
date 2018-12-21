<?php
require ('config.php');
session_start();
header('Content-Type: text/html; charset=ISO-8859-1');
if(isset($_SESSION['nombre'])){
    $id = $_SESSION['nu_usuario'];
    $profile = $_SESSION['nombre'];
    $profile2 = $_SESSION['hmx'];
    $nivel = $_SESSION['nivel'];
    //echo 'iniciando...'.$profile." ".$profile2;
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
     
      <a href="#!" class="brand-logo">HAFELE DE M&Eacute;XICO S.A. de C.V.</a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
       <li><a href="#"><b><?php echo $profile; ?> -- <?php echo $profile2; ?> </b></a></li>
        <li><a href="cobranzaadm.php">Cobranza</a></li>
        <li><a href="estado-cuentadm.php">Estado de cuenta</a></li>
           <?php
    $permitido = 5;
    $hmx  ="HMX0009";
    
    if($nivel == $permitido){
        echo'<li><a href="admin.php">admin</a></li>';
    }
    //validacion de subida
    ?>
        <li><a href="logout.php">Salir</a></li>
        
      </ul>
      <ul class="side-nav" id="mobile-demo">
         
         <li>
            <div class="userView">
                <div class="background">
                    <img src="img/imagen_fondo_movil.png">
                </div>
              <a href="#!corp"><span class="white-text name">HAFELE DE M&Eacute;XICO S.A. de C.V.</span></a>  
              <a href="#!name"><span class="white-text name"><?php echo $profile; ?></span></a>
              <a href="#!hmx"><span class="white-text email"><?php echo $profile2; ?></span></a>
            </div>
         </li>
        <li><a href="cobranzaadm.php"><i class="large material-icons">view_list</i>cobranza</a></li>
        <li><a href="estado-cuentadm.php">Estado de cuenta <i class="large material-icons">view_list</i></a></li>
            <?php
    $permitido = 5;
    
    if($nivel == $permitido){
        echo'<li><a href="admin.php">administrador<i class="large material-icons">supervisor_account</i></a></li>';
    }
    ?>
    <li>
          <a href="logout.php">Salir<i class="large material-icons">settings_power</i></a></li>
      </ul>
    </div>
  </nav>
  </header>
 
<!--        contenedor-->
        <main>
      <div>
        <!-- Page Content goes here -->
      <br>
		  <h4 class="center-align"><b>Estado de Cuenta</b></h4>
        <br>
        <div class="container">
        	<div class="row">
        		<div class="col s12 m8">
        			<?php
	$sqlfiltro = "SELECT hmxUsuario, Usuario FROM tusuarioshmx where idTipo=1";
	$result = mysqli_query($db,$sqlfiltro);
	   ?>
	   
	     <form action="estado-cuentadm.php" method="post">
    <select name="filtro" >
      <option value="todo" selected disabled>Filtro de Zonas </option>
        <?php
	While($row=mysqli_fetch_array($result)){
	?>
      <option value="<?php echo $row['hmxUsuario'];?>"> <?php echo "<B>". $row['hmxUsuario']."</B>";?> <?php echo $row['Usuario'];?></option>   
      
        <?php
	}
		?>
    </select>
    <button class="btn tooltipped waves-effect waves-white red" type="submit" name="filtrar" data-position="bottom" data-tooltip="Filtra y muestra todo" data-delay="50">Buscar</button>
	</form>   
         </div>			   
        			   <?php
if(isset($_POST['filtro'])){
		if($_POST['filtro']){//si se pulsa el boton de filtrar, se ejecuta la consulta
			$sql= "SELECT customer_master_data.CustomNO As Num, cartera.NombreClien as Cliente,cartera.FechaDoc, cartera.VencNet As Vencimiento, cartera.DemVenNet As Dias_Vencidos, cartera.ImpMonedaDoc as importe,  cartera.Referen,left(customer_master_data.ADMAZE,7)as HMX FROM customer_master_data inner join cartera on customer_master_data.CustomNO = cartera.Cuenta WHERE left(customer_master_data.ADMAZE,7)= '".$_POST['filtro']."'";
			
			$sqlsum="SELECT customer_master_data.CustomNO As Num, cartera.NombreClien as Cliente,left(customer_master_data.ADMAZE,7)as HMX, customer_master_data.DiasCondPag, if(customer_master_data.LimCred ='1','0',customer_master_data.LimCred)As LimCred, round(sum(cartera.ImpMonedaDoc),2) as importe, sum(if( cartera.DemVenNet>0,round(cartera.ImpMonedaDoc,2),0)) as sumaPos FROM customer_master_data inner join cartera on customer_master_data.CustomNO = cartera.Cuenta Where  left(customer_master_data.ADMAZE,7) = '".$profile2."' AND cartera.NombreClien='".$_POST['filtro']."' group by cartera.NombreClien";
		}
}else{
	$sql= "SELECT customer_master_data.CustomNO As Num, cartera.NombreClien as Cliente,cartera.FechaDoc, cartera.VencNet As Vencimiento, cartera.DemVenNet As Dias_Vencidos, cartera.ImpMonedaDoc as importe,  cartera.Referen,left(customer_master_data.ADMAZE,7)as HMX FROM customer_master_data inner join cartera on customer_master_data.CustomNO = cartera.Cuenta";
	
	$sqlsum="SELECT customer_master_data.CustomNO As Num, cartera.NombreClien as Cliente,cartera.FechaDoc, cartera.VencNet As Vencimiento, cartera.DemVenNet As Dias_Vencidos, round(sum(cartera.ImpMonedaDoc),2) as importe,  cartera.Referen ,left(customer_master_data.ADMAZE,7)as HMX FROM customer_master_data inner join cartera on customer_master_data.CustomNO = cartera.Cuenta";
}
	?>	
        			<div class="col s12 m4">
    	<div class="cuenta">
    		<p> 
    			<?php
	if(isset($_POST['filtro'])){
		echo "Vendedor: <b>".$_POST['filtro']."</b>";
	echo "<br>";
	
	}
		echo "Total: ";
		$resul = mysqli_query($db,$sqlsum);
            While($row=mysqli_fetch_array($resul)){
				echo "<b> $".number_format($row['importe'],2)."</b>";
				}
	
	
	?>
    		</p>
    	</div>
    </div>		
        		</div>
        	</div>

           <table class="container highlight bordered z-depth-2 responsive-table">
            <thead>
                <tr>
                    <th>No. Cliente</th>
                    <th>Nombre de cliente</th>
                   
                    <th>Fecha de documento</th>
                    <th>Decha de vencimiento</th>
                    <th>D&iacute;as vencidos</th>
                    <th>Referencia</th>
                     <th>Importe</th> 
<!-- Cuando no sepas que HMX filtras                   <th>HMX</th>-->
                </tr>
            </thead>
            <tbody>
                <?php
	$resul = mysqli_query($db,$sql);
            While($row=mysqli_fetch_array($resul)){
            
            ?>
                <tr>
                    <td><?php echo $row['Num'];?></td>
                    <td><?php echo $row['Cliente'];?></td>
					
                    <td><?php echo $row['FechaDoc'];?></td>
                    <td><?php echo $row['Vencimiento'];?></td>
                    <td><?php echo $row['Dias_Vencidos'];?></td>
                    
                    <td><?php echo $row['Referen'];?></td>
                    <td><?php echo "$".number_format($row['importe'],2);?></td>
<!--Aqui se enlaza --> <td><?php //echo $row['HMX'];?></td>
                </tr>
                       <?php
            }             
            ?>
            </tbody>

		  </table>
		 
            </div>
        </main>   
                <br><br>   
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