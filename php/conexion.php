<?php
	function conectate(){
		//$con = mysqli_connect('localhost','root','','sis-pruebas');
		$con = mysqli_connect('us-cdbr-east-02.cleardb.com','b5bb920c4d74d4','7b5379b9','heroku_2eb4075a39b1458');
		return $con;
	}

	function consulta($query){
		$conexion  = conectate();
		$res = mysqli_query($conexion,$query);
		mysqli_close($conexion);
		return $res;
	}

	function aplicarCambios()
	{
		$conexion  = conectate();
		$res = mysqli_commit($conexion);
		return $res;
	}
?>
