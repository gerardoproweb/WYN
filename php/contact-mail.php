<?php
$MySite = "mac-co.com.mx";
$nombre = trim(stripslashes($_POST['nombre']));
$telefono = trim(stripslashes($_POST['telefono']));
$email = trim(stripslashes($_POST['email']));
$mensaje = trim(stripslashes($_POST['mensaje']));
$asunto = trim(stripslashes($_POST['asunto']));

$num1 = isset($_POST['num1']) ? $_POST['num1'] : "";
$num2 = isset($_POST['num2']) ? $_POST['num2'] : "";
$total = isset($_POST['captcha']) ? $_POST['captcha'] : "";


if(($num1 + $num2 == $_POST['captcha'])) { // honey pot check

    $emailFrom = "noreply@".$MySite."";
    $emailTo = "maricarmen@mac-co.com.mx";
    $subject = "Formulario de Contacto '".$asunto."' ";

    $body="<body style='background:#CCC'>
<div style='width:100%; background:#CCC; font-family:Helvetica'>
<div style='width:50%; padding:10%; margin:auto;min-width: 300px;'>
  <table width='100%' border='0' align='center' bgcolor='#FFFFFF' style='padding:10%'>
    <tr>
      <td colspan='3' align='center'>&nbsp;</td>
    </tr>
    <tr>
      <td colspan='3' align='center'><img src='http://mac-co.com.mx/img/logo.png ' alt='MAC&CO Planners'></td>
    </tr>
    <tr>
      <td colspan='3' align='center'>Mensaje del sitio ".$MySite."</td>
    </tr>
    <tr>
      <td colspan='3' align='center'>&nbsp;</td>
    </tr>
    <tr>
      <td width='42%' align='right'>Nombre</td>
      <td width='6%'>&nbsp;</td>
      <td width='42%'>".$nombre."</td>
    </tr>
    <tr>
      <td align='right'>Correo</td>
      <td>&nbsp;</td>
      <td>".$email."</td>
    </tr>
    <tr>
      <td align='right'>Teléfono</td>
      <td>&nbsp;</td>
      <td>".$telefono."</td>
    </tr>
    <tr>
      <td align='right'>Mensaje</td>
      <td>&nbsp;</td>
      <td>".$mensaje."</td>
    </tr>
    <tr>
      <td align='right'>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>&nbsp;</td>
    </tr>
  </table>
</div>
</div>
</body>";

    // send email
    if (!empty($nombre) && !empty($email) && !empty($telefono) && !empty($mensaje)) {
        $headers = 'From: '.$email."\r\n".
        'Reply-To: '.$email."\r\n" .
        'Bcc: gerardo@proweb.com'. "\r\n".
        'MIME-Version: 1.0\r\n'. "\r\n".
        'Content-Type: text/html; charset=ISO-8859-1 '. "\r\n".
        'X-Mailer: PHP/' . phpversion();
        $success = mail($emailTo, $subject, utf8_decode($body), $headers);
    }
    if ($success){
        header('Location: /gracias');
    }
    else {
        header('Location: /?status=Error');
    }
    //redirect to success page

} else {
    header('Location: /?status=Error');
    die();

}
?>