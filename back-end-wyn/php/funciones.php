<?php 
class DataBase{
	private $Maquina;
	private $Usuario;
	private $Pass;
	private $BD;
	
	function __construct(){
		$this->Maquina="localhost";
		$this->Usuario="root";
		$this->Pass="root";
		$this->BD="maco_web";
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


	function listar(){
		$this->sql="SELECT * FROM imagenes WHERE idimagenes='".$banner."'";
		$this->consulta = mysql_query($this->sql,$this->conexion) or die ("error en la consulta".mysql_errno()." ".mysql_error());
		while($row = mysql_fetch_array($this->consulta)){
			echo "<li><img src='imagenes2/".$row['imagenes']."'/></li>";
		}		
	}


	
	function Contar($query){//SELECT COUNT(*) from blog
		$result = mysql_query($query,$this->conexion);
		$count = mysql_fetch_array($result);
		return $count[0];
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

	function tablaBannerAdmin(){
		$this->sql="SELECT * FROM slider ORDER BY orden ASC";
		$this->consulta = mysql_query($this->sql,$this->conexion) or die ("error en la consulta".mysql_errno()." ".mysql_error());
		while($row = mysql_fetch_array($this->consulta)){
			echo"<tr id='page_".$row["idbanner"]."'>
			<td><i class='entypo-arrow-combo'></i></td>
			<td><img src='../img/masterslider/".$row['banner']."' width='200' /></td>
			<td>".$row['titulo']."</td>
			<td>
			<a href='?portada=".$row['idbanner']."' class='btn btn-default btn-sm btn-icon icon-left'>
			<i class='entypo-pencil'></i>
			Editar
			</a>	
			<br><br>
			<a href=\"javascript:$('#modal-1').modal('show');\" data-id='".$row['idbanner']."' class='eliminar btn btn-danger btn-sm btn-icon icon-left'>
			<i class='entypo-cancel'></i>
			Eliminar
			</a>	
			</td>
			</tr>";
		}		
	}
	
	// SECCION EVENTOS ITEMS
	function tablaEventos(){
		$this->sql="SELECT * FROM contenido WHERE seccion='items-eventos' ORDER BY orden ASC";
		$this->consulta = mysql_query($this->sql,$this->conexion) or die ("error en la consulta".mysql_errno()." ".mysql_error());
		while($row = mysql_fetch_array($this->consulta)){
			echo"<tr id='page_".$row["idcontenido"]."'>
			<td><i class='fa ".$row['font']."'></i></td>
			<td>".$row['titulo']."</td>
			<td>".$row['contenido']."</td>
			<td>
			<a href='?eventos=".$row['idcontenido']."' class='btn btn-default btn-sm btn-icon icon-left'>
			<i class='entypo-pencil'></i>
			Editar
			</a>	
			<br><br>
			 <a href=\"javascript:$('#modal-1').modal('show');\" data-id='".$row['idcontenido']."' class='eliminar btn btn-danger btn-sm btn-icon icon-left'>
			<i class='entypo-cancel'></i>
			Eliminar
			</a>
			</td>
			</tr>";
		}		
	}


	// SECCION NOSOTROS
	function tablaTeam(){
		$this->sql="SELECT * FROM contenido WHERE seccion='nosotros-team' ORDER BY orden ASC";
		$this->consulta = mysql_query($this->sql,$this->conexion) or die ("error en la consulta".mysql_errno()." ".mysql_error());
		while($row = mysql_fetch_array($this->consulta)){
			echo"<tr id='page_".$row["idcontenido"]."'>
			<td><i class='entypo-arrow-combo'></i></td>
			<td><img src='../img/team/".$row['portada']."' width='100' /></td>
			<td>".$row['titulo']."</td>
			<td>".$row['contenido']."</td>
			<td>
			<a href='?nosotros=".$row['idcontenido']."' class='btn btn-default btn-sm btn-icon icon-left'>
			<i class='entypo-pencil'></i>
			Editar
			</a>	
			<br><br>
			 <a href=\"javascript:$('#modal-1').modal('show');\" data-id='".$row['idcontenido']."' class='eliminar btn btn-danger btn-sm btn-icon icon-left'>
			<i class='entypo-cancel'></i>
			Eliminar
			</a>	
			</td>
			</tr>";
		}		
	}
	function tablaTab1(){
		$this->sql="SELECT * FROM contenido WHERE seccion='tab-a' ORDER BY orden ASC";
		$this->consulta = mysql_query($this->sql,$this->conexion) or die ("error en la consulta".mysql_errno()." ".mysql_error());
		while($row = mysql_fetch_array($this->consulta)){
			echo"<tr id='page_".$row["idcontenido"]."'>
			<td><i class='entypo-arrow-combo'></i></td>
			<td>".$row['titulo']."</td>
			<td>".$row['contenido']."</td>
			<td>
			<a href='?atab=".$row['idcontenido']."' class='btn btn-default btn-sm btn-icon icon-left'>
			<i class='entypo-pencil'></i>
			Editar
			</a>	
			<br><br>
			 <a href=\"javascript:$('#modal-1').modal('show');\" data-id='".$row['idcontenido']."' class='eliminar btn btn-danger btn-sm btn-icon icon-left'>
			<i class='entypo-cancel'></i>
			Eliminar
			</a>	
			</td>
			</tr>";
		}		
	}
	function tablaTab2(){
		$this->sql="SELECT * FROM contenido WHERE seccion='tab-b' ORDER BY orden ASC";
		$this->consulta = mysql_query($this->sql,$this->conexion) or die ("error en la consulta".mysql_errno()." ".mysql_error());
		while($row = mysql_fetch_array($this->consulta)){
			echo"<tr id='page_".$row["idcontenido"]."'>
			<td><i class='entypo-arrow-combo'></i></td>
			<td>".$row['titulo']."</td>
			<td>".$row['contenido']."</td>
			<td>
			<a href='?btab=".$row['idcontenido']."' class='btn btn-default btn-sm btn-icon icon-left'>
			<i class='entypo-pencil'></i>
			Editar
			</a>	
			<br><br>
			 <a href=\"javascript:$('#modal-1').modal('show');\" data-id='".$row['idcontenido']."' class='eliminar btn btn-danger btn-sm btn-icon icon-left'>
			<i class='entypo-cancel'></i>
			Eliminar
			</a>	
			</td>
			</tr>";
		}		
	}
	







	function listarContenido($id,$campo){
			$this->sql="SELECT * FROM contenido WHERE idcontenido='".$id."'";
			$this->consulta = mysql_query($this->sql,$this->conexion) or die ("error en la consulta".mysql_errno()." ".mysql_error());
			while($row = mysql_fetch_array($this->consulta)){
				echo $row[$campo];
			}		
		}

	function eliminarImagenes($idcontenido,$carpeta,$seccion){
		$this->sql2="SELECT * FROM imagen WHERE idcontenido='".$idcontenido."'";
		$this->consulta2 = mysql_query($this->sql2,$this->conexion) or die ("error en la consulta".mysql_errno()." ".mysql_error());
		while($row2 = mysql_fetch_array($this->consulta2)){
			$banner=$row2['imagen'];
			while(is_file("../../img/".$carpeta."/".$banner) == TRUE){
				chmod("../../img/".$carpeta."/".$banner, 0666);
				unlink("../../img/".$carpeta."/".$banner);
			}
		}
		$this->insertaActualizaElimina("DELETE FROM imagen WHERE idcontenido='".$idcontenido."'");
	}


	function listarTablaImagenes($idproducto,$carpeta,$seccion){
		$this->sql="SELECT * FROM imagen WHERE idproducto='".$idproducto."'";
		$this->consulta = mysql_query($this->sql,$this->conexion) or die ("error en la consulta".mysql_errno()." ".mysql_error());
		while($row = mysql_fetch_array($this->consulta)){
			echo"<tr class='success'>
			<td class='name'><img src='../img/".$carpeta."/".$row['imagen']."' width='100%'></td>
			<td class='name'>".$row['imagen']."</td>
			<td class='name'>".$row['seccion']."</td>
			<td class='size'>".number_format((filesize("../img/".$carpeta."/".$row['imagen'])) / 1048576, 2)." MB</td><td class='type'>image/jpeg</td>
			<td class='status'>Cargada <i class='entypo-check'></i></td>
			<td class='status' style='background: red;'><a href=\"javascript:$('#modal-1').modal('show');\" data-id='".$row['idimagen']."' class='entypo-cancel eliminar' style='color: #FFF; font-size: 22px;'></a></td>
					</tr>"; //'php/procesa.php?a=11&imagen=".$row['idimagenes']."&inmueble=".$idpropiedades."'
		}		
	}







	









	
}
?>
