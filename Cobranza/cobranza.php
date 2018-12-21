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
        <script src="js/jquery.table2excel.js"></script>
<!--        Aqui comienza nav-->
      <header>
       <nav class="nav-extended">
    <div class="nav-wrapper">
     
      <a href="#!" class="brand-logo">HAFELE DE M&Eacute;XICO S.A. de C.V.</a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
       <li><a href="#"><b><?php echo $profile; ?> -- <?php echo $profile2; ?> </b></a></li>
        <li><a href="Cobranza.php">Cobranza</a></li>
        <li><a href="estado-cuenta.php">Estado de cuenta</a></li>
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
        <li><a href="Cobranza.php"><i class="large material-icons">view_list</i>Cobranza</a></li>
        <li><a href="estado-cuenta.php">Estado de cuenta <i class="large material-icons">view_list</i></a></li>
         <li><a href="logout.php">Salir<i class="large material-icons">settings_power</i></a></li>
      </ul>
    </div>
  </nav>
  </header>
  


 
<!--        contenedor-->
        <main>


      <div >
        <!-- Page Content goes here -->
       
        <br>
         <h4 class="center-align"><b>Cobranza</b></h4>
        <br>
 <div class="container">
   <div class="row">
   <div class="col s12 m8">
   <?php
	$sqlfiltro = "SELECT fuente.Nombre, customer_master_data.CustomNO as Cliente_SAP FROM customer_master_data inner join fuente on customer_master_data.CustomNO = fuente.Cliente WHERE left(customer_master_data.ADMAZE,7) = '".$profile2."' GROUP BY fuente.Nombre";

		
	$result = mysqli_query($db,$sqlfiltro);
	   ?>
	 <form action="cobranza.php" method="post">
    <select name="filtro">
      <option value="todo" selected disabled>Filtro de clientes </option>
        <?php
	While($row=mysqli_fetch_array($result)){
	?>
      <option value="<?php echo $row['Nombre'];?>"> <?php echo "<B>". $row['Cliente_SAP']."</B>";?> <?php echo $row['Nombre'];?></option>
      
      
       <?php
	}

		?>
    </select>
    <button class="btn tooltipped waves-effect waves-white red" type="submit" name="filtrar" data-position="bottom" data-tooltip="Filtra y muestra todo" data-delay="50">Buscar</button>
	</form>
 
  
   <?php
	if(isset($_POST['filtro'])){
		if($_POST['filtro']){
				$sql= "SELECT fuente.Nombre, customer_master_data.CustomNO as Cliente_SAP, left(customer_master_data.ADMAZE,7) As Comercial, customer_master_data.DiasCondPag As Dias_Credito, DATE_FORMAT(fuente.FechaDoc, '%d/%m/%Y') As Fecha_Documento,DATE_FORMAT (fuente.FechaComp,'%d/%m/%Y') As Fecha_Apl_Pago, (datediff(fuente.FechaComp, fuente.FechaDoc)-customer_master_data.DiasCondPag) As Diferencia_dias, round (fuente.ImpDebHab,2) As ImpDebHab, fuente.Referencia , round(if(datediff(fuente.FechaComp,fuente.FechaDoc)<=customer_master_data.DiasCondPag+15,fuente.ImpDebHab/1.16,0),2)  AS Base_Pago FROM customer_master_data inner join fuente on customer_master_data.CustomNO = fuente.Cliente WHERE (left(fuente.Referencia,4) ='0340' or  left(fuente.Referencia,4)='0348') AND left(customer_master_data.ADMAZE,7) = '".$profile2."' AND fuente.nombre = '".$_POST['filtro']."'" ;
		
		$sqlsum="SELECT sum(round(if(datediff(fuente.FechaComp,fuente.FechaDoc)<=customer_master_data.DiasCondPag+15,fuente.ImpDebHab/1.16,0),2))  AS Base_Pago FROM customer_master_data inner join fuente on customer_master_data.CustomNO = fuente.Cliente WHERE (left(fuente.Referencia,4) ='0340' or  left(fuente.Referencia,4)='0348') AND left(customer_master_data.ADMAZE,7) = '".$profile2."' AND fuente.nombre = '".$_POST['filtro']."'";
		}
	}else{ 
		$sql= "SELECT fuente.Nombre, customer_master_data.CustomNO as Cliente_SAP, left(customer_master_data.ADMAZE,7) As Comercial, customer_master_data.DiasCondPag As Dias_Credito, DATE_FORMAT(fuente.FechaDoc, '%d/%m/%Y') As Fecha_Documento,DATE_FORMAT (fuente.FechaComp,'%d/%m/%Y') As Fecha_Apl_Pago, (datediff(fuente.FechaComp, fuente.FechaDoc)-customer_master_data.DiasCondPag) As Diferencia_dias, round (fuente.ImpDebHab,2) As ImpDebHab, fuente.Referencia , round(if(datediff(fuente.FechaComp,fuente.FechaDoc)<=customer_master_data.DiasCondPag+15,fuente.ImpDebHab/1.16,0),2)  AS Base_Pago FROM customer_master_data inner join fuente on customer_master_data.CustomNO = fuente.Cliente WHERE (left(fuente.Referencia,4) ='0340' or  left(fuente.Referencia,4)='0348') AND left(customer_master_data.ADMAZE,7) = '".$profile2."'";
		
		
		$sqlsum="SELECT fuente.Nombre, customer_master_data.CustomNO as Cliente_SAP, sum(round(if(datediff(fuente.FechaComp,fuente.FechaDoc)<=customer_master_data.DiasCondPag+15,fuente.ImpDebHab/1.16,0),2))  AS Base_Pago FROM   customer_master_data inner join fuente on customer_master_data.CustomNO = fuente.Cliente WHERE (left(fuente.Referencia,4) ='0340' or  left(fuente.Referencia,4)='0348') AND left(customer_master_data.ADMAZE,7) = '".$profile2."'";
	}

	?>
   
   
    </div>
    <div class="col s12 m4">
    	<div class="">
    		<p> 
    		<?php
	if(isset($_POST['filtro'])){
		echo "Cliente: <b>".$_POST['filtro']."</b>";
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
    	 <form action="cobranza.php" method="post">
  	<button class="btn waves-effect waves-white red" type="submit" name="descarga">Descargar</button>
  </form>
    </div>
    
</div>    
         <?php
          if(isset($_POST['descarga'])){
			  header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");  
    header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");  
    header ("Cache-Control: no-cache, must-revalidate");  
    header ("Pragma: no-cache");  
    header ("Content-Type: application/vnd.ms-excel"); 
    //header ("Content-type: application/x-msexcel");  
    header ("Content-Disposition: attachment; filename=$desp_fac.xls \"" );
			  
			  echo $_POST['cobranzat'];
			  }
          ?>
           <table id="cobranzat" class="container highlight responsive-table" style="font-size: 12px">
            <thead>
                <tr>
                   <th>No. Cliente</th>
                    <th>Nombre de cliente</th>
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
                <tr class="hoverable">
                    <td><?php echo $row['Cliente_SAP'];?></td>
                    <td><?php echo $row['Nombre'];?></td>
            
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
          
        </main>
         <br><br>
                 <?php
	require('footer.php');
	  ?>                     
  </html>
             <?php
            } else {
	  header('location: login.php');
} 
            ?>