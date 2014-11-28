//****************************************** Index.php *************************************************
//1. Validar navegacion en opcines del navbar
function acctionMenu(acc){
  if(acc=='initConvenciones'){
    $("#divConvenciones").show();
    $("#divSlide").hide();
    $("#divConsultar").hide();
    $("#divTodoincluido").hide();
    $("#divCondiciones").hide();
    $("#divPreguntasfrecuentes").hide();
    $("#divServicios").hide();
    $("#divLogin").hide();
    $("#divRegistro").hide();
  }else if(acc=='initTodoincluido'){
    $("#divTodoincluido").show();
    $("#divSlide").hide();
    $("#divConsultar").hide();
    $("#divCondiciones").hide();
    $("#divPreguntasfrecuentes").hide();
    $("#divServicios").hide();
    $("#divLogin").hide();
    $("#divRegistro").hide();
    $("#divConvenciones").hide();
  } else if (acc=='initCondiciones'){
    $("#divCondiciones").show();
    $("#divSlide").hide();
    $("#divConsultar").hide();
    $("#divTodoincluido").hide();
    $("#divPreguntasfrecuentes").hide();
    $("#divServicios").hide();
    $("#divLogin").hide();
    $("#divRegistro").hide();
    $("#divConvenciones").hide();
  } else if (acc=='initPreguntasfrecuentes'){
    $("#divPreguntasfrecuentes").show();
    $("#divSlide").hide();
    $("#divConsultar").hide();
    $("#divTodoincluido").hide();
    $("#divCondiciones").hide();
    $("#divServicios").hide();
    $("#divLogin").hide();
    $("#divRegistro").hide();
    $("#divConvenciones").hide();
  } else if (acc=='initServicios'){
    $("#divServicios").show();
    $("#divSlide").hide();
    $("#divConsultar").hide();
    $("#divTodoincluido").hide();
    $("#divCondiciones").hide();
    $("#divPreguntasfrecuentes").hide();
    $("#divLogin").hide();
    $("#divRegistro").hide();
    $("#divConvenciones").hide();
  } else if (acc=='initLogin'){
    $("#divLogin").show();
    $("#divSlide").hide();
    $("#divConsultar").hide();
    $("#divTodoincluido").hide();
    $("#divCondiciones").hide();
    $("#divPreguntasfrecuentes").hide();
    $("#divServicios").hide();
    $("#divRegistro").hide();
    $("#divConvenciones").hide();
  }  else if(acc=='initRegistro'){
    $("#divRegistro").show();
    $("#divSlide").hide();
    $("#divConsultar").hide();
    $("#divTodoincluido").hide();
    $("#divCondiciones").hide();
    $("#divPreguntasfrecuentes").hide();
    $("#divServicios").hide();
    $("#divLogin").hide();
    $("#divConvenciones").hide();
  } else {
    $("#divSlide").show();
    $("#divConsultar").show();
    $("#divTodoincluido").hide();
    $("#divCondiciones").hide();
    $("#divPreguntasfrecuentes").hide();
    $("#divServicios").hide();
    $("#divLogin").hide();
    $("#divConvenciones").hide();
  }
}
//2. Zoom a imagen
$(document).ready(function(){
       $('#mapa').width(200);
       $('#mapa').mouseover(function()
       {
          $(this).css("cursor","pointer");
          $(this).animate({width: "800px"}, 'slow');
       });
    
    $('#mapa').mouseout(function()
      {
          $(this).animate({width: "300px"}, 'slow');
       });
   });

//3. Validacion de fechas de entrada, salida y nacimiento 
$(function() {
 $( "#from" ).datepicker({
  dateFormat: 'dd/mm/yy',
    minDate: 0,
      maxDate: '+6m',
  });
  $( "#to" ).datepicker({
    dateFormat: 'dd/mm/yy',
    minDate: 0,
      maxDate: '+365d',
  });
  $( "#from1" ).datepicker({
    dateFormat: 'dd/mm/yy',
    minDate: 0,
      maxDate: '+365d',
  });
  $( "#to1" ).datepicker({
    dateFormat: 'dd/mm/yy',
    minDate: 0,
      maxDate: '+365d',
  });
   $( "#nacimiento" ).datepicker({
  dateFormat: 'dd/mm/yy',
      maxDate: '-18y',
  });
});

//4. cargar paginas del navbar
$(document).ready(function(){
$("#content").load("includes/wowslide.php");
});
$('a').click(function(){
var page = $(this).attr('href');
$("#content").load(page);
return false;
});


//************************************************** Registro.php **************************************************

//6. Verificar que los passwords coinciden.
 $(document).ready(function() {
    $('#submit').click(function(event){
    
        data = $('.password').val();
        var len = data.length;
        
        if(len < 8) {
            alert("La contrasena debe contener al menos 8 caracteres");
            // Prevent form submission
            event.preventDefault();
        }
         
        if($('.password').val() != $('.confpass').val()) {
            alert("Contrasena y Repetir contrasena no coinciden. Favor verificar");
            // Prevent form submission
            event.preventDefault();
        }
         
    });
});

//7. Validar nombre y apellidos contengan solo letras
jQuery('.input_letras').keypress(function(tecla) {
if((tecla.charCode < 97 || tecla.charCode > 122) && (tecla.charCode < 65 || tecla.charCode > 90) && (tecla.charCode != 32)) return false;
});

//8. validar solo numeros
jQuery(document).ready(function() {
    jQuery('.input_num').keypress(function(tecla) {
        if(tecla.charCode < 48 || tecla.charCode > 57) return false;
    });
});

//8. validar alfanumerico
jQuery(document).ready(function() {
    jQuery('.input_alphanum').keypress(function(tecla) {
        if((tecla.charCode < 48 || tecla.charCode > 57) && (tecla.charCode < 65 || tecla.charCode > 90) && (tecla.charCode < 97 || tecla.charCode > 122)) return false;
    });
});

//9. Validar si el nombre de usuario esta disponible
$(document).ready(function() {
    $('#usuario').blur(function(){

        $('#Info').html('<img src="loader.gif" alt="" />').fadeOut(1000);

        var username = $(this).val();
        var dataString = 'username='+username;

        $.ajax({
            type: "POST",
            url: "check_username_availablity.php",
            data: dataString,
            success: function(data) {
                $('#Info').fadeIn(1000).html(data);
            }
        });
    });
});

//10. ******** CARRITO *******
 $("#t_habi").change(function() {
     var val = $(this).val();
     $("#hab").val(val);
  });
  $("#n_cama").change(function() {
     var val = $(this).val();
     $("#c_extra").val(val);
  });
  $("#t_balcon").change(function() {
     var val = $(this).val();
     $("#tbal").val(val);
  });


