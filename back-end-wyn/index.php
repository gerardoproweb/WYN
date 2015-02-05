<?php
error_reporting(NULL);
session_start();
include("login/acceso.php");
if($_SESSION["login"] =='1'){
header("Location: bienvenido.php");
}else{
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title>WYN | Login</title>

	<link rel="stylesheet" href="neon/assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css" id="style-resource-1">
	<link rel="stylesheet" href="neon/assets/css/font-icons/entypo/css/entypo.css" id="style-resource-2">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic" id="style-resource-3">
	<link rel="stylesheet" href="neon/assets/css/neon.css" id="style-resource-4">
	<link rel="stylesheet" href="neon/assets/css/custom.css" id="style-resource-5">
    <link rel="stylesheet" type="text/css" href="src/bootstrap-wysihtml5.css" id="style-resource-6"/>
    
	<script src="neon/assets/js/jquery-1.10.2.min.js"></script>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->
	
	<!-- TS1388282076: Neon - Responsive Admin Template created by Laborator -->
</head>
<body class="page-body login-page login-form-fall">

<div class="login-container">
	
	<div class="login-header login-caret">
		
		<div class="login-content">
			
			<a href="#" class="logo">
				<img src="imagenes/logo.png" alt="">
			</a>
			
			<p class="description"></p>
			
			<!-- progress bar indicator -->
			<div class="login-progressbar-indicator">
				<h3>43%</h3>
				<span>Iniciando sesión...</span>
			</div>
		</div>
		
	</div>
	
	<div class="login-progressbar">
		<div></div>
	</div>
	
	<div class="login-form">
		
		<div class="login-content">
			
			<form method="post" role="form" action="index.php">
				
				<div class="form-group">
					
					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-user"></i>
						</div>
						
						<input type="text" class="form-control" name="login" id="login" placeholder="Usuario" autocomplete="off">
					</div>
					
				</div>
				
				<div class="form-group">
					
					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-key"></i>
						</div>
						
						<input type="password" class="form-control" name="password" id="password" placeholder="Contraseña" autocomplete="off">
					</div>
				
				</div>
				
				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-block btn-login">
						Iniciar Sesión
						<i class="entypo-login"></i>
					</button>
					<span style="color:red"><?php
					if($_GET['f']==1){
						echo "Acceso Denegado";
					}
					?></span>
				</div>
				
			</form>
			
		</div>				
	</div>

	 <div class="col-md-5"><img src="imagenes/fb.png"> <img src="imagenes/twt.png">Comparte con tus amigos las ventajas de tu sitio WYN</div>
  	 <div class="col-md-4 col-md-offset-3"><span class="glyphicon glyphicon-stop"style="color:#ADE530" ></span> Si requieres información o soporte escríbenos <a href="mailto:info@wynsoluciones.com" style="color:#ADE530">AQUI</a></div>
	
</div>


	<script src="neon/assets/js/gsap/main-gsap.js" id="script-resource-1"></script>
	<script src="neon/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js" id="script-resource-2"></script>
	<script src="neon/assets/js/bootstrap.min.js" id="script-resource-3"></script>
	<script src="neon/assets/js/joinable.js" id="script-resource-4"></script>
	<script src="neon/assets/js/resizeable.js" id="script-resource-5"></script>
	<script src="neon/assets/js/neon-api.js" id="script-resource-6"></script>
	<script src="neon/assets/js/jquery.validate.min.js" id="script-resource-7"></script>
	<script src="neon/assets/js/neon-login.js" id="script-resource-8"></script>
	<script src="neon/assets/js/neon-custom.js" id="script-resource-9"></script>
	<script src="neon/assets/js/neon-demo.js" id="script-resource-10"></script>	
</body>
</html>
<?php
}
?>