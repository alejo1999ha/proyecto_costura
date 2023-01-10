<?php
require("../clase/clientes.class.php");
//Instancio un objeto de la clase cñoemtes
$objClientes= new clientes;

//Recibimos todos los datos que nos enviaron desde el formulario en HTML y el valor lo asignamos en las variables correspondientes en la clase clientes
if($_REQUEST['accion']=="agregar" || $_REQUEST['accion']=="editar")
{
$objClientes->ced_cli=$_REQUEST['ced_cli'];
$objClientes->nom_cli=$_REQUEST['nom_cli'];
$objClientes->ape_cli=$_REQUEST['ape_cli'];
$objClientes->te1_cli=$_REQUEST['te1_cli'];
$objClientes->te2_cli=$_REQUEST['te2_cli'];
$objClientes->est_cli=$_REQUEST['est_cli'];
    
    }else  {
     $objClientes->cod_cli=$_REQUEST['cod_cli'];
 }

//Recibimos el campo acción que dirá qeu debo hacer con los datos recibidos
$accion=$_REQUEST['accion'];

switch ($accion) {
    case 'agregar':
        $resultado=$objClientes->agregar();

        if($resultado==1){
        	echo "Cliente agregado correctamente";
        }else{
        	echo "Error al agregar Cliente";
        }
    break;

    case 'editar':
		$objClientes->cod_cli=$_REQUEST['cod_cli'];
        $resultado=$objClientes->editar();

        if($resultado==1){
        	echo "cliente  editado correctamente";
        }else{
        	echo "Error al editar Cliente";
        }
    break;

case 'borrar':
$objClientes->cod_cli=$_GET['cod_cli'];
$objClientes->borrar();
header("Location: ../vista/clientes/listado_general.php");
break;


}

?>