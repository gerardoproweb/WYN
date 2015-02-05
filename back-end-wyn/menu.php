<?php 
// error_reporting(NULL);

if(!isset($_SESSION['login']))
{
	header("Location: index.php?f=1");
	exit();
}
?>
<div class="sidebar-menu">
	<header class="logo-env">
		<!-- logo -->
		<div class="logo">
			<a href="index.php">
				<span style="font-size:36px; color:#FFF">WYN</span>
			</a>
		</div>
		<!-- logo collapse icon -->
		<div class="sidebar-collapse">
			<a href="#" class="sidebar-collapse-icon with-animation"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
				<i class="entypo-menu"></i>
			</a>
		</div>

		<!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
		<div class="sidebar-mobile-menu visible-xs">
			<a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
				<i class="entypo-menu"></i>
			</a>
		</div>
	</header>

	<ul id="main-menu">			
		<li <?php if($menu=="metas" || $menu=="portada" || $menu=="promo" || $menu=="pie") echo " class='opened active'" ?>>
			<a href="bienvenido.php"><i class="entypo-home"></i><span>Inicio</span></a>
			<ul>
				<li <?php if($menu=="metas") echo " class='active'" ?>>
					<a href="metas.php"><span>Meta Etiquetas</span></a>
				</li>
				<li <?php if($menu=="portada") echo " class='active'" ?>>
					<a href="portada.php"><span>Portada</span></a>
				</li>
				<li <?php if($menu=="promo") echo " class='active'" ?>>
					<a href="promo.php"><span>Promocional Banner</span></a>
				</li>
				<li <?php if($menu=="pie") echo " class='active'" ?>>
					<a href="pie.php"><span>Pie de Página</span></a>
				</li>
			</ul>
		</li>

		<li <?php if($menu=="eventos") echo " class='opened active'" ?>>
			<a href="eventos.php"><i class="entypo-doc-text"></i><span>Eventos</span></a>
		</li>
		
		<li <?php if($menu=="nosotros" || $menu=="atab" || $menu=="btab") echo " class='opened active'" ?>>
			<a href="#"><i class="entypo-doc-text"></i><span>Nosotros</span></a>
			<ul>
				<li <?php if($menu=="nosotros") echo " class='active'" ?>>
					<a href="nosotros.php"><span>Portada / Team</span></a>
				</li>
				<li <?php if($menu=="atab") echo " class='active'" ?>>
					<a href="atab.php"><span>Tabs 1</span></a>
				</li>
				<li <?php if($menu=="btab") echo " class='active'" ?>>
					<a href="btab.php"><span>Tabs 2</span></a>
				</li>
			</ul>
		</li>
		
			
	</ul>
</div>