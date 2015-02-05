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
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>WYN | Admin</title>

	<?php include"recursos-header.php"; ?>
</head>
<body class="page-body">

	<div class="modal fade" id="modal-1">
		<div class="modal-dialog">
			<div class="modal-content">			
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">ELIMINAR</h4>
				</div>			
				<div class="modal-body">
					¿Estas seguro que quieres eliminar este elemento?				
				</div>			
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<a></a>
				</div>
			</div>
		</div>
	</div>

	<div class="page-container">	
		<!-- menu -->
		<?php $menu=$_GET["carpeta"]; include"menu.php" ?>
		<!-- fin menu -->

		<div class="main-content">
			<?php include"barra-notificaciones.php" ?>

			<hr>
			
			<h2>Imágenes</h2>
			<br>
			<div class="row">
				<div class="col-md-12">
					<form action="php/subir-imagenes.php?contenido=<?php echo $_GET['contenido'] ?>&carpeta=<?php echo $_GET['carpeta'] ?>&seccion=<?php echo $_GET['seccion'] ?>" class="dropzone" id="dropzone_example">
						<div class="fallback">
							<input name="portada" type="file" accept="image/*" multiple="">
						</div>
					</form>
					<p style="color:RED">Solo imágenes en formato jpg con un tamaño de 800 x 600 px</p>
					<div style="float:right"><button onclick="goBack()">REGRESAR</button></div>


					<div class="panel panel-primary" data-collapsed="0">
						<div class="panel-heading">
							<div class="panel-title">
								Detalles de las imágenes
							</div>
							<div class="panel-options">
								<a href="javascript:Ejecutar('tabla-fotos.php?contenido=<?php echo $_GET['contenido'] ?>&carpeta=<?php echo $_GET['carpeta'] ?>&seccion=<?php echo $_GET['seccion'] ?>','dze_info')"><i class="entypo-arrows-ccw"></i></a>
							</div>
						</div>
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
									<?php $a->listarTablaImagenes($_GET['contenido'],$_GET["carpeta"],$_GET["seccion"]) ?>
								</tbody>
								<tfoot>
									<tr>
										<th width="20%">Imagen</th>
										<th width="20%">Nombre</th>
										<th width="20%">Descripción</th>
										<th width="10%">Tamaño</th>
										<th width="10%">Tipo</th>
										<th width="20%">Estatus</th>
										<th></th>
									</tr>
								</tfoot>
							</table>
						</div>
						<div class="panel-heading">
							<div class="panel-title">
								Detalles de las imágenes
							</div>

							<div class="panel-options">
								<a href="javascript:Ejecutar('tabla-fotos.php?contenido=<?php echo $_GET['contenido'] ?>&carpeta=<?php echo $_GET['carpeta'] ?>&seccion=<?php echo $_GET['seccion'] ?>','dze_info')"><i class="entypo-arrows-ccw"></i></a>
							</div>
						</div>
					</div>

					<script type="text/javascript">
					$(document).on("click", ".eliminar", function () {
						var eliminarId = $(this).data('id');
						$(".modal-footer a").html("<a href='php/procesa.php?a=12.1&id="+ eliminarId + "&contenido=<?php echo $_GET['contenido'] ?>&carpeta=<?php echo $_GET['carpeta'] ?>&seccion=<?php echo $_GET['seccion'] ?>' class='btn btn-info'>Confirmar</a>");
					});
					function goBack() {
						    window.history.back()
						}
					</script>

					<script type="text/javascript">					
					<?php if($_GET['a']==1){ ?>
						jQuery(document).ready(function($){
							$(window).load(function(ev){
								ev.preventDefault();
								var opts = {
									"closeButton": true,
									"debug": false,
									"positionClass": "toast-top-right",
									"onclick": null,
									"showDuration": "300",
									"hideDuration": "1000",
									"timeOut": "5000",
									"extendedTimeOut": "1000",
									"showEasing": "swing",
									"hideEasing": "linear",
									"showMethod": "fadeIn",
									"hideMethod": "fadeOut"
								};
								toastr.success("EXITO", "ALERTA", opts);
							});
						});
						<?php } ?>
						</script>

					</div>
				</div>

				<!-- Footer -->
				<?php include "footer.php" ?>	
			</div>

		</div>

		<?php include"recursos-footer.php"; ?>
		<script type="text/javascript" src="neon/assets/js/carga.js"></script>
	</body>
	</html>