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
       <nav class="nav-extended">
    <div class="nav-wrapper">
     
      <a href="#!" class="brand-logo">HAFELE DE M&Eacute;XICO S.A. de C.V.</a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
       <li><a href="#"><b><?php echo $profile; ?> -- <?php echo $profile2; ?> </b></a></li>
        <li class="active"><a  href="Cobranzaadm.php">Cobranza</a></li>
        <li><a href="estado-cuentadm.php">Estado de cuenta</a></li>
        <?php
    $permitido = 5;
    
    if($nivel == $permitido){
        echo'<li><a href="admin.php">Admin</a></li>';
    }
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
        <li class="active"><a  href="cobranzaadm.php"><i class="large material-icons">view_list</i>Cobranza</a></li>
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
         <h4 class="center-align"><b>Cobranza</b></h4>
        <br>
 <div class="container">
   <div class="row">
   <div class="col s12 m8">
  
	 <form action="cobranzaadm.php" method="post">
    <select name="filtro">
      <option value="" selected disabled>Filtro de Zonas </option>
        <?php
	$sqlfiltro = "SELECT hmxUsuario, Usuario FROM tusuarioshmx where idTipo=1";

		$result = mysqli_query($db,$sqlfiltro);
	While($row=mysqli_fetch_array($result)){
	?>
      <option value="<?php echo $row['hmxUsuario'];?>"> <?php echo "<B>". $row['hmxUsuario']."</B>";?> <?php echo $row['Usuario'];?></option>
      
      
       <?php
	}
	echo $_POST['filtro'];
		?>
    </select>
    <button class="btn tooltipped waves-effect waves-white red" type="submit" name="filtrar" data-position="bottom" data-tooltip="Filtra y muestra todo" data-delay="50">Buscar</button>
	</form>
	<?php
	if(isset($_POST['filtro'])){
		if($_POST['filtro']){//si se pulsa el boton de filtrar, se ejecuta la consulta
				$sql= "SELECT fuente.Nombre, customer_master_data.CustomNO as Cliente_SAP, left(customer_master_data.ADMAZE,7) As Comercial, customer_master_data.DiasCondPag As Dias_Credito, DATE_FORMAT(fuente.FechaDoc, '%d/%m/%Y') As Fecha_Documento,DATE_FORMAT (fuente.FechaComp,'%d/%m/%Y') As Fecha_Apl_Pago, (datediff(fuente.FechaComp, fuente.FechaDoc)-customer_master_data.DiasCondPag) As Diferencia_dias, round (fuente.ImpDebHab,2) As ImpDebHab, fuente.Referencia , round(if(datediff(fuente.FechaComp,fuente.FechaDoc)<=customer_master_data.DiasCondPag+15,fuente.ImpDebHab/1.16,0),2)  AS Base_Pago FROM customer_master_data inner join fuente on customer_master_data.CustomNO = fuente.Cliente WHERE (left(fuente.Referencia,4) ='0340' or  left(fuente.Referencia,4)='0348') AND left(customer_master_data.ADMAZE,7) = '".$_POST['filtro']."' ORDER BY (datediff(fuente.FechaComp, fuente.FechaDoc)-customer_master_data.DiasCondPag) , fuente.Nombre ASC" ;
		
		$sqlsum="SELECT fuente.Nombre, customer_master_data.CustomNO as Cliente_SAP, sum(round(if(datediff(fuente.FechaComp,fuente.FechaDoc)<=customer_master_data.DiasCondPag+15,fuente.ImpDebHab/1.16,0),2))  AS Base_Pago FROM   customer_master_data inner join fuente on customer_master_data.CustomNO = fuente.Cliente WHERE (left(fuente.Referencia,4) ='0340' or  left(fuente.Referencia,4)='0348') AND left(customer_master_data.ADMAZE,7) = '".$_POST['filtro']."' ORDER BY (datediff(fuente.FechaComp, fuente.FechaDoc)-customer_master_data.DiasCondPag) , fuente.Nombre ASC";
		}
	}else{ 
		$sql= "SELECT fuente.Nombre, customer_master_data.CustomNO as Cliente_SAP, left(customer_master_data.ADMAZE,7) As Comercial, customer_master_data.DiasCondPag As Dias_Credito, DATE_FORMAT(fuente.FechaDoc, '%d/%m/%Y') As Fecha_Documento,DATE_FORMAT (fuente.FechaComp,'%d/%m/%Y') As Fecha_Apl_Pago, (datediff(fuente.FechaComp, fuente.FechaDoc)-customer_master_data.DiasCondPag) As Diferencia_dias, round (fuente.ImpDebHab,2) As ImpDebHab, fuente.Referencia , round(if(datediff(fuente.FechaComp,fuente.FechaDoc)<=customer_master_data.DiasCondPag+15,fuente.ImpDebHab/1.16,0),2)  AS Base_Pago FROM customer_master_data inner join fuente on customer_master_data.CustomNO = fuente.Cliente WHERE left(fuente.Referencia,4) ='0340' or  left(fuente.Referencia,4)='0348'  ORDER BY (datediff(fuente.FechaComp, fuente.FechaDoc)-customer_master_data.DiasCondPag) , fuente.Nombre ASC";
		
		
		$sqlsum="SELECT fuente.Nombre, customer_master_data.CustomNO as Cliente_SAP, sum(round(if(datediff(fuente.FechaComp,fuente.FechaDoc)<=customer_master_data.DiasCondPag+15,fuente.ImpDebHab/1.16,0),2))  AS Base_Pago FROM   customer_master_data inner join fuente on customer_master_data.CustomNO = fuente.Cliente WHERE left(fuente.Referencia,4) ='0340' or  left(fuente.Referencia,4)='0348' ORDER BY (datediff(fuente.FechaComp, fuente.FechaDoc)-customer_master_data.DiasCondPag) , fuente.Nombre ASC";
		
	}

	?>
   
   
    </div>
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
				echo "<b> $".number_format($row['Base_Pago'],2)."</b>";
				}
			?>
   		
    		</p>
    	</div>
    </div>
    </div>
    <div class="row">
    	<div class="col S12">
