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
$variable="eventos";
if(isset($_GET[$variable])){
	$detalles=$a->detalles("SELECT * FROM contenido WHERE idcontenido = '".$_GET[$variable]."'");
}else{
	$detalles=$a->detalles("SELECT * FROM contenido WHERE seccion = 'eventos'");
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
			
			<div class="row">
				<div class="col-md-12">
					<h2>Eventos MAC&CO</h2>
					<?php if (!isset($_GET["eventos"])) { ?>
			<div class="row">
			<form action="php/procesa.php?a=eventos" method="post" enctype="multipart/form-data">

			<div class="col-md-8">
				Titulo
				<input type="text" class="form-control" name="font" data-validate="required" data-message-required="Este campo es obligatorio." placeholder="Titulo" value="<?php echo $detalles[0]["font"] ?>">
				<p></p>
				Subtitulo
				<input type="text" class="form-control" name="titulo" data-validate="required" data-message-required="Este campo es obligatorio." placeholder="Subtitulo" value="<?php echo $detalles[0]["titulo"] ?>">
				<p></p>
				Contenido
				<textarea class="form-control" name="contenido" placeholder="Contenido" data-validate="required" data-message-required="Este campo es obligatorio."><?php echo $detalles[0]['contenido'] ?></textarea>
				<br>
				<div class="form-group col-sm-5">
				<button type="submit" class="btn btn-success">guardar</button>
				</div>

			</div>
			</form>
			</div>
			<?php } ?>
					<div class="panel panel-primary" <?php if(!isset($_GET[$variable])) echo "data-collapsed='1'"; else echo"data-collapsed='0'" ?> >
						
						<div class="panel-heading">
							<div class="panel-options panel-title" style="float:left">
								Agregar Nuevo Elemento <a href="#" data-rel="collapse"><i class="entypo-plus"></i></a>
							</div>				
							<div class="panel-options">		
							</div>
						</div>
						
						<div class="panel-body">
							
							<form enctype="multipart/form-data" action="php/procesa.php?a=events" method="post" class="form-horizontal form-groups-bordered validate" id="form1" role="form">
								
								<div class="form-group">
									<label class="col-sm-3 control-label">Titulo</label>
									<div class="col-sm-5">
										<input type="text" class="form-control" name="titulo" data-validate="required" data-message-required="Este campo es obligatorio." placeholder="Titulo" value="<?php if(isset($_GET[$variable])) echo $detalles[0]["titulo"] ?>">
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label">Icono</label>
										<div class="input-group col-sm-5">
		                                    <span class="input-group-addon"></span>
		                                    <input type="text" data-placement="bottomLeft" name="font" class="form-control icp icp-auto" data-validate="required" data-message-required="Este campo es obligatorio." value="<?php if(isset($_GET[$variable])) echo $detalles[0]["font"] ?>" />
	                                	</div>		
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label">Contenido</label>
									<div class="col-sm-5">
										<textarea class="form-control" name="contenido" placeholder="Contenido" data-validate="required" data-message-required="Este campo es obligatorio."><?php if(isset($_GET[$variable])) echo $detalles[0]['contenido'] ?></textarea>
									</div>
								</div>

								<div class="form-group">
									<input type="hidden" name="editar" value="<?php echo $_GET[$variable] ?>">
									<button type="submit" class="btn btn-success">guardar</button>
									<a href="<?php echo $variable ?>.php" class="btn">cancelar</a>
								</div>
								
							</form>
							
						</div>		
					</div>
					
					<table class="table table-bordered datatable">
						<thead>
							<tr>
								<th><i class='entypo-arrow-combo'></i></th>
								<th>Icono</th>
								<th>Titulo</th>
								<th>Contenido</th>
								<th></th>
							</tr>
						</thead>
						<tbody class="menu" id="menu-pages">
							<?php $a->tablaEventos() ?>
						</tbody>
						<tfoot>
							<tr>
								<th><i class='entypo-arrow-combo'></i></th>
								<th>Icono</th>
								<th>Titulo</th>
								<th>Contenido</th>
								<th></th>
							</tr>
						</tfoot>
					</table>

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
						$(".modal-footer a").html("<a href='php/procesa.php?a=events&b=1&id="+ eliminarId + "' class='btn btn-info'>Confirmar</a>");
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
				$("#icon_select").change(function () {
                   $("#font").val($(this).val());
                   //alert($(this).val()) 
               })
			});
		</script>
	</body>
	</html>