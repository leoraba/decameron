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
      changeMonth: true,
            changeYear: true,
  });
  $( "#to" ).datepicker({
    dateFormat: 'dd/mm/yy',
    minDate: 0,
      maxDate: '+365d',
      changeMonth: true,
            changeYear: true,
          
  });
  $( "#from1" ).datepicker({
    dateFormat: 'dd/mm/yy',
    minDate: 0,
      maxDate: '+365d',
      changeMonth: true,
      changeYear: true,
            yearRange: '2014:2015'
            
  });
  $( "#to1" ).datepicker({
    dateFormat: 'dd/mm/yy',
    minDate: 0,
      maxDate: '+365d',
      changeMonth: true,
            changeYear: true,
            yearRange: '2014:2015'
            
  });
   $( "#nacimiento" ).datepicker({
  dateFormat: 'dd/mm/yy',
      maxDate: '-18y',
      changeMonth: true,
            changeYear: true,
            yearRange: '1900:1996'
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

//**************************************** reserva_habitacion.php ****************************************************
//1. mensajes de alerta:

 $("#con1").click(function () {
  alert("La estadía NO puede ser mayor a 31 días, ni menor a 2 días.\n\nSi desea reservar mas de 31 dias debera hacer una nueva reservacion.");
});

$("#con2").click(function () {
  alert("Número máximo de camas supletorias o cunas en la habitación: 1.\n\nLas camas supletorias y/o cunas están disponibles bajo petición y deben ser confirmadas por el alojamiento.\n\nLos suplementos no se calculan automáticamente en el importe total y deben pagarse por separado durante la estancia.");
});

$("#con3").click(function () {
  alert("¡Gratis! Hasta 2 menores de 3 años se pueden alojar gratis en cunas.\n\nHasta 2 niños de 3 a 11 años se pueden alojar por 60 USD por noche utilizando las camas existentes.\n\nHasta 2 niños mayores de esa edad o adultos se pueden alojar por 158 USD por noche utilizando las camas existentes.");
});

//2. carrito

$("#t_hab").change(function() {
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
  $("#from1").change(function() {
     var val = $(this).val();
     $("#entrada").val(val);
  });
  $("#to1").change(function() {
     var val = $(this).val();
     $("#salida").val(val);
  });

  //3. precio total de reservacion

$(document).ready(function () {
    totalreserva();
    $("#acomp").change(function () {
        totalreserva();
     });
    });
    function totalreserva() {

    var n = $("#acomp").val();
    var j = $("#edad_acom_1").val();
    var k = $("#edad_acom_2").val();
    var l = $("#edad_acom_3").val();
    var m = $("#edad_acom_4").val();

    switch  (n) {

    case "1":

    if (j=="1"){
    $("#preciototal").val(57);
    } else if (j=="2") {
      $("#preciototal").val(122);
    } else {
      $("#preciototal").val(0);
    }
    break;

    case "2":
    if ((j=="1") && (k=="1")){
    $("#preciototal").val(114);
    } else if ( ((j=="1") && (k=="2")) || ((j=="2") && (k=="1")) ) {
      $("#preciototal").val(179);
    } else if ((j=="2") && (k=="2")){
      $("#preciototal").val(244);
    } else {
      $("#preciototal").val(0);
    }
    break;

    case "3":

    if ((j=="1") && (k=="1") && (l=="1")){
      $("#preciototal").val(171);
     }
    else if (((j=="1") && (k=="1") && (l=="2")) || ((j=="1") && (k=="2") && (l=="1")) || ((j=="2") && (k=="1") && (l=="1"))) {
    $("#preciototal").val(236);
     }
    else if (((j=="1") && (k=="2") && (l=="2")) || ((j=="2") && (k=="2") && (l=="1")) || ((j=="2") && (k=="1") && (l=="2"))) {
    $("#preciototal").val(301);
     }
     else if ((j=="2") && (k=="2") && (l=="2")){
      $("#preciototal").val(366);
     }
     else {
      $("#preciototal").val(0);
     }
     break;

     case "4":
     if ((j=="1") && (k=="1") && (l=="1") && (m=="1")){
      $("#preciototal").val(228);
     }
     else if (((j=="2") && (k=="1") && (l=="1") && (m=="1")) || ((j=="1") && (k=="2") && (l=="1") && (m=="1")) || ((j=="1") && (k=="1") && (l=="2") && (m=="1")) || ((j=="1") && (k=="1") && (l=="1") && (m=="2"))){
     $("#preciototal").val(293);
     }
     else if (((j=="2") && (k=="2") && (l=="1") && (m=="1")) || ((j=="1") && (k=="2") && (l=="2") && (m=="1")) || ((j=="1") && (k=="1") && (l=="2") && (m=="2")) || ((j=="1") && (k=="2") && (l=="1") && (m=="2"))){
      $("#preciototal").val(358);
     }
     else if (((j=="2") && (k=="2") && (l=="2") && (m=="1")) || ((j=="2") && (k=="2") && (l=="1") && (m=="2")) || ((j=="2") && (k=="1") && (l=="2") && (m=="2")) || ((j=="1") && (k=="2") && (l=="2") && (m=="2"))){
     $("#preciototal").val(423);
     }
     else if ((j=="2") && (k=="2") && (l=="2") && (m=="2")){
      $("#preciototal").val(488);
     }

     else {
      $("#preciototal").val(0);
     }
     break;

    default:
    $("#preciototal").val(0);
 }

}






