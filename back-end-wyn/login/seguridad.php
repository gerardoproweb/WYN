<?php

require_once 'MySQL_Datos.php';
/**
 * @author martinezpi
 * @version 1.0
 * @created 16-nov-2010 10:49:52 p.m.
 */
class Seguridad
{
	private $ap_materno;
	private $ap_paterno;
	private $login;
	private $nombre;
	private $password;
	private $objConexion=null;

	function __construct()
	{	
		$this->objConexion = new MySQL_Datos("localhost","demo_web","root","root");			
		$this->objConexion->connectaMySQL();		
		$this->objConexion->seleccionaBD();			
	}
	
	function __destruct()
	{
		if ($this->objConexion)
		{
			try 
			{
				$this->objConexion->desconectaMySQL();
				$this->objConexion=null;				
			}
			catch (Exception  $ex)
			{
				echo $ex->getMessage();
				exit(-1);
				
			}
		}
	}

	/**
	 * 
	 * @param id_usuario
	 */
	 function validarUsuario($login, $password){
	 	$registros=0;
		$query="";	
		$query = "SELECT * from usuario where usuario='$login' and password = '".$password."';";
		$this->objConexion->setQuery($query);
		$this->objConexion->executaQuery();		
		$numeroRegistros = $this->objConexion->numeroRegistros();
		if($numeroRegistros >= 1){
			return TRUE;
		}
		else{
			return FALSE;
	  }
	 }
	}

?>
