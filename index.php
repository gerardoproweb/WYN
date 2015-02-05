<?php
include "php/funciones.php";
$a=new DataBase();
$menu="Bienvenido";
include "head.php";
?>
<body>
	
  <div id="loading-wrap">
    <div id="loading">
      <i class="fa fa-cog fa-spin"></i>
    </div>
  </div>

  <header class="header" id="home">
    <nav class="navbar navbar-default" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="/" title="MAC&CO Planners" class="site-logo"><img src="img/logo.png " alt="MAC&CO Planners"></a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav  navbar-right">
            <li><a href="index.php#home" title="Home" >Inicio</a></li>
            <li><a href="index.php#services" title="Services" >Eventos</a></li>  
            <li><a href="index.php#team" title="Team" >Nosotros</a></li>  
            <li><a href="index.php#contact" title="Contact" >Contacto</a></li>                              
          </ul>
        </div>
      </div>
    </nav>
  
  <!-- masterslider -->
		<!-- MasterSlider -->

				
			
			<!-- MasterSlider Main -->
			<div id="masterslider" class="master-slider ms-skin-light-5" >
				 				 
				<?php $a->listarBanner() ?>  

			</div>
			<!-- END MasterSlider Main -->

			 
	
		<!-- END MasterSlider --> 
		

  <!-- end of masterslider -->   
  </header>


  <section id="services">
    <div class="container">
      <div class="row spacer80"></div>
      <div class="row">
        <div class="col-md-4">

          <?php $a->PortadaEventos() ?> 

      </div>
      <div class="row spacer60"></div>
      
         <?php $a->ServiciosEventos() ?>    
    
    </div> <!-- container ends -->
    
    
    <div class="spacer80"></div>  
     <div id="parallax-one" class="parallax" style="background-image:url(img/parallax/1.jpg);"> 
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="parallax-text-container-1">
              <div class="parallax-text-item">
                <div class="testimonal">
                        <?php $a->Promo() ?>  
                      </div>
              </div>
            </div>
          </div>         
        </div>    
      </div>    
    </div>
           
  </section>
  
  <section id="team">
    <div class="container">
      <div class="spacer80"></div>
      <div class="row">
        <div class="col-md-4">
          <?php $a->PortadaNosotros() ?> 
      </div>      
      
      <div class="spacer60"></div>
      <div class="row">

        <?php $a->NosotrosTeam() ?>

      </div>
      
      
      <div class="spacer60"></div>     
      <div class="row">

        <div class="col-md-4">
          <h3>Nuestra Filosofia</h3>
          <div class="panel-group" id="accordion-a">
            
            <?php $a->Tabs1() ?>

          </div>
          <div class="spacer20"></div>
        </div>
        
        <div class="col-md-8">
          <h3>Experiencia MAC&CO</h3>
          <ul class="nav nav-tabs responsive" id="myTab">
            <?php $a->Tabs2Titles() ?>
          </ul>      
          <div class="tab-content responsive" id="myTabContent">
            <?php $a->Tabs2Content() ?>
          </div>
        </div>        
        
        
      </div>
      <div class="spacer40"></div>
      <div class="row">
        <div class="col-md-12">
          <hr>
        </div>
      </div>
                    
      
    </div>
  </section>

  <footer id="contact"> <!-- footer begings -->
    
    <div class="footer-image">
      <div class="footer-image-colored">
      <div class="container">
        <div class="spacer160"></div>
        <div class="row">

          <?php $a->PiedePagina() ?>  

        </div>
        <div class="spacer40"></div>      
        <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-4">        
          
        </div>
        
         <?php 
          if ($_GET["status"]==Error) {
              echo '<div class="message error">
                  <em class="fa">&#xf00d;</em> Error: Lo sentimos ocurrio un error inesperado, por favor inténtelo nuevamente, gracias.
              </div>';
          }else if ($_GET["status"]==Error) {
              echo '<div class="message error">
                  <em class="fa">&#xf00d;</em> Error: El captcha es incorrecto, por favor inténtelo nuevamente, gracias.
              </div>';
          }
          ?>
        <form id="contactform"  action="php/contact-mail.php" method="post">
          <div class="col-xs-12 col-sm-8 col-md-8">            
            <div class="row">            
              <div class="form-group col-xs-6">
                <label for="nombre" class="color1">Nombre</label>
                <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre Completo" required>
              </div>
              <div class="form-group col-xs-6">
                <label for="email" class="color1">Email</label>
                <input  class="form-control" id="email" name="email"  type="text" placeholder="E-mail" required>
              </div>
            </div>

            <div class="row">            
              <div class="form-group col-xs-6">
                <label for="nombre" class="color1">Asunto</label>
                <input type="text" id="asunto" name="asunto" class="form-control" placeholder="Asunto">
              </div>
              <div class="form-group col-xs-6">
                <label for="email" class="color1">Teléfono</label>
                <input  class="form-control" id="telefono" name="telefono"  type="phone" required>
              </div>
            </div>
            
            <div class="row">            
              <div class="form-group col-xs-12">
                <label for="message2" class="color1">Mensaje</label>
                <textarea  class="form-control" id="mensaje" name="mensaje" placeholder="Mensaje" required></textarea>
              </div>
            </div> 

            <div class="row">            
              <div class="form-group col-sm-2" style="margin-right:0px; padding-right:0px; font-weight:bold">
                <input id="num1" class="sum" type="text" name="num1" value="<?php echo rand(0,9) ?>" readonly="readonly" />
                <div style="padding: 0px;width: 50%; float:left; text-align:center"> + </div>
              </div>
              <div class="form-group col-sm-2" style="margin-left:0px; padding-left:0px; font-weight:bold">
                <input id="num2" class="sum" type="text" name="num2" value="<?php echo rand(0,9) ?>" readonly="readonly" />
                <div style="padding: 0px;width: 50%; float:left; text-align:center"> ? </div>
              </div>
              <div class="form-group col-xs-4">
                <input id="captcha" class="captcha form-control" placeholder="Resultado" type="text" name="captcha" maxlength="2" />
              </div>
            </div>

            <div class="row">            
              <div class="col-xs-12" align="center">
                <input type="checkbox" name="validar" id="validar" value="1" class="form-control check" required style="width:auto"/>
                <span class="termin">He leído y acepto el <a href="aviso" target="_blank">Aviso de Privacidad</a></span>
              </div>
            </div>

            <div class="row">            
              <div class="col-xs-12 text-right">            
                <button type="submit" class="btn btn-inverted" id="send">Enviar</button>
              </div>
            </div>

          </div>  
        </form>        
         
      </div>         
      </div>
    </div>
    </div>
    
    <div class="container">
      <div class="row spacer130"></div>
      <div class="row">        
        <div class="col-md-2">
          <div class="footer-info">
            <div class="footer-info-cell">  
              <a href="/" title="MAC&CO Planners" class="footer-site-logo"><img src="img/logo.png " alt="MAC&CO Planners"></a>
            </div>
          </div> 
        </div>
        <div class="col-md-5">
          <div class="footer-info">
            <div class="footer-info-cell">         
              <p>COPYRIGHT 2014 - BY <a href="http://wynsoluciones.com/" rel="external">WYN</a>.</p> 
            </div>
          </div> 
        </div>
        <div class="col-md-5">
          <div class="footer-info">
            <div class="footer-info-cell">         
              <ul class="social-1">
                <li><a href="#" rel="external" ><i class="fa fa-facebook"></i></a></li>
                <li><a href="#" rel="external" ><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#" rel="external" ><i class="fa fa-twitter"></i></a></li>
              </ul> 
            </div>
          </div> 
        </div>               
      </div>
      <div class="row spacer130"></div>
    </div>
         
  </footer> <!-- Footer ends -->
  <a href="#" class="back-to-top"><span></span></a>
  
  <script src="js/jquery.js"></script> 

  <script src="js/bootstrap.min.js"></script>   
  <script src="js/jquery.scrollTo.js"></script>
  <script src="js/jquery.nav.js"></script>   
  <script src="js/jquery.easing.js"></script>    
  <script src="js/jquery.flexslider-min.js"></script>
  <script src="js/jquery.isotope.min.js"></script>   
  <script src="js/jquery.fitvids.js"></script>
  <script src="js/jquery.appear.js"></script> 
  <script src="js/jquery.sticky.js"></script> 
  <script src="js/retina.js"></script>
  <script src="js/respond.min.js"></script>  
  <script src="js/jquery.parallax-1.1.3.js"></script>
  <script src="js/responsive-tabs.js"></script>  
  <script src="masterslider/masterslider.js"></script>  
  <script src="js/functions.js"></script>   

  <script type="text/javascript" src="http://digitalbush.com/wp-content/uploads/2013/01/jquery.maskedinput-1.3.1.min_.js"></script>


  <script type="text/javascript" src="js/jquery.form.js"></script>
  <script type="text/javascript" src="js/jquery.validate.min.js"></script>
  <script type="text/javascript" src="js/contact.js"></script>
  <script type="text/javascript">
  $( ".panel-collapse:first" ).addClass( "in" );
  $( ".collapsed:first" ).removeClass( "collapsed" );
  $( ".tab-pane:first" ).addClass( "active" );
  $( "#myTab li:first" ).addClass( "active" );
  </script>
  <script type="text/javascript">
    jQuery(function($) {
      $.mask.definitions['~']='[+-]';
      $('#telefono').mask('(999) 999-9999');
   });
  </script>
  <script type="text/javascript">stLight.options({publisher: "be851e19-d04c-4447-9705-0c84932d6d5c", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
  <script>
  var options={ "publisher": "be851e19-d04c-4447-9705-0c84932d6d5c", "position": "left", "ad": { "visible": false, "openDelay": 5, "closeDelay": 0}, "chicklets": { "items": ["facebook", "twitter", "googleplus", "pinterest", "email"]}};
  var st_hover_widget = new sharethis.widgets.hoverbuttons(options);
  </script>
	</body>
</html>