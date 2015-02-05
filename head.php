<?php
$detalles=$a->detalles("SELECT * FROM metas");
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="not-ie" lang="es"> <!--<![endif]-->
<head>
	<!-- Basic Meta Tags -->
  <meta charset="utf-8">
  <title><?php echo $menu ?> | <?php echo $detalles[0]["titulo"] ?></title>
	<meta name="description" content="<?php echo $detalles[0]["descripcion"] ?>" />
  <meta name="keywords" content="<?php echo $detalles[0]["keywords"] ?>" />
  <meta name="author" content="<?php echo $detalles[0]["autor"] ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Favicon -->
  
  <!-- Bootstrap style -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
  <!-- Font Awesome Style -->
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"> 
  <!-- Animate Style -->
  <link href="css/animate.css" rel="stylesheet" media="screen" />
	<!-- Base MasterSlider style sheet -->
	<link rel="stylesheet" href="masterslider/style/masterslider.css" />		 
	<!-- MasterSlider  skin 5 -->
	<link rel="stylesheet" href="masterslider/skins/light-5/style.css" />  
  <!-- Flexslider Style -->
  <link href="css/flexslider.css" rel="stylesheet" media="screen" />        
	<!-- Style css -->
  <link href="css/style.css" rel="stylesheet" media="screen" /> 
	<!-- Components css -->
  <link href="css/components.css" rel="stylesheet" media="screen" /> 
	<!-- Color Style css -->
  <link href="css/color/color-1.css" rel="stylesheet" media="screen" id="color" /> 
	<!-- Responsive css -->
  <link href="css/responsive.css" rel="stylesheet" media="screen" />
  <!-- Google Fonts -->
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,400italic,500,500italic,700,700italic,900italic,900,300italic,300,100italic,100' rel='stylesheet' type='text/css'>   
  <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,700,400italic,700italic,900,900italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
  <!-- Internet Explorer condition - HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
  <!-- Modernizr js -->        
	<script src="js/modernizr.js"></script>

  <script type="text/javascript">var switchTo5x=true;</script>
  <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
  <script type="text/javascript" src="http://s.sharethis.com/loader.js"></script>
</head>