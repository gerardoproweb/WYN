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
  <!-- Lightbox -->
  <link href="css/magnific-popup.css" rel="stylesheet" media="screen" /> 
  <!-- Cubeportfolio css -->
  <link href="cubeportfolio/css/cubeportfolio.css" rel="stylesheet" media="screen" />       
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
  <script src="js/modernizr.js"></script>
</head>
<body>
	



  <footer id="contact"> <!-- footer begings -->
    
    <div class="footer-image">
      <div class="footer-image-colored">
      <div class="container">
        <div class="spacer160"></div>
        <div class="row">
          <div class="col-xs-12 col-sm-4">
            <h2 class="second white">CONTACT</h2>
            <h3>Get in Touch</h3>
            <div class="spacer20"></div>  
          </div>
          <div class="col-xs-12 col-sm-4">
            <h5>Info</h5>
            <p class="white">
            Proin porta erat ligula, bibendum dapibus odio tempus sed. Ut tincidunt tincidunt erat. Ut id nisl quis enim dignissim sagittis. Nunc nulla.
            </p>
            <h5>Postal Address</h5>
            <p class="white">
            PO Box 16122 Collins Street West<br>
            Victoria 8007 Australia
            </p>
            <div class="spacer20"></div>
          </div>
          <div class="col-xs-12 col-sm-4">
            <h5>Headquarters</h5>
            <p class="white">
            121 King Street, Melbourne<br>
Victoria 3000 Australia
            </p>
            <h5>Envato Pty Ltd</h5>
            <p class="white">
            ABN 11 119 159 741<br><br>

<strong>Phone:</strong> +61 3 8376 6284
            </p>
          </div>
        </div>
        <div class="spacer40"></div>      
        <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-4">        
          
        
        
        <form role="form" name="ajax-form" id="ajax-form" action="php/mail-it.php" method="post">
          <div class="col-xs-12 col-sm-8 col-md-8">            
            <div class="row">            
              <div class="form-group col-xs-6">
                <label for="name2">name</label>
                <input class="form-control" id="name2" name="name" onblur="if(this.value == '') this.value='Name'" onfocus="if(this.value == 'Name') this.value=''" type="text" value="Name">
                <div class="error" id="err-name">Please enter name</div>
              </div>
              <div class="form-group col-xs-6">
                <label for="email2">email</label>
                <input  class="form-control" id="email2" name="email"  type="text"  onfocus="if(this.value == 'E-mail') this.value='';" onblur="if(this.value == '') this.value='E-mail';" value="E-mail">
                <div class="error" id="err-emailvld">E-mail is not a valid format</div> 
              </div>
            </div>
            
            <div class="row">            
              <div class="form-group col-xs-12">
                <label for="message2">message</label>
                <textarea  class="form-control" id="message2" name="message" onblur="if(this.value == '') this.value='Message'" onfocus="if(this.value == 'Message') this.value=''">Message</textarea>
                <div class="error" id="err-message">Please enter message</div>

              </div>
            </div> 
            <div class="row spacer40"></div>
            <div class="row">            
              <div class="col-xs-12">
                <p>Morbi rhoncus viverra nibh, non placerat enim tincidunt nec. Morbi fermentum iaculis tempor. Proin porta erat ligula, bibendum dapibus odio tempus sed.</p>    
              </div>
            </div>
            <div class="row spacer110"></div>            
            <div class="row">            
              <div class="col-xs-12 text-right">
                <div id="ajaxsuccess">E-mail was successfully sent.</div>
                <div class="error" id="err-form">There was a problem validating the form please check!</div>
                <div class="error" id="err-timedout">The connection to the server timed out!</div>
                <div class="error" id="err-state"></div>             
                <button type="submit" class="btn btn-inverted" id="send">Submit</button>
              </div>
            </div>
          </div>  
        </form>        
          <?php 
                    if ($_GET["a"]==1) {
                        echo '<div class="message error">
                            <em class="fa">&#xf00d;</em> Error: Lo sentimos ocurrio un error inesperado, por favor inténtelo nuevamente, gracias.
                        </div>';
                    }else if ($_GET["a"]==2) {
                        echo '<div class="message error">
                            <em class="fa">&#xf00d;</em> Error: El captcha es incorrecto, por favor inténtelo nuevamente, gracias.
                        </div>';
                    }
                    ?>
                        <form id="contactform" action="php/contact-mail.php" method="post" class="reply-form d-bg-c">
                        <p>&nbsp;</p>
                        <div><input type="text" id="nombre" name="nombre" placeholder="Nombre Completo*" class="form-control"/></div>
                        <p></p>
                        <div><input type="text" id="email" name="email" placeholder="Email*" class="form-control"/></div>
                        <p></p>
                        <div><input type="text" id="telefono" name="telefono" placeholder="Teléfono" class="form-control"/></div>
                        <p></p>
                        <div><textarea name="mensaje" id="mensaje" class="form-control" placeholder="Mensaje"></textarea></div>
                        <p></p>
                        <div>
                            <div class="span2"><input id="num1" class="sum form-control" type="text" name="num1" value="<?php echo rand(0,9) ?>" readonly="readonly" /></div>
                            <div style="padding: 5px;width: auto; float:left;"> + </div>
                            <div class="span2"><input id="num2" class="sum form-control" type="text" name="num2" value="<?php echo rand(0,9) ?>" readonly="readonly" /></div>
                            <div style="padding: 5px;width: auto; float:left;"> =</div>
                            <div class="span6"><input id="captcha" class="captcha form-control" placeholder="Resultado" type="text" name="captcha" maxlength="2" />  </div>
                        </div>
                        <p>&nbsp;</p>
                        <div align="center" class="terminos">
                              <input type="checkbox" name="validar" id="validar" value="1" class="validate[required] form-control check" required/>
                              <span class="termin">He leído y acepto el <a href="aviso" target="_blank">Aviso de Privacidad</a></span>
                        </div>
                        <div class="clearfix"></div>
                        <div align="center"><input type="submit" class="button" value="Enviar Mensaje" name="submit"></div>
                        
                    </form>
      </div>         
      </div>
    </div>
    </div>
    
         
  </footer> <!-- Footer ends -->
  <a href="#" class="back-to-top"><span></span></a>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script type="text/javascript" src="js/jquery.form.js"></script>
        <script type="text/javascript" src="js/jquery.validate.min.js"></script>
        <script type="text/javascript" src="js/contact.js"></script>
	</body>
</html>