<?php

header('Content-type: application/vnd.ms-excel; name="excel"');
header("Content-Disposition: attachment; filename=excel_reporte.xls");
header('Pragma: no-cache');
header('Expires: 0');
//print $excel;
//exit;
echo'


 <table  class="container highlight bordered z-depth-2 responsive-table">
            <thead>
                <tr>
                   <th>No. Cliente</th>
                    <th>Nombre del cliente</th>
                    <th>Zona</th>
                    <th>D&iacute;as de cr&eacute;dito</th>
                    <th>Fecha de factura</th>
                    <th>Fecha de pago</th>
                    <th>Demora</th>
                    <th>Base para comisiones</th>
                    <th>Referencia</th>
                    <th>Base de pago (Sin IVA)</th>
                </tr>
            </thead>
            
            
            <tbody>';
                <?php
   
 
   

$resul = mysqli_query($db,$sql);
            While($row=mysqli_fetch_array($resul)){
            ?>
                <tr>
                    <td><?php echo $row['Cliente_SAP'];?></td>
                    <td><p class="NombreSAP"><?php echo $row['Nombre'];?></p></td>
                    <td><?php echo $row['Comercial'];?></td>
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
         

?>