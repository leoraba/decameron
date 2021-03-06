<?php
    if(isset($_POST['btnGuardar'])){
        $nombre = $_POST['txtNombreGiro'];
        
        mysql_query("INSERT INTO GIRO_EMPRESA(nombre_giro) VALUES('$nombre')",$ln);
    }else if(isset($_GET['elim'])){
        $id = $_GET['id'];
        mysql_query("DELETE FROM GIRO_EMPRESA WHERE id_giro_empresa='$id'",$ln);
    }
?>

<!-- Page Heading -->
<div class="row">
    
    <div class="col-lg-6">
        <h1>
            Giro de Empresa
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-home"></i> <a href='?m=home'> Inicio</a>
            </li>
            <li>
                <i class="fa fa-wrench"></i> <a href='?m=cat'> Catalogos</a>
            </li>
            <li class="active">
                <i class="fa fa-building"></i> Giro de Empresa
        </ol>
    </div>
</div>

<!-- contenido -->
<div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-5">
        <form role="form" id="manto_form" action="" method="POST">
            <div class="panel panel-primary">
                <!-- titulo del form -->
                <div class="panel-heading">
                    <i class="fa fa-plus"></i>
                    Nuevo Giro de Empresa
                </div>
                
                <!-- Body del form -->
                <div class="panel-body">
                    <div class="row">
                        <div class="form-group col-lg-8">
                            <label class="control-label" > Nombre del Giro *</label><br/>
                            <input class="form-control" placeholder="" name="txtNombreGiro" id="txtNombreGiro" >
                        </div>
                    </div>
                </div>

                <!-- Botones -->
                <div class="panel-footer">
                    <button class="btn btn-primary" type="submit" id="btnGuardar" name="btnGuardar">
                        <i class="fa fa-save"></i>
                        Guardar
                    </button>
                    <a class="btn btn-default" href="?m=cat">
                        <i class="fa fa-reply"></i>
                        Cancelar
                    </a>
                    <button name="btnLimpiar" class="btn btn-default" type="reset">
                        <i class="fa fa-eraser"></i>
                        Limpiar
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-lg-3">
        <ul class="list-group">
            <li class="list-group-item"><b>Opciones</b></li>
            <li class="list-group-item"><a href="?m=empre"><i class="fa fa-hospital-o"></i> Empresas</a></li>
            <li class="list-group-item"><a href="?m=giro"><i class="fa fa-hospital-o"></i> Giro de la Empresa</a></li>
            
        </ul>
    </div>
</div>


<!-- Formulario editar -->
<div id="divEditarForm" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Giro</h4>
            </div>
            <form role="form" id="editar_form" action="" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="accion" id="accion" value="mdo">
                    <input type="hidden" name="idEdit" id="idEdit" value="">
                    <div class="row">
                        <div class="form-group col-lg-8">
                            <label class="control-label" > Nombre del Giro *</label><br/>
                            <input class="form-control" placeholder="" name="txtNombreGiroEdit" id="txtNombreGiroEdit" >
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="button" name="btnGuardarEdit" id="btnGuardarEdit">
                        <i class="fa fa-save"></i>
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>




<div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-5">
    <table id="table1" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr role="row">
                <th>Nombre del Giro</th>
                <th width="100px">&nbsp;</th>
                
                
            </tr>
        </thead>
        <tbody>
            <?php
            $qr = mysql_query("SELECT id_giro_empresa, nombre_giro FROM GIRO_EMPRESA ORDER BY nombre_giro ASC", $ln);
            while($row=mysql_fetch_array($qr)){
                echo "<tr>";
                echo "<td>".$row['nombre_giro']."</td>";
                
                echo "<td style='width:50px'>";
                echo "<div class='input-group-btn'>";
                echo "<button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown'>";
                echo "<i class='fa fa-gear'></i> <span class='caret'></span>";
                echo "</button>";
                echo "<ul class='dropdown-menu pull-right' role='menu'>";
                echo "<li><a href='#' onClick=\"abrirEditarForm('".$row['id_giro_empresa']."')\">Modificar</a></li>";
                echo "<li><a href='?m=giro&elim=1&id=".$row['id_giro_empresa']."'>Eliminar</a></li>";
                echo "</ul>";
                echo "</div>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <div class="col-lg-2"></div>
</div>

<script language="JavaScript" type="text/javascript">
$(document).ready(function() {
    $('#table1').dataTable();
    $("#btnGuardarEdit").click(function(){ guardarEditarForm(); });

    jQuery.validator.addMethod("lettersonly", function(value, element) {
        return this.optional(element) || /^[a-z," "]+$/i.test(value);
        }, "Campo valido solo para letras");
    $("#manto_form").validate({
        rules:{
            txtNombreGiro: { required: true, maxlength: 30, minlength: 6, lettersonly:true }
            
            
        }
    });
} );
function abrirEditarForm(id){
    var url = "api/giros.php";
    var data = "accion=get&id="+id;
    $.ajax({
        url:url,
        type:'POST',
        data:data,
        success:function(res){
            var obj = jQuery.parseJSON(res);
            if(obj.success){
                $("#txtNombreGiroEdit").val(obj.nombre);

                $("#idEdit").val(id);
            }
        }
    });

    $("#divEditarForm").modal('show');

}
function guardarEditarForm(id){
 var url = "api/giros.php";
 var data = $("#editar_form").serialize();
    $.ajax({
        url:url,
        type:'POST',
        data:data,
        success:function(res){
            var obj = jQuery.parseJSON(res);
            if(obj.success){
                $("#lean_overlay").trigger("click");
                window.location.href='?m=giro';
            }
        }
    });
}
</script>


