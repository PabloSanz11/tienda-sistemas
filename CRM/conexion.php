<?php
	function Conectar(){
		$ServerName="localhost";
		$User="root";
		$Password="";
		$Bd="knowall";
		$Con=mysqli_connect($ServerName,$User,$Password,$Bd);
		return $Con;
	}

	function EjecutarConsulta($Con,$SQL){
		$query=mysqli_query($Con,$SQL) or die (mysqli_error($Con));
		return $query;
	}

	function Desconectar($Con){
		mysqli_close($Con);
	}
?>