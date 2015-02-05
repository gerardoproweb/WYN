<?php

/**
 * Clase que permite el Acceso a Datos con el motor de MYSQL
 * @author Hugo Diego López Martínez
 * @version 1.0
 * @copyright HDLM2010
 * @package SCAB
 * @subpackage Capa de Acceso a Datos
 * @desc Clase que permite el Acceso a Datos con MYSQL.  
 */


class MySQL_Datos  {
	private $strHost = "localhost";
	private $strBD = "demo_web";
	private $strUserName = "root";
	private $strPassword = "root";
	private $strQuery;
	private $ligaMySQL;
	private $setResultados;	
	
	/**
	 * Constructor de la Clase MySQL_Datos
	 *
	 * @param string $host
	 * @param string $bd
	 * @param string $usuario
	 * @param string $password
	 */	
	public function __construct() {	
		/*$this->strHost=$host;
		$this->strBD=$bd;
		$this->strUserName=$usuario;
		$this->strPassword=$password;	
		*/	
	}

	/**
	 * Destructor de la Clase MySQL_Datos
	 *
	 */
	public function __destruct() {
		if ($this->ligaMySQL){
			try {
			mysql_close($this->ligaMySQL);	
			//echo "Mandó al chicle la conexión";
			}
			catch (Exception $ex){
				echo "Error al desconectar de la BD.: ".$ex->getMessage();
			}			
		}		
	}
	
	/**
	 * Setter que permite acceder a la propiedad query.
	 *
	 * @param string $query
	 * @return void
	 * @access public	 
	 */	
	public function setQuery($query) 
	{
		$this->strQuery=$query;	
	}
	
	/**
	 * Método que permite establecer una conexión concurrente con la base de datos
	 * @param null
	 * @return void 
	 * 
	 */
	public function connectaMySQL()
	{
	
		try
		{		
			$this->ligaMySQL=mysql_pconnect($this->strHost, $this->strUserName, $this->strPassword);
		}
		catch (Exception $ex)
		{
			//echo "Se ha producido un Error al conectarse a la BD del Punto de Venta";
			echo $ex;			
		}
	}
	
	/**
	 * Método que permite seleccionar la Base de Datos que será utilizada.
	 * Es el equivalente en SQL a utilizar use database.
	 *
	 */
	public function seleccionaBD() {
		try {
			mysql_select_db($this->strBD);	
		}
		catch (Exception $ex) {
			echo "No se pudo seleccionar la base de datos ".$this->strBD;
			echo $ex->getMessage();
		}		
	}
	
	/**
	 * Permite liberar la conexión a la base de datos
	 *
	 */
	public function desconectaMySQL() {
		if ($this->ligaMySQL) {
			mysql_close($this->ligaMySQL);
			$this->ligaMySQL=null;
		}		
	}
	
	/**
	 * Permite ejecutar el query previamente establecido.
	 *
	 */
	public function executaQuery() {
		if ($this->ligaMySQL) {
			try {
				$this->setResultados=mysql_query($this->strQuery,$this->ligaMySQL);
			}	
			catch (Exception $ex)		
			{
				echo "Error al ejecutar el Query ";
				echo $ex->getMessage();
			}
		} 
		else  {
            throw new Exception("Error no controlado en: Class MYSQL_Datos. Error al establecer conexion con la base de datos.", 2104);
          }  		
	}
	
	/**
	 * Permite obtener los registros devueltos por la consulta.
	 *
	 * @return int
	 */
	public function numeroRegistros() {
		if ($this->setResultados) {
			return mysql_num_rows($this->setResultados);
		}
	}
	
	/**
	 * Permite determinar si la consulta arrojó registros
	 *
	 * @return bool
	 */
	public function hayRegistros(){
		try
		{
			if ($this->numeroRegistros()>0) 
				return true;
			else 
				return false;	
		}
		
		catch(Exception $ex)
		{
			echo $ex->getMessage();
		}		
	}
	
	/**
	 * Regresa los registros obtenidos al ejecutar la consulta
	 *
	 * @return array 
	 */
	public function devuelveRegistros(){
		$registros;
		if ($this->hayRegistros()) {
			while ($row=mysql_fetch_assoc($this->setResultados)) {				
				$registros[]=$row;
			}		
		}
		return $registros;
	}

}
?>
