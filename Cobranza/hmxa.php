<?php
$sql="SELECT fuente.Nombre, customer_master_data.CustomNO as Cliente_SAP, left(customer_master_data.ADMAZE,7) As Comercial, customer_master_data.DiasCondPag As Dias_Credito, DATE_FORMAT(fuente.FechaDoc, '%d/%m/%Y') As Fecha_Documento,DATE_FORMAT (fuente.FechaComp,'%d/%m/%Y') As Fecha_Apl_Pago, datediff(fuente.FechaComp, fuente.FechaDoc) As Diferencia_dias, round (fuente.ImpDebHab,2) As ImpDebHab, fuente.Referencia as importe , round(if(datediff(fuente.FechaComp,fuente.FechaDoc)<=customer_master_data.DiasCondPag+15,fuente.ImpDebHab/1.16,0),2)  AS Base_Pago FROM customer_master_data inner join fuente on customer_master_data.CustomNO = fuente.Cliente";

?>
