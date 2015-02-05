<?php
include"funciones.php";
$a=new DataBase();
ini_set("memory_limit","64M");

$ds = DIRECTORY_SEPARATOR; 
$storeFolder = '../../img/temp';
if (!empty($_FILES)) {


	$tempFile = $_FILES['file']['tmp_name'];
	$nombre = $_FILES['file']['name'];

	$targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;

	$targetFile =  $targetPath. $_FILES['file']['name'];

	move_uploaded_file($tempFile,$targetFile);



	//Ruta de la imagen original
	$rutaImagenOriginal=$targetFile;

	//Creamos una variable imagen a partir de la imagen original
	$img_original = imagecreatefromjpeg($rutaImagenOriginal);

	//Se define el maximo ancho y alto que tendra la imagen final
	$max_ancho = 600;
	$max_alto = 600;

	//Ancho y alto de la imagen original
	list($ancho,$alto)=getimagesize($rutaImagenOriginal);

	//Se calcula ancho y alto de la imagen final
	$x_ratio = $max_ancho / $ancho;
	$y_ratio = $max_alto / $alto;


	//Si el ancho y el alto de la imagen no superan los maximos,
	//ancho final y alto final son los que tiene actualmente
	if( ($ancho <= $max_ancho) && ($alto <= $max_alto) ){//Si ancho
		$ancho_final = $ancho;
		$alto_final = $alto;
	}
	
	/* si proporcion horizontal*alto mayor que el alto maximo,
	* alto final es alto por la proporcion horizontal
	* es decir, le quitamos al ancho, la misma proporcion que
	* le quitamos al alto
	*/
	elseif (($x_ratio * $alto) < $max_alto){
		$alto_final = ceil($x_ratio * $alto);
		$ancho_final = $max_ancho;
	}
	
	/** Igual que antes pero a la inversa */
	
	else{
		$ancho_final = ceil($y_ratio * $ancho);
		$alto_final = $max_alto;
	}  



		//Creamos una imagen en blanco de tamaño $ancho_final  por $alto_final .
	$tmp=imagecreatetruecolor($ancho_final,$alto_final);

		//Copiamos $img_original sobre la imagen que acabamos de crear en blanco ($tmp)
	imagecopyresampled($tmp,$img_original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);

			//Se destruye variable $img_original para liberar memoria
	imagedestroy($img_original);


			//Definimos la calidad de la imagen final
	$calidad=95;
			//Se crea la imagen final en el directorio indicado
	$filetype =  $_FILES['file']['type'];
	$type = substr($filetype, (strpos($filetype,"/"))+1);
	$nombre=$a->generarClave("10").".".$type;
	imagejpeg($tmp,"../../img/".$_GET["carpeta"]."/".$nombre,$calidad);
	
			//Eliminamos la imagen temporal
	while(is_file("../../img/temp/".$_FILES['file']['name']) == TRUE)
	{
		chmod("../../img/temp/".$_FILES['file']['name'], 0666);
		unlink("../../img/temp/".$_FILES['file']['name']);
	}

	$a->insertaActualizaElimina("INSERT INTO imagen (idimagen, imagen, seccion, idproducto) VALUES ('', '".$nombre."', '".$_GET['seccion']."', '".$_GET['contenido']."')");

}


?>