<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Portal de administracion Hotel Decameron</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/lg-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Plugins -->
    <link href="css/messi/messi.min.css" rel="stylesheet" type="text/css">

    <!-- jQuery Version 1.11.0 -->  
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Plugins -->
    <script src="js/validation/jquery.validate.js"></script>
    <script src="js/validation/messages_es.js"></script>
    <script src="js/messi/messi.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script type="text/javascript" language="JavaScript">
    $(document).ready(function() {  
        $("#login_form").validate({
            rules:{
                username: { required: true },
                password: { required: true }

            },
            submitHandler: function(form) {
                var url = "api/login.php";
                var form = $("#login_form");
                var data = form.serialize();

                $.ajax({
                    url:url,
                    type:'POST',
                    lang:'es',
                    data:data,
                    success:function(res){
                        var obj = jQuery.parseJSON(res);
                        if(obj.success){
                            window.location.href="?m=home";
                        }else{
                            new Messi('Usuario y/o contraseña incorrectos.', {title: 'Autenticacion incorrecta', titleClass: 'anim error', buttons: [{id: 0, label: 'Close', val: 'X'}], modal: true});
                        }
                    }
                });
            }
        });
    });
    </script>
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand" href="?m=home">Royal Decameron Salinitas</a>
        </div>
    </nav>
    

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="wrapper">
              <form class="form-signin" id="login_form" method="POST">
                <h2 class="form-signin-heading">Login</h2>
                <input type="text" class="form-control" name="username" id="username" placeholder="Username" autofocus="" autocomplete="off" /><br>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off" /><br>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button> 
              </form>
            </div>
        </div>
    </div>
</body>
</html>
