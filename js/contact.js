$("#send").click(function() {
$(function() {
  // Validate the contact form
  $.validator.addMethod('captcha',
      function(value) {
        $result = ( parseInt($('#num1').val()) + parseInt($('#num2').val()) == parseInt($('#captcha').val()) ) ;
        $('#spambot').fadeOut('fast');
        return $result;
        //alert("Result is " + $result );
      },"Valor incorrecto");
  $.validator.addMethod("email", 
      function(value, element) 
        { 
        return this.optional(element) || /^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/i.test(value); 
        }, "Por favor introduce un email.");
  $.validator.addMethod("nombre", 
      function(value, element) {
          var i = /^[A-Za-z-\s]{6,}$/;
          //var i = /^[A-Za-z\-\s-{6,0}]+$/i; // SPACES
          return this.optional(element) || (i.test(value) > 0);
      }, "Su Nombre Completo por favor.");
  $.validator.addMethod("nourl", 
      function(value, element) {
          return !/http\:\/\/|www\.|link\=|url\=/.test(value);
      }, "No se aceptan URL's.");


  $('#contactform').validate({
    // Specify what the errors should look like
    // when they are dynamically added to the form
    errorElement: "span",
    wrapper: "",
    errorPlacement: function(error, element) {
      error.insertBefore( element.parent() );
      error.wrap("<div class='wrong'></div>");

    },
    
    // Add requirements to each of the fields
    rules: {
      nombre: {
        required: true,
        nombre: true
      },
      code: {
        required: true,
        minlength: 4
      },
      email: {
        required: true,
        email: true
      },
      telefono: {
        required: true,
        minlength: 10
      },
      mensaje: {
        required: true,
        minlength: 10,
        nourl: true
      },
    validar: {
        required: true,
        validar: true
      }
    },
    
    // Specify what error messages to display
    // when the user does something horrid
    messages: {
      nombre: {
        required: "Por favor introduce tu nombre.",
        minlength: jQuery.format("por lo menos {0} caracteres son requeridos.")
      },
      code: {
        required: "Por favor introduce el código que aparece en la imagen.",
        minlength: jQuery.format("por lo menos {0} caracteres son requeridos.")
      },
      email: {
        required: "Por favor introduce tu email.",
        email: "Por favor introduce un email válido."
      },
      telefono: {
        required: "Por favor introduce tu número teléfonico.",
        minlength: jQuery.format("por lo menos {0} caracteres son requeridos.")
      },
      mensaje: {
        required: "Por favor deja tu mensaje.",
        minlength: jQuery.format("por lo menos {0} caracteres son requeridos para enviar el Mensaje")
      },
    validar: {
        required: "Por favor acepta el Aviso de Privacidad.",
        validar: "Por favor acepta el Aviso de Privacidad."
      }
    },
    
 
  });
});
}); 