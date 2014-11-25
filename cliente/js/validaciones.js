//****************************************** Index.php *************************************************
//1. Validar navegacion en opcines del navbar
$(document).ready(function(){
$("#content").load("includes/wowslide.php");
});
$('a').click(function(){
var page = $(this).attr('href');
$("#content").load(page);
return false;
});

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

//3. Validacion de fechas
$(function() {
 $( "#from" ).datepicker({
  dateFormat: 'dd/mm/yy',
    minDate: 0,
      maxDate: '+6m',
  });
  $( "#to" ).datepicker({
    dateFormat: 'dd/mm/yy',
      maxDate: '+365d',
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
//5. fecha nacimiento
$(function() {
 $( "#fecha_nacimiento" ).datepicker({
  dateFormat: 'dd/mm/yy',
      maxDate: '-266m',
  });
 });

//6. Verificar que los passwords coinciden.
 $(document).ready(function(){
  var password1 = document.getElementById('password1');
    var password2 = document.getElementById('password2');
      password1.addEventListener('change', checkPasswordValidity, false);
        password2.addEventListener('change', checkPasswordValidity, false);
          var form = document.getElementById('passwordForm');
            form.addEventListener('submit', function() {
              checkPasswordValidity();
                if (!this.checkValidity()) {
                  event.preventDefault();
              //Implement you own means of displaying error messages to the user here.
                  password1.focus();
                }
              }, false);

  var checkPasswordValidity = function() {
    if (password1.value != password2.value) {
      password1.setCustomValidity('Las contrasenas no coinciden.');
       } else {
        password1.setCustomValidity('');
          }
        };
});

//7. Validar nombre y apellidos contengan solo letras
function sololetras(e){
        key=e.keyCode || e.witch;
        teclado=String.fromCharCode(key).toLowerCase();
        letras=" abcdefghijklmnñopqrstuvwxyz";
        especiales="8-37-38-46-164";
        teclado_especial=false;

        for (var i in especiales){
        if (key==especiales[i]){
        teclado_especial=true;
        break;
         }
        }

        if (letras.indexOf(teclado)==-1 && !teclado_especial){
        return false;
          }
         }

//8. Validar si el nombre de usuario esta disponible
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

//9. 