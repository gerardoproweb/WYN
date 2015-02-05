<?php
include"funciones.php";
$a=new DataBase();

// EDITA EL SLIDER PRINCIPAL
if($_GET['a']==1){
// EDITA EL SLIDER PRINCIPAL

	
	if ($_GET["b"]==1) {
		$detalles=$a->detalles("SELECT banner FROM slider WHERE idbanner='".$_GET["id"]."'");
		$banner=$detalles[0]["banner"];
		while(is_file("../../img/masterslider/".$banner) == TRUE){
			chmod("../../img/masterslider/".$banner, 0666);
			unlink("../../img/masterslider/".$banner);
		}
		$a->insertaActualizaElimina("DELETE FROM slider WHERE idbanner='".$_GET["id"]."'");
		header("Location: ../portada.php?a=1");
		exit();
	}

	if (empty($_POST["editar"])) {
		$portada=$a->subirImagen("portada","../../img/masterslider/");
		$a->insertaActualizaElimina("INSERT INTO slider (idbanner, banner, titulo, descripcion, orden) VALUES ('', '".$portada."', '".mysql_real_escape_string($_POST["titulo"])."', '', '')");
	}else{
		if (!empty($_FILES["portada"]['name'])) {
			$portada=$a->subirImagen("portada","../../img/masterslider/");
			while(is_file("../../img/masterslider/".$_POST["portada2"]) == TRUE){
				chmod("../../img/masterslider/".$_POST["portada2"], 0666);
				unlink("../../img/masterslider/".$_POST["portada2"]);
			}
		}else{
			$portada=$_POST["portada2"];
		}
		$a->insertaActualizaElimina("UPDATE slider SET banner='".$portada."', titulo='".mysql_real_escape_string($_POST["titulo"])."' WHERE idbanner='".$_POST["editar"]."'");
	}
	header("Location: ../portada.php?a=1");


// EDITA PROMO INDEX
}else if($_GET['a']==metas){
// EDITA PROMO INDEX

	
		$a->insertaActualizaElimina("UPDATE metas SET titulo='".mysql_real_escape_string($_POST["titulo"])."', descripcion='".mysql_real_escape_string($_POST["descripcion"])."', keywords='".mysql_real_escape_string($_POST["keywords"])."', autor='".mysql_real_escape_string($_POST["autor"])."' ");
		
	header("Location: ../metas.php?a=1");	

// EDITA PRODUCTOS
}else if($_GET['a']==promo){
// EDITA PROMO INDEX
	
		$a->insertaActualizaElimina("UPDATE contenido SET titulo='".mysql_real_escape_string($_POST["titulo"])."', contenido='".mysql_real_escape_string($_POST["contenido"])."' WHERE seccion='promo'");

	header("Location: ../promo.php?a=1");	

// EDITA CLIENTES LOGOS
}else if($_GET['a']==eventos){
// EDITA CLIENTES LOGOS
		
		$a->insertaActualizaElimina("UPDATE contenido SET font='".mysql_real_escape_string($_POST["font"])."', titulo='".mysql_real_escape_string($_POST["titulo"])."', contenido='".mysql_real_escape_string($_POST["contenido"])."' WHERE seccion='eventos'");
	
	header("Location: ../eventos.php?a=1");


// EDITA PIE DE PAGINA
}else if($_GET['a']==events){
// EDITA CLIENTES LOGOS


	if ($_GET["b"]==1) {
		$a->insertaActualizaElimina("DELETE FROM contenido WHERE idcontenido='".$_GET["id"]."'");
		header("Location: ../eventos.php?a=1");
		exit();
	}

	if (empty($_POST["editar"])) {
		$a->insertaActualizaElimina("INSERT INTO contenido (idcontenido, alias, font, titulo, contenido, portada, seccion, fecha, orden) VALUES ('', '', '".$_POST["font"]."', '".mysql_real_escape_string($_POST["titulo"])."', '".mysql_real_escape_string($_POST["contenido"])."', '', 'items-eventos', CURRENT_TIMESTAMP, '')");
	}else{
		$a->insertaActualizaElimina("UPDATE contenido SET titulo='".mysql_real_escape_string($_POST["titulo"])."', font='".$_POST["font"]."', contenido='".mysql_real_escape_string($_POST["contenido"])."' WHERE idcontenido='".$_POST["editar"]."'");
	}
	header("Location: ../eventos.php?a=1");


// EDITA PIE DE PAGINA
}else if($_GET['a']==pie){
// EDITA PIE DE PAGINA

	
		$a->insertaActualizaElimina("UPDATE contenido SET font='".mysql_real_escape_string($_POST["font"])."', titulo='".mysql_real_escape_string($_POST["titulo"])."', contenido='".mysql_real_escape_string($_POST["contenido"])."' WHERE seccion='pie'");
	
	header("Location: ../pie.php?a=1");

// EDITA SECCION CLIENTES PORTADA
}else if($_GET['a']==nosotros){
// EDITA SECCION CLIENTES PORTADA
	
		$a->insertaActualizaElimina("UPDATE contenido SET font='".mysql_real_escape_string($_POST["font"])."', titulo='".mysql_real_escape_string($_POST["titulo"])."', contenido='".mysql_real_escape_string($_POST["contenido"])."' WHERE seccion='nosotros'");
	
	header("Location: ../nosotros.php?a=1");

// EDITA NUESTROS CLIENTES
}else if($_GET['a']==us){
// EDITA NUESTROS CLIENTES
	

		if ($_GET["b"]==1) {
		$detalles=$a->detalles("SELECT portada FROM contenido WHERE idcontenido='".$_GET["id"]."'");
		$banner=$detalles[0]["portada"];
		while(is_file("../../img/team/".$banner) == TRUE){
			chmod("../../img/team/".$banner, 0666);
			unlink("../../img/team/".$banner);
		}
		$a->insertaActualizaElimina("DELETE FROM contenido WHERE idcontenido='".$_GET["id"]."'");
		header("Location: ../nosotros.php?a=1");
		exit();
	}

	if (empty($_POST["editar"])) {
		$portada=$a->subirImagen("portada","../../img/team/");
		$a->insertaActualizaElimina("INSERT INTO contenido (idcontenido, alias, font, titulo, contenido, portada, seccion, fecha, orden) VALUES ('', '".mysql_real_escape_string($_POST["alias"])."', '".mysql_real_escape_string($_POST["font"])."', '".mysql_real_escape_string($_POST["titulo"])."', '".mysql_real_escape_string($_POST["contenido"])."', '".$portada."', 'nosotros-team', CURRENT_TIMESTAMP, '')");
	}else{
		if (!empty($_FILES["portada"]['name'])) {
			$portada=$a->subirImagen("portada","../../img/team/");
			while(is_file("../../img/team/".$_POST["portada2"]) == TRUE){
				chmod("../../img/team/".$_POST["portada2"], 0666);
				unlink("../../img/team/".$_POST["portada2"]);
			}
		}else{
			$portada=$_POST["portada2"];
		}
		$a->insertaActualizaElimina("UPDATE contenido SET alias='".mysql_real_escape_string($_POST["alias"])."', font='".mysql_real_escape_string($_POST["font"])."', titulo='".mysql_real_escape_string($_POST["titulo"])."', contenido='".mysql_real_escape_string($_POST["contenido"])."', portada='".$portada."' WHERE idcontenido='".$_POST["editar"]."'");
	}
	header("Location: ../nosotros.php?a=1");
	

// EDITA TABS 1
}else if($_GET['a']==atab){
// EDITA TABS 1

	if ($_GET["b"]==1) {
		$a->insertaActualizaElimina("DELETE FROM contenido WHERE idcontenido='".$_GET["id"]."'");
		header("Location: ../atab.php?a=1");
		exit();
	}

	if (empty($_POST["editar"])) {
		$a->insertaActualizaElimina("INSERT INTO contenido (idcontenido, alias, font, titulo, contenido, portada, seccion, fecha, orden) VALUES ('', '', '', '".mysql_real_escape_string($_POST["titulo"])."', '".mysql_real_escape_string($_POST["contenido"])."', '', 'tab-a', CURRENT_TIMESTAMP, '')");
	}else{
		$a->insertaActualizaElimina("UPDATE contenido SET titulo='".mysql_real_escape_string($_POST["titulo"])."', contenido='".mysql_real_escape_string($_POST["contenido"])."' WHERE idcontenido='".$_POST["editar"]."'");
	}
	header("Location: ../atab.php?a=1");	

// EDITA TABS 1
}else if($_GET['a']==btab){
// EDITA TABS 1

	if ($_GET["b"]==1) {
		$a->insertaActualizaElimina("DELETE FROM contenido WHERE idcontenido='".$_GET["id"]."'");
		header("Location: ../btab.php?a=1");
		exit();
	}

	if (empty($_POST["editar"])) {
		$a->insertaActualizaElimina("INSERT INTO contenido (idcontenido, alias, font, titulo, contenido, portada, seccion, fecha, orden) VALUES ('', '', '', '".mysql_real_escape_string($_POST["titulo"])."', '".mysql_real_escape_string($_POST["contenido"])."', '', 'tab-b', CURRENT_TIMESTAMP, '')");
	}else{
		$a->insertaActualizaElimina("UPDATE contenido SET titulo='".mysql_real_escape_string($_POST["titulo"])."', contenido='".mysql_real_escape_string($_POST["contenido"])."' WHERE idcontenido='".$_POST["editar"]."'");
	}
	header("Location: ../btab.php?a=1");

}else if($_GET['a']==9){

		if (!empty($_FILES["portada"]['name'])) {
			$portada=$a->subirImagen("portada","../../images/");
			while(is_file("../../images/".$_POST["portada2"]) == TRUE){
				chmod("../../images/".$_POST["portada2"], 0666);
				unlink("../../images/".$_POST["portada2"]);
			}
		}else{
			$portada=$_POST["portada2"];
		}
		$a->insertaActualizaElimina("UPDATE contenido SET titulo='".mysql_real_escape_string($_POST["titulo"])."', contenido='".mysql_real_escape_string($_POST["contenido"])."', portada='".$portada."' WHERE idcontenido='29'");
	header("Location: ../promoclients.php?a=1");


}else if($_GET['a']==10){



	parse_str($_POST['pages'], $pageOrder);
		foreach ($pageOrder['page'] as $key => $value) {
			$a->insertaActualizaElimina("UPDATE contenido SET orden = '".$key."' WHERE idcontenido='".$value."'");
	}



}else if($_GET['a']==11){



	parse_str($_POST['pages'], $pageOrder);
		foreach ($pageOrder['page'] as $key => $value) {
			$a->insertaActualizaElimina("UPDATE banner SET orden = '".$key."' WHERE idbanner='".$value."'");
	}	


// EDITA GALERIA O PORTAFOLIO
}else if($_GET['a']==12){
// EDITA GALERIA O PORTAFOLIO


	if ($_GET["b"]==1) {
		$a->insertaActualizaElimina("DELETE FROM contenido WHERE idcontenido='".$_GET["id"]."'");
		$a->eliminarImagenes($_GET["id"],"productos");
		header("Location: ../productos.php?a=1");
		exit();
	}
	$alias=$a->alias($_POST["titulo"]);
	$existe_alias=$a->Contar("SELECT COUNT(*) from productos WHERE alias='".$alias."'");
		$i=0;
		while ($existe_alias >= 1) {
			$alias=$alias."-".$i;
			$existe_alias=$a->Contar("SELECT COUNT(*) from productos WHERE alias='".$alias."'");
			$i++;
		}

	if(empty($_POST["editar"])){
		// INSERT FILES 
		if(!empty($_FILES['font']['name'])){
		$archivo=$_FILES['font']['name'];
		$nombre=$_FILES['font']['name'];
		$tipoportada=end(explode(".", $archivo));
		if ($_FILES['font']["error"] > 0){
			echo "Error: " . $_FILES['font']['error'] . "<br>";
			exit;		
		}else{
			$tipos = array("pdf", "PDF");
			if (!in_array($tipoportada, $tipos)) {
				header("Location: ../´procesa.php?a=2");
				exit;
			}
		}

			
			//if($tipoportada != "jpg" || $tipoportada != "JPG" || $tipoportada != "jpeg" || $tipoportada != "JPEG" || $tipoportada != "png" || $tipoportada != "PNG" || $tipoportada != "gif" || $tipoportada != "GIF"){
				//header("Location: ../nuevo-producto.php?a=5");
			//}
		$i=1;		
		while(file_exists("../../catalogo/".$nombre)){
			$nombre=$i."-".$nombre;
			$i++;
		}
		
			move_uploaded_file($_FILES['font']['tmp_name'], "../../catalogo/".$nombre);

			while(is_file("../../catalogo/".$_POST['archivo2']) == TRUE){
				chmod("../../catalogo/".$_POST['archivo2'], 0666);
				unlink("../../catalogo/".$_POST['archivo2']);
			}

			}else{
				$nombre=$_POST['archivo2'];
			
			}
		// END INSERT FILES
		//$a->insertaActualizaElimina("INSERT INTO productos (idproducto, alias, titulo, contenido, video, portada, idcontenido, fecha) VALUES (NULL, '".$alias."', '".mysql_real_escape_string($_POST["titulo"])."', '".mysql_real_escape_string($_POST["contenido"])."', '',  archivo='".$nombre."', '', 'productos', CURRENT_TIMESTAMP)");
		$a->insertaActualizaElimina("INSERT INTO contenido (idcontenido, alias, font, titulo, contenido, portada, seccion, fecha, orden) VALUES (NULL, '".$alias."', '".$nombre."', '".mysql_real_escape_string($_POST["titulo"])."', '".mysql_real_escape_string($_POST["contenido"])."', '', 'productos', CURRENT_TIMESTAMP, '')");
	}else{
		
		// INSERT FILES 
		if(!empty($_FILES['font']['name'])){
		$archivo=$_FILES['font']['name'];
		$nombre=$_FILES['font']['name'];
		$tipoportada=end(explode(".", $archivo));
		if ($_FILES['font']["error"] > 0){
			echo "Error: " . $_FILES['font']['error'] . "<br>";
			exit;		
		}else{
			$tipos = array("pdf", "PDF");
			if (!in_array($tipoportada, $tipos)) {
				header("Location: ../productos.php?a=2");
				exit;
			}
		}

			
			//if($tipoportada != "jpg" || $tipoportada != "JPG" || $tipoportada != "jpeg" || $tipoportada != "JPEG" || $tipoportada != "png" || $tipoportada != "PNG" || $tipoportada != "gif" || $tipoportada != "GIF"){
				//header("Location: ../nuevo-producto.php?a=5");
			//}
		$i=1;		
		while(file_exists("../../catalogo/".$nombre)){
			$nombre=$i."-".$nombre;
			$i++;
		}
		
			move_uploaded_file($_FILES['font']['tmp_name'], "../../catalogo/".$nombre);

			while(is_file("../../catalogo/".$_POST['archivo2']) == TRUE){
				chmod("../../catalogo/".$_POST['archivo2'], 0666);
				unlink("../../catalogo/".$_POST['archivo2']);
			}

			}else{
				$nombre=$_POST['archivo2'];
			
			}
		// END INSERT FILES
		$a->insertaActualizaElimina("UPDATE contenido SET alias='".$alias."',  font='".$nombre."', titulo='".mysql_real_escape_string($_POST["titulo"])."', contenido='".mysql_real_escape_string($_POST["contenido"])."'  WHERE idcontenido='".$_POST["editar"]."'");
	}
	header("Location: ../productos.php?a=1");


// EDITA GALERIA O PORTAFOLIO DESDE IMAGENES.PHP
}else if($_GET['a']==12.1){
// EDITA GALERIA O PORTAFOLIO DESDE IMAGENES.PHP


	$detalles=$a->detalles("SELECT imagen FROM imagen WHERE idimagen='".$_GET["id"]."'");
	$imagen=$detalles[0]["imagen"];
	while(is_file("../../img/".$_GET["carpeta"]."/".$imagen) == TRUE){
		chmod("../../img/".$_GET["carpeta"]."/".$imagen, 0666);
		unlink("../../img/".$_GET["carpeta"]."/".$imagen);
	}

	$a->insertaActualizaElimina("DELETE FROM imagen WHERE idimagen='".$_GET["id"]."'");
	header("Location: ../imagenes.php?a=1&contenido=".$_GET["contenido"]."&carpeta=".$_GET["carpeta"]."&seccion=".$_GET["seccion"]);





}
?>