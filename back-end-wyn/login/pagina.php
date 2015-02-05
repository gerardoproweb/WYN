<?php
session_start();
if(!isset($_SESSION['login']))
{
    header("Location: login/index.php?f=1");
	exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="salir1.php">
  <input type="submit" name="Submit" value="Cerrar Sesion" />
</form>
<p><a href="salir1.php">Cerrar Sesion</a></p>
<p><?php echo $_SESSION['usuario']?></p>
</body>
</html>
