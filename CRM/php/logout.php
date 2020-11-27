<?php
	include('conexion.php');

	if(isset($_SESSION['idEmpleado']) && isset($_SESSION['tiempo'])){
		$ultimaConexion = $_SESSION['tiempo'];
		$idEmpleado = $_SESSION['idEmpleado'];
		$sql = "UPDATE empleados SET ultimaCon = '$ultimaConexion' WHERE idEmpleado = '$idEmpleado'";
		$res = consulta($sql);
	}
	session_start();
	session_unset();
	session_destroy();
	header("Location:../login.html");

?>
