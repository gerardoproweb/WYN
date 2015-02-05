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
$variable="metas";
if(isset($_GET[$variable])){
	$detalles=$a->detalles("SELECT * FROM metas WHERE idcontenido = '".$_GET[$variable]."'");
}else{
	$detalles=$a->detalles("SELECT * FROM metas ");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title>WYN | Admin</title>

	<?php include"recursos-header.php"; ?>
	<script language="javascript" type="text/javascript">
	$(document).ready(function(){
	var maxChars = $("#descripcion");
	var max_length = maxChars.attr('maxlength');
	if (max_length > 0) {
	    maxChars.bind('keyup', function(e){
	        length = new Number(maxChars.val().length);
	        counter = max_length-length;
	        $("#counter").text(counter);
	    });
	}
	});
</script>
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
		<?php $menu=$variable; include"menu.php" ?>
		<!-- fin menu -->
		
		<div class="main-content">
			<?php include"barra-notificaciones.php" ?>
			<hr>	
			<ol class="breadcrumb bc-3">
				<li>
					<a href="#"><i class="entypo-home"></i>Inicio</a>
				</li>
				<li class="active">
					<a href="<?php echo $variable ?>.php">Meta Etiquetas</a>
				</li>
			</ol>
			<h2>Meta Etiquetas</h2>
			<p>Es obligatorio completar todos los campos</p>
			<?php if (!isset($_GET["metas"])) { ?>

			<div class="row">
			<form action="php/procesa.php?a=metas" method="post" enctype="multipart/form-data">

			<div class="col-md-8">

				Titulo del Sitio
				<input type="text" class="form-control" name="titulo" data-validate="required" data-message-required="Este campo es obligatorio." placeholder="Titulo" value="<?php echo $detalles[0]["titulo"] ?>">
				<p></p>
				Descripción (escriba una descripción de entre 110 y 130 caracteres) <strong><span id="counter">130</span></strong>
				<input type="text" class="form-control" name="descripcion" id="descripcion" maxlength="130" data-validate="required" data-message-required="Este campo es obligatorio." placeholder="Descripción" value="<?php echo $detalles[0]["descripcion"] ?>" >
				<p></p>
				Palabras Clave (keywords)
				<input type="text" class="form-control" name="keywords" data-validate="required" data-message-required="Este campo es obligatorio." placeholder="Keywords" value="<?php echo $detalles[0]["keywords"] ?>">
				<p></p>
				Autor (Nombre de la Empresa)
				<input type="text" class="form-control" name="autor" data-validate="required" data-message-required="Este campo es obligatorio." placeholder="Autor" value="<?php echo $detalles[0]["autor"] ?>">
				<p></p>
				<br>
				<input type="hidden" name="portada2" value="<?php echo $detalles[0]["portada"] ?>">
				<button type="submit" class="btn btn-success">guardar</button>

			</div>
			</form>
			</div>
			<?php } ?>

			<br><hr><br>
			
			<div class="row">
				<div class="col-md-12">
					

					<script type="text/javascript">
					jQuery(document).ready(function($)
					{
						$("#table-1").dataTable({
							"sPaginationType": "bootstrap",
							"aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
							"bStateSave": true
						});
						
						$(".dataTables_wrapper select").select2({
							minimumResultsForSearch: -1
						});
					});

					$(document).on("click", ".eliminar", function () {
						var eliminarId = $(this).data('id');
						$(".modal-footer a").html("<a href='php/procesa.php?a=metas&b=1&id="+ eliminarId + "' class='btn btn-info'>Confirmar</a>");
					});
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
				<?php include "footer.php" ?>	
			</div>

		</div>

		<?php include"recursos-footer.php"; ?>
		<script language="javascript">
			$(document).ready(function(){
				$("#menu-pages").sortable({
					update: function(event, ui) {
						$.post("php/procesa.php?a=10", { type: "orderPages", pages: $('#menu-pages').sortable('serialize') } );
					}
				});
			});
		</script>
	</body>
	</html>