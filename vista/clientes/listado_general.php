
<link rel="stylesheet"  href="../../bootstrap-4.0/css/bootstrap.min.css">
<?php
require("../../clase/clientes.class.php");
$objClientes= new clientes;
$puntero=$objClientes->listar();	
?>


<table border="1" width="80%" align="center" class="table table-striped table-hover">
	<tr align="center" class="bg-primary text-white">
		<td width="10%">Cedula</td>
		<td width="30%">Nombres</td>
		<td width="30%">Apellidos</td>
		<td width="10%">Telefono 1</td>
		<td width="10%">Telefono 2</td>
		<td width="10%">Estatus</td>
		<td width="10%">Editar</td>
		<td width="10%">borrar</td>
	</tr>




<?php
while(($datos=$objClientes->extraer_dato($puntero))>0)
{

$estatus=($datos["est_cli"]=="A")?"activo":"Inactivo";

echo "
<tr align='center'>
		<td width='10%'>$datos[ced_cli]</td>
		<td width='30%' align='left'>$datos[nom_cli]</td>
		<td width='30%' align='left'>$datos[ape_cli]</td>
		<td width='10%'>$datos[te1_cli]</td>
		<td width='10'>$datos[te2_cli]</td>
		<td width='10%'>$estatus</td>
        <td width='10%'><a href='editar.php?cod_cli=$datos[cod_cli]'>Editar</a></td>
        								
        <td width='10%'>
        <a href='../../controlador/clientes.php?cod_cli=$datos[cod_cli]&accion=borrar'>borrar</a></td>
	</tr>";
}

?>

</table>