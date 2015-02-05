<?php
error_reporting(NULL);

session_start();
if(!isset($_SESSION['login']))
{
    header("Location: index.php?f=1");
	exit();
}

include"php/funciones.php";
$a=new DataBase();
?>
<div class="panel-body" id="dze_info">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th width="20%">Imagen</th>
				<th width="20%">Nombre</th>
				<th width="20%">Sección</th>
				<th width="10%">Tamaño</th>
				<th width="10%">Tipo</th>
				<th width="20%">Estatus</th>
				<th></th>
			</tr>
		</thead>								
		<tbody>
			<?php $a->listarTablaImagenes($_GET['contenido'],$_GET['carpeta'],$_GET['seccion']) ?>
		</tbody>
		<tfoot>
			<tr>
				<th width="20%">Imagen</th>
				<th width="20%">Nombre</th>
				<th width="20%">Sección</th>
				<th width="10%">Tamaño</th>
				<th width="10%">Tipo</th>
				<th width="20%">Estatus</th>
				<th></th>
			</tr>

		</tfoot>
	</table>
</div>