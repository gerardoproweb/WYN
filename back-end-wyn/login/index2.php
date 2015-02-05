<?php
session_start();
include("acceso.php");
if($_SESSION["login"] =='1'){
header("Location: pagina.php");
}else{
?>
<html>
	<head>
	</head>
	<body>
<form name="form1" method="post" action="index.php">
  <table width="262" border="0" align="center">
    <tr>
      <td width="106"><p> Usuario: </p></td>
      <td width="146"><input name="login" type="text" id="login" size="20" /></td>
    </tr>
    <tr>
      <td>Contrase&ntilde;a: </td>
      <td><input name="password" type="password" id="password" size="20" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Entrar" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><h1>
        <?php
	if($_GET['f']==1){
		echo "Acceso Denegado";
	}
	?>
      </h1></td>
    </tr>
  </table>
</form>
	</body>
</html>
<?php
}
?>