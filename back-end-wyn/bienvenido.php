<?php
error_reporting(NULL);

 session_start();
 if(!isset($_SESSION['login']))
 {
     header("Location: index.php?f=1");
 	exit();
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
		<?php $menu=""; include"menu.php" ?>
		<!-- fin menu -->
		
		<div class="main-content">
			<?php include"barra-notificaciones.php" ?>

			<hr>
			<ol class="breadcrumb bc-3">
				<li>
					<a href="#"><i class="entypo-home"></i>Bienvenid@</a>
				</li>
			</ol>
			
			<h2>Bienvenido al panel de administración de tu sitio WYN</h2>
			<br>			
				<?php include "footer.php" ?>	
			</div>

		</div>

		<?php include"recursos-footer.php"; ?>

	</body>
	</html>