<!--
    	<form action="cobranzaadm.php" method="post" enctype="text/plain">
    		<button class="btn waves-effect waves-white red"  type="submit" name="excel" >Excel</button>
    		</form>
-->
    	</div>
    </div>
</div>

       <br>
          
           <table  class="container highlight bordered z-depth-2 responsive-table">
            <thead>
                <tr>
                   <th>No. Cliente</th>
                    <th>Nombre de cliente</th>
<!--                    <th>Zona</th>-->
                    <th>D&iacute;as de cr&eacute;dito</th>
                    <th>Fecha de factura</th>
                    <th>Fecha de pago</th>
                    <th>Demora</th>
                    <th>Base de pago</th>
                    <th>Referencia</th>
                    <th>Base para comisiones (sin IVA)</th>
                </tr>
            </thead>
            
            
            <tbody>
                <?php
   
 
   

$resul = mysqli_query($db,$sql);
            While($row=mysqli_fetch_array($resul)){
            ?>
                <tr>
                    <td><?php echo $row['Cliente_SAP'];?></td>
                    <td><p class="NombreSAP"><?php echo $row['Nombre'];?></p></td>
                    <td><?php //echo $row['Comercial'];?></td>
                    <td><?php echo $row['Dias_Credito'];?></td>
                    <td><?php echo $row['Fecha_Documento'];?></td>
                    <td><?php echo $row['Fecha_Apl_Pago'];?></td>
               
                    <td><?php echo $row['Diferencia_dias'];?></td>
                    <td><?php echo "$".number_format($row['ImpDebHab'],2);?></td>
                    <td><?php echo $row['Referencia'];?></td>
                    <td><?php echo "$".number_format($row['Base_Pago'],2);?></td>
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
  </html>
             <?php
                    }else{
    session_destroy();

header('location: login.php');
}  
            ?>