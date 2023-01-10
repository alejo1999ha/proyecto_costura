<?phprequire("../../clase/clientes.class.php");$objClientes=new clientes;$objClientes->cod_cli=$_REQUEST['cod_cli'];$resultado=$objClientes->filtrar($objClientes->cod_cli,$ced_cli="",$nom_cli="",$ape_cli="",$est_cli="");$datos=$objClientes->extraer_dato($resultado);?><!DOCTYPE html><html lang="en"><head>	<meta charset="UTF-8">	<title>Ver Alumno</title>	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">	<link rel="shortcut icon" type="image/x-icon" href="../../imagen/icono.png"/>	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">	<link rel="stylesheet" href="../../estilo/estilo.css"></head><body>	<div class="row m-0 pb-5 pt-5 justify-content-center">		<div class="col-8 text-center">			<form action="../../controlador/clientes.php" method="POST" class="text-center">				<div class="sombra bg-azul radio-titulo pt-4 pb-4 text-center">					<img src="../../imagen/logo.png" alt="" width="20%" align="center" class="pt-2 pb-2 ">				</div>				<div class="sombra indigo pt-2 pb-4 text-center">					<div class="col-12 text-center pt-3">						<div class="row justify-content-center text-center">							<div class="col-md-10 text-center">								<div class="row mt-1 mb-1">									<div class="col-md-12 col-12 align-self-center text-center">										<h3>Datos del cliente</h3>									</div>								</div>								<div class="row mt-4 ml-3">									<div class="col-md-4 col-12 align-self-center text-left pt-2">										<label for=""><b>Cédula:</b></label>									</div>									<div class="col-md-4 col-12">										<input type="text" name="ced_cli" id="ced_alu" maxlength="15" class="form-control casilla" placeholder="Cédula del cliente" pattern="[VvEePp0-9]+" title="Inserte la inicial del tipo de documento seguido del número del mismo. Ejemplo: V1234567" value="<?php echo $datos['ced_cli']; ?>" disabled>									</div>								</div>								<hr class="pt-0 mt-2 mb-2 mt-0">								<div class="row mt-1 ml-3">									<div class="col-md-4 col-12 align-self-center text-left pt-2">										<label for=""><b>Nombres:</b></label>									</div>									<div class="col-md-8 col-12">										<input type="text" name="nom_cli" id="nom_cli" maxlength="25" class="form-control casilla" placeholder="Nombres del cliente" pattern="[A-Za-záéíóúÑñ ]+" title="Solo Letras" value="<?php echo $datos['nom_cli']; ?>" disabled>									</div>								</div>								<hr class="pt-0 mt-2 mb-2 mt-0">								<div class="row mt-1 ml-3">									<div class="col-md-4 col-12 align-self-center text-left pt-2">										<label for=""><b>Apellidos:</b></label>									</div>									<div class="col-md-8 col-12">										<input type="text" name="ape_cli" id="ape_cli" maxlength="25" class="form-control casilla" placeholder="Apellidos del cliente" pattern="[A-Za-záéíóúÑñ ]+" title="Solo Letras" value="<?php echo $datos['ape_cli']; ?>"  disabled>									</div>								</div>															<hr class="pt-0 mt-2 mb-2 mt-0">								<div class="row mt-1 ml-3">									<div class="col-md-4 col-12 align-self-center text-left pt-2">										<label for=""><b>Teléfono Principal:</b></label>									</div>									<div class="col-md-4">										<input type="text" class="form-control casilla" name="te1_cli" id="te1_cli" placeholder="Número Telefónico Principal" pattern="[0-9]+" title="Solo Números"  value="<?php echo $datos['te1_cli']; ?>"  disabled>									</div>								</div>								<hr class="pt-0 mt-2 mb-2 mt-0">								<div class="row mt-1 ml-3">									<div class="col-md-4 col-12 align-self-center text-left pt-2">										<label for=""><b>Teléfono Secundario:</b></label>									</div>									<div class="col-md-4">										<input type="text" class="form-control casilla" name="te2_cli" id="te2_cli" placeholder="Número Telefónico Secundario" pattern="[0-9]+"  value="<?php echo $datos['te2_cli']; ?>"  title="Solo Números" disabled>									</div>								</div>								<hr class="pt-0 mt-2 mb-2 mt-0">								<div class="row mt-1 ml-3">									<div class="col-md-4 col-12 align-self-center text-left pt-2">										<label for=""><b>Estatus:</b></label>									</div>									<div class="col-md-4 col-12">										<select name="est_cli" id="est_cli" class="form-control casilla"  disabled>						     			<?php									 		 $selected = ($datos['est_cli']=='A') ? "selected":"";									 		 echo "<option value='A' $selected>Activo</option>";									 		 $selected = ($datos['est_cli']=='I') ? "selected":"";									 		 echo "<option value='I' $selected>Inactivo</option>";								 		 	?>										</select>									</div>								</div>								<div class="row mt-5">									<div class="col-12  text-center">										<a href="filtrar.php"><input type="button" class="btn btn-md btn-negrita cursor bg-azul" value="Volver a Filtrar clientes"></a>									</div>								</div>							</div>						</div>					</div>				</div>			</form>		</div>	</div></body></html>