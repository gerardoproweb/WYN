<?php 
class DataBase{
	private $Maquina;
	private $Usuario;
	private $Pass;
	private $BD;
	
	function __construct(){
		$this->Maquina="localhost";
		/*$this->Usuario="root";
		$this->Pass="root";
		$this->BD="maco_web";*/
		$this->Usuario="maccomx_usr01";
		$this->Pass="hhP1T@Cu#q]m";
		$this->BD="maccomx_web";
		global $conectado;
		$this->conexion = mysql_connect($this->Maquina,$this->Usuario,$this->Pass,$this->BD);
		mysql_select_db($this->BD, $this->conexion);
		if($this->conexion){
			$conectado = true;
		}else{
			$conectado = false;
		}
	}
	
	function cortarTexto($string, $limit, $break=".", $pad="…"){
		if(strlen($string) <= $limit)
			return $string;
		if(false !== ($breakpoint = strpos($string, $break, $limit))){
			if($breakpoint < strlen($string)-1) {
				$string = substr($string, 0, $breakpoint) . $pad;
			}
		}
		return $string;

		// Comprueba que la cadena es más larga que el número introducido. 
		// Si es más corta, se deja tal cual.
//		if (strlen($str) < $num) {
//			return $str;
//		}else{
//			$str = substr($str,0,$num);
//			return substr($str,0, -(strlen($str)-strrpos($str,' ')) ).'...';
//		}
	}
	


	function alias($url) {
		// Tranformamos todo a minusculas
		$url = strtolower($url);
		//Rememplazamos caracteres especiales latinos
		$find = array('á', 'é', 'í', 'ó', 'ú', 'ñ');
		$repl = array('a', 'e', 'i', 'o', 'u', 'n');
		$url = str_replace ($find, $repl, $url);
		// Añaadimos los guiones
		$find = array(' ', '&', '\r\n', '\n', '+'); 
		$url = str_replace ($find, '-', $url);
		// Eliminamos y Reemplazamos demás caracteres especiales
		$find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');
		$repl = array('', '-', '');
		$url = preg_replace ($find, $repl, $url);
		return $url;
	}



	function generarClave($longitud){
		$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
		$cad = "";
		for($i=0;$i<$longitud;$i++) {
			$cad .= substr($str,rand(0,62),1);
		}
		return $cad;
	} 



	function limpia_espacios($cadena){
		$cadena = str_replace(' ', '', $cadena);
		return $cadena;
	}


	function insertaActualizaElimina($sql){
		mysql_query ($sql,$this->conexion)or die("erro al insertar los datos, ". mysql_errno()." ".mysql_error());
		$this->id = mysql_insert_id($this->conexion);
	}
	
	function obtenerID(){
		return $this->id;
	}

	function detalles($sql){ //SELECT * FROM inmuebles WHERE id=".$id
		$this->sql=$sql;
		$this->consulta = mysql_query($this->sql,$this->conexion) or die ("error en la consulta".mysql_errno()." ".mysql_error());
		while($row = mysql_fetch_array($this->consulta)){
			$this->detalles[]=$row;
		}
		return $this->detalles;
	}
	
	function subirImagen($imagen,$directorio){
		$portada=$_FILES[$imagen]['name'];
		$tipoportada=end(explode(".", $portada));
		if ($_FILES[$imagen]["error"] > 0){
			return "Error: " . $_FILES[$imagen]['error'] . "<br>";
			exit;
		}else{
			$tipos = array("jpg", "JPG", "jpeg", "JPEG", "png", "PNG", "gif", "GIF");
			if (!in_array($tipoportada, $tipos)) {
				return "Error: Solo Imágenes<br>";
				exit;
			}

			$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
			$cad = "";
			for($i=0;$i<12;$i++) {
				$cad .= substr($str,rand(0,62),1);
			}
		}

		$nombre_imagen=$cad.".".$tipoportada;
		move_uploaded_file($_FILES[$imagen]['tmp_name'], $directorio.$nombre_imagen);
		return $nombre_imagen;
	}



//-----------------------------


	function listarBanner(){
		$this->sql="SELECT * FROM slider ORDER BY orden ASC";
		$this->consulta = mysql_query($this->sql,$this->conexion) or die ("error en la consulta".mysql_errno()." ".mysql_error());
		while($row = mysql_fetch_array($this->consulta)){
			echo'<div  class="ms-slide" data-delay="5" data-fill-mode="fill"  >
					<img src="masterslider/blank.gif" alt="" title="" data-src="img/masterslider/'.$row["banner"].'" />
					<div  class="ms-layer hidden-xs msp-cn-2-1" style=""  data-effect="t(true,150,n,n,n,n,n,n,n,n,n,n,n,n,n)"   data-ease="easeOutQuint"              data-widthlimit="768"  data-offset-x="0" data-offset-y="0" data-origin="mc" >
            <h3><span class="color1 back">'.$row["titulo"].'</span></h3></div>
					<img  class="ms-layer" src="img/logo-blanco.png" data-src="img/logo-blanco.png" alt="" style="" data-effect="t(true,-250,n,n,n,n,250,n,n,n,n,n,n,n,n)"   data-ease="easeOutQuint"        data-type="image"      data-widthlimit="768"   data-offset-x="0" data-offset-y="-280" data-origin="mc" />
				</div>
			';
		}		
	}
	function Promo(){
		$this->sql="SELECT * FROM contenido WHERE seccion='promo' ";
		$this->consulta = mysql_query($this->sql,$this->conexion) or die ("error en la consulta".mysql_errno()." ".mysql_error());
		while($row = mysql_fetch_array($this->consulta)){
			echo '<h3 class="text-shadow">'.$row["titulo"].'</h3>
                  <h3 class="text-shadow">'.$row["contenido"].'</h3>
                ';
		}		
	}
	
	function PiedePagina(){
		$this->sql="SELECT * FROM contenido WHERE seccion='pie' ";
		$this->consulta = mysql_query($this->sql,$this->conexion) or die ("error en la consulta".mysql_errno()." ".mysql_error());
		while($row = mysql_fetch_array($this->consulta)){
			echo '<div class="col-xs-12 col-sm-4">
		            <h2 class="second white">'.$row["font"].'</h2>
		            <h3 class="color1">'.$row["titulo"].'</h3>
		            <div class="spacer20"></div>  
		          </div>
		          		'.$row["contenido"].'
		          				';
		}		
	}
	// SECCION EVENTOS
	function PortadaEventos(){
		$this->sql="SELECT * FROM contenido WHERE seccion='eventos' ";
		$this->consulta = mysql_query($this->sql,$this->conexion) or die ("error en la consulta".mysql_errno()." ".mysql_error());
		while($row = mysql_fetch_array($this->consulta)){
			echo '<h2 class="second">'.$row["font"].'</h2>
		          <h3>'.$row["titulo"].'</h3>
		        </div>
		        <div class="col-md-8">
		          <blockquote>'.$row["contenido"].'</blockquote>
		        </div>
				';
		}		
	}
	function ServiciosEventos(){
		$this->sql="SELECT * FROM contenido WHERE seccion='items-eventos' ORDER BY orden ASC ";
		$this->consulta = mysql_query($this->sql,$this->conexion) or die ("error en la consulta".mysql_errno()." ".mysql_error());
		while($row = mysql_fetch_array($this->consulta)){
			echo '<div class="col-md-4">
		          <div class="services">
		            <div class="services-icon">
		              <i class="fa '.$row["font"].'"></i>              
		              <h4>'.$row["titulo"].'</h4>
		            </div>
		            <div class="services-text">              
		              '.$row["contenido"].'
		            </div>
		          </div>
		        </div>
				';
		}		
	}
	

	// SECCION NOSOTROS
	function PortadaNosotros(){
		$this->sql="SELECT * FROM contenido WHERE seccion ='nosotros'";
		$this->consulta = mysql_query($this->sql,$this->conexion) or die ("error en la consulta".mysql_errno()." ".mysql_error());
		while($row = mysql_fetch_array($this->consulta)){
			echo'<h2 class="second">'.$row["font"].'</h2>
		          <h3>'.$row["titulo"].'</h3>
		        </div>
		        <div class="col-md-8">
		          <blockquote>'.$row["contenido"].'</blockquote>
		        </div>
			';
		}		
	}
	function NosotrosTeam(){
		$this->sql="SELECT * FROM contenido WHERE seccion ='nosotros-team' ORDER BY orden ASC";
		$this->consulta = mysql_query($this->sql,$this->conexion) or die ("error en la consulta".mysql_errno()." ".mysql_error());
		while($row = mysql_fetch_array($this->consulta)){
			echo'<div class="col-xs-12 col-sm-6 col-md-3">
		          <div class="team">
		            <div class="team-image">
		                <img src="img/team/'.$row["portada"].'" alt="'.$row["titulo"].'"> 
		            </div>
		            <div class="team-text">              
		              <a href="#" class="team-name">'.$row["titulo"].'</a>
		              <h5 class="team-function">'.$row["contenido"].'</h5>
		              <ul class="social-2">';
		     if($row["font"]!=''){
                    echo '<li><a href="'.$row["font"].'" rel="external" target="_blank"><i class="fa fa-facebook"></i></a></li>
		              ';
             };
             if($row["alias"]!=''){
                    echo '<li><a href="'.$row["alias"].'" rel="external" target="_blank"><i class="fa fa-twitter"></i></a></li>
		              ';
             };
             echo '</ul>
		            </div>
		          </div>
		        </div>';
		}		
	}
	function Tabs1(){
		$this->sql="SELECT * FROM contenido WHERE seccion ='tab-a' ORDER BY orden ASC";
		$this->consulta = mysql_query($this->sql,$this->conexion) or die ("error en la consulta".mysql_errno()." ".mysql_error());
		while($row = mysql_fetch_array($this->consulta)){
			echo'<div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion-a" href="#collapse-'.$row["idcontenido"].'" class="collapsed">
                 '.$row["titulo"].'
                </a>
                </h4>
              </div>
              <div id="collapse-'.$row["idcontenido"].'" class="panel-collapse collapse ">
                <div class="panel-body">
                  '.$row["contenido"].'
                </div>
              </div>
            </div>';
		}		
	}
	function Tabs2Titles(){
		$this->sql="SELECT * FROM contenido WHERE seccion ='tab-b' ORDER BY orden ASC";
		$this->consulta = mysql_query($this->sql,$this->conexion) or die ("error en la consulta".mysql_errno()." ".mysql_error());
		while($row = mysql_fetch_array($this->consulta)){
			echo'<li><a href="#'.$row["seccion"].'-'.$row["idcontenido"].'" data-toggle="tab">'.$row["titulo"].'</a></li>';
		}		
	}
	function Tabs2Content(){
		$this->sql="SELECT * FROM contenido WHERE seccion ='tab-b' ORDER BY orden ASC";
		$this->consulta = mysql_query($this->sql,$this->conexion) or die ("error en la consulta".mysql_errno()." ".mysql_error());
		while($row = mysql_fetch_array($this->consulta)){
			echo'<div class="tab-pane " id="'.$row["seccion"].'-'.$row["idcontenido"].'">'.$row["contenido"].'</div>';
		}		
	}

}
?>