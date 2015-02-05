<?php
include("seguridad.php");
if(isset($_POST['login']) and isset($_POST['password'])){
	
	$login = $_POST['login'];
	$_SESSION['usuario'] = $login;
	$password = $_POST['password'];
	$SeguridadObjeto = new Seguridad();
	$validacion = $SeguridadObjeto->validarUsuario($login, $password);
	if($validacion == TRUE){
	$_SESSION["login"] ='1';
		
		header("Location: index.php");
	}else{
		header("Location: index.php?f=1");
	}
}
?>
