<?php
session_start();
include("acceso.php");
if($_SESSION["login"] =='1'){
header("Location: inicio.php");
}else{
?>
<html>
	<head>
	</head>
	<body>
    <div style="margin-top:100px;">
    <table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form name="form1" method="post" action="index.php">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td width="78">Usuario</td>
<td width="6">:</td>
<td width="294"><input name="login" type="text" id="login" size="20" /></td>
</tr>
<tr>
<td>Contrase&ntilde;a</td>
<td>:</td>
<td><input name="password" type="password" id="password" size="20" /></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="Submit" value="Login"></td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td><span style="color:red"><?php
	if($_GET['f']==1){
		echo "Acceso Denegado";
	}
	?></span></td>
</tr>
</table>
</td>
</form>
</tr>
</table>
</div>
	</body>
</html>
<?php
}
?>