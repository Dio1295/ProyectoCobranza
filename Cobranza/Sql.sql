SELECT qryVentasProducto.Material, qryVentasProducto.Description, qryVentasProducto.[Regular Vendor], qryVentasProducto.Vendor, qryVentasProducto.[ABC Class], qryVentasProducto.[XYZ Class], qryVentasProducto.[Storage Flag], qryCatalogo.[PrimeroDeAvión/Casa] AS Avion_Casa, qryCatalogo.PrimeroDeBOM AS BOM, qryInventario.Stock AS StockAux, IIf(IsNull([StockAux]),0,[StockAux]) AS Stock, qryAuxStockSeguridad.[PrimeroDeStock de Seguridad] AS Stock_SeguridadAux, IIf(IsNull([Stock_SeguridadAux]),0,[Stock_SeguridadAux]) AS Stock_Seguridad, qryVendorMaterial.[PrimeroDeMinimum Order Qty] AS [Minimum Order Qty], qryVendorMaterial.[PrimeroDeStandard Order Qty] AS [Standard Order Qty], qryVendor.[Transport Time ], qryVendor.[Production Time], qryVendor.TTime AS [T+P_TimeAux], IIf((IsNull([Transport Time ]) And IsNull([Production Time])),0,[T+P_TimeAux]) AS [T+P_Time], qryVendorMaterial.[PrimeroDePlanned delivery time in days] AS [Planned delivery time in days], qryVendorMaterial.[PrimeroDeCountry of Origin] AS [Country of Origin], qryComprasCreadas.[SumaDeCantidad Programada] AS Compras_CreadasAux, IIf(IsNull([Compras_CreadasAux]),0,[Compras_CreadasAux]) AS Compras_Creadas, qryComprasEnTransito.[SumaDeCantidad Programada] AS Compras_EnTransitoAux, IIf(IsNull([Compras_EnTransitoAux]),0,[Compras_EnTransitoAux]) AS Compras_EnTransito, qryVentasProducto.[SumaDeUno Number of Cust] AS 1_Cli, qryVentasProducto.[SumaDeUno Quantity] AS 1_Cant, qryVentasProducto.[SumaDeDos Number of Cust] AS 2_Cli, qryVentasProducto.[SumaDeDos Quantity] AS 2_Cant, qryVentasProducto.[SumaDeTres Number of Cust] AS 3_Cli, qryVentasProducto.[SumaDeTres Quantity] AS 3_Cant, qryVentasProducto.[SumaDeCuatro Number of Cust] AS 4_Cli, qryVentasProducto.[SumaDeCuatro Quantity] AS 4_Cant, qryVentasProducto.[SumaDeCinco Number of Cust] AS 5_Cli, qryVentasProducto.[SumaDeCinco Quantity] AS 5_Cant, qryVentasProducto.[SumaDeSeis Number of Cust] AS 6_Cli, qryVentasProducto.[SumaDeSeis Quantity] AS 6_Cant, qryVentasProducto.[SumaDeSiete Number of Cust] AS 7_Cli, qryVentasProducto.[SumaDeSiete Quantity] AS 7_Cant, qryVentasProducto.[SumaDeOcho Number of Cust] AS 8_Cli, qryVentasProducto.[SumaDeOcho Quantity] AS 8_Cant, qryVentasProducto.[SumaDeNueve Number of Cust] AS 9_Cli, qryVentasProducto.[SumaDeNueve Quantity] AS 9_Cant, qryVentasProducto.[SumaDeDiez Number of Cust] AS 10_Cli, qryVentasProducto.[SumaDeDiez Quantity] AS 10_Cant, qryVentasProducto.[SumaDeOnce Number of Cust] AS 11_Cli, qryVentasProducto.[SumaDeOnce Quantity] AS 11_Cant, qryVentasProducto.[SumaDeDoce Number of Cust] AS 12_Cli, qryVentasProducto.[SumaDeDoce Quantity] AS 12_Cant, qryVentasProducto.[SumaDeMes Actual Number of Cust] AS Mes_Actual_Clientes, qryVentasProducto.[SumaDeMes Actual Quantity] AS Mes_Actual_Cantidad, IIf([7_Cant]>=[8_Cant] And [7_Cant]>=[9_Cant] And [7_Cant]=[10_Cant] And [7_Cant]>=[11_Cant] And [7_Cant]>=[12_Cant],[7_Cant],IIf([8_Cant]>=[7_Cant] And [8_Cant]>=[9_Cant] And [8_Cant]>=[10_Cant] And [8_Cant]>=[11_Cant] And [8_Cant]>=[12_Cant],[8_Cant],IIf([9_Cant]>=[7_Cant] And [9_Cant]>=[8_Cant] And [9_Cant]>=[10_Cant] And [9_Cant]>=[11_Cant] And [9_Cant]>=[12_Cant],[9_Cant],IIf([10_Cant]>=[7_Cant] And [10_Cant]>=[8_Cant] And [10_Cant]>=[9_Cant] And [10_Cant]>=[11_Cant] And [10_Cant]>=[12_Cant],[10_Cant],IIf([11_Cant]>=[7_Cant] And [11_Cant]>=[8_Cant] And [11_Cant]>=[9_Cant] And [11_Cant]>=[10_Cant] And [11_Cant]>=[12_Cant],[11_Cant],IIf([12_Cant]>=[7_Cant] And [12_Cant]>=[8_Cant] And [12_Cant]>=[9_Cant] And [12_Cant]>=[10_Cant] And [12_Cant]>=[11_Cant],[12_Cant])))))) AS MaxCantAux, IIf(IsNull([MaxCantAux]),0,[MaxCantAux]) AS MaxCant, IIf([7_Cli]<=[8_Cli] And [7_Cli]<=[9_Cli] And [7_Cli]<=[10_Cli] And [7_Cli]<=[11_Cli] And [7_Cli]<=[12_Cli],[7_Cli],IIf([8_Cli]<=[7_Cli] And [8_Cli]<=[9_Cli] And [8_Cli]<=[10_Cli] And [8_Cli]<=[11_Cli] And [8_Cli]<=[12_Cli],[8_Cli],IIf([9_Cli]<=[7_Cli] And [9_Cli]<=[8_Cli] And [9_Cli]<=[10_Cli] And [9_Cli]<=[11_Cli] And [9_Cli]<=[12_Cli],[9_Cli],IIf([10_Cli]<=[7_Cli] And [10_Cli]<=[8_Cli] And [10_Cli]<=[9_Cli] And [10_Cli]<=[11_Cli] And [10_Cli]<=[12_Cli],[10_Cli],IIf([11_Cli]<=[7_Cli] And [11_Cli]<=[8_Cli] And [11_Cli]<=[9_Cli] And [11_Cli]<=[10_Cli] And [11_Cli]<=[12_Cli],[11_Cli],IIf([12_Cli]<=[7_Cli] And [12_Cli]<=[8_Cli] And [12_Cli]<=[9_Cli] And [12_Cli]<=[10_Cli] And [12_Cli]<=[11_Cli],[12_Cli])))))) AS MinClientesAux, IIf(IsNull([MinClientesAux]),0,[MinClientesAux]) AS MinClientes, ([12_Cant]*6+[11_Cant]*5+[10_Cant]*4+[9_Cant]*3+[8_Cant]*2+[7_Cant]*1)/(1+2+3+4+5+6)+([MaxCant]-([12_Cant]*6+[11_Cant]*5+[10_Cant]*4+[9_Cant]*3+[8_Cant]*2+[7_Cant]*1)/(1+2+3+4+5+6))/5 AS Prom_Mensual_Cons_Max_AyB, ([12_Cant]+[11_Cant]+[10_Cant]+[9_Cant]+[8_Cant]+[7_Cant]+[6_Cant])/6 AS Prom_Simple_CyN, IIf([Prom_Mensual_Cons_Max_AyB]*[T+P_Time]/30-([Compras_Creadas]+[Compras_EnTransito]+[Stock])>[Stock_Seguridad]*[T+P_Time]/30-([Compras_Creadas]+[Compras_EnTransito]+[Stock]),[Prom_Mensual_Cons_Max_AyB]*[T+P_Time]/30-([Compras_Creadas]+[Compras_EnTransito]+[Stock]),[Stock_Seguridad]*[T+P_Time]/30-([Compras_Creadas]+[Compras_EnTransito]+[Stock])) AS MaxAux1, IIf([Prom_Simple_CyN]*[T+P_Time]/30-([Compras_Creadas]+[Compras_EnTransito]+[Stock])>[Stock_Seguridad]*[T+P_Time]/30-([Compras_Creadas]+[Compras_EnTransito]+[Stock]),[Prom_Simple_CyN]*[T+P_Time]/30-([Compras_Creadas]+[Compras_EnTransito]+[Stock]),[Stock_Seguridad]*[T+P_Time]/30-([Compras_Creadas]+[Compras_EnTransito]+[Stock])) AS MaxAux2, IIf([ABC Class]="A" Or [ABC Class]="B",IIf([Stock]<[Prom_Mensual_Cons_Max_AyB]*[T+P_Time]/30 Or [Stock]<[Stock_Seguridad]*[T+P_Time]/30,[MaxAux1]),IIf([Stock]<[Prom_Simple_CyN]*[T+P_Time]/30 Or [Stock]<[Stock_Seguridad]*[T+P_Time]/30,[MaxAux2],0)) AS ComprasAux, IIf([T+P_Time]>=90,[ComprasAux]*1.2,[ComprasAux]) AS ComprasAux2, IIf(IsNull([ComprasAux2]),0,[ComprasAux2]) AS Compras, IIf([Compras]<>0 And [MaxCant]<>0,IIf(([12_Cant]*6+[11_Cant]*5+[10_Cant]*4+[9_Cant]*3+[8_Cant]*2+[7_Cant]*1)/(1+2+3+4+5+6)/[MaxCant]<0.6,"Picos"," ")," ") AS Picos, IIf([Compras]<>0,IIf([MinClientes]<=2,"Clientes?"," ")," ") AS Pocos_Clientes, IIf(([Compras_Creadas]+[Compras_EnTransito])>=[Prom_Simple_CyN]*4 And [Stock]>0,">4 Months") AS [Transit and Purchased Qty], IIf([Prom_Simple_CyN]>0,[Stock]/[Prom_Simple_CyN],0) AS [Months of inventory]
FROM ((((((qryVentasProducto LEFT JOIN qryCatalogo ON qryVentasProducto.Material = qryCatalogo.[PrimeroDeN° de cat]) LEFT JOIN qryInventario ON qryVentasProducto.Material = qryInventario.Referencia) LEFT JOIN qryVendorMaterial ON qryVentasProducto.Material = qryVendorMaterial.Material) LEFT JOIN qryComprasCreadas ON qryVentasProducto.Material = qryComprasCreadas.Articulo) LEFT JOIN qryComprasEnTransito ON qryVentasProducto.Material = qryComprasEnTransito.Articulo) LEFT JOIN qryAuxStockSeguridad ON qryVentasProducto.Material = qryAuxStockSeguridad.Material) LEFT JOIN qryVendor ON qryVentasProducto.Vendor = qryVendor.Vendor;