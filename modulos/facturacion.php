<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Facturaci&oacute;n
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-home"></i> <a href='?m=home'> Inicio</a>
            </li>
            <li class="active">
                <i class="fa fa-dollar"></i>  <a href='?m=fact'>Facturaci&oacute;n</a>
            </li>
        </ol>
    </div>
</div>

<!-- contenido -->
<div id="divSearch">
    <div class="row">
        <div class="col-lg-10">
            <label class="control-label">Busqueda:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-10">
            <form name="factura_form" id="factura_form" action="" method="POST">
                <div class="form-group input-group">
                    <select class="form-control" name="txtSearchHuesped" id="txtSearchHuesped">
                        <option></option>
                        <?php
                            $qr=mysql_query("SELECT ct.id_cliente_titular, ct.nombres, ct.apellidos, ct.num_documento, td.tipo_documento FROM CLIENTE_TITULAR ct LEFT JOIN TIPO_DOCUMENTO td ON ct.fk_id_tipo_documento=td.id_tipo_documento ORDER BY ct.nombres DESC",$ln);
                            while($row=mysql_fetch_array($qr)){
                                $cadenaCliente=$row['nombres']." ".$row['apellidos']."(".$row['tipo_documento'].": ".$row['num_documento'].")";
                                echo "<option value='".$row['id_cliente_titular']."'>$cadenaCliente</option>\n";
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group input-group">
                    <button class="btn btn-primary" type="submit" id="btnMostrarFactura" name="btnMostrarFactura">
                        <i class="fa fa-save"></i>
                        Mostrar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<form role="form">
    <div class="panel panel-green" id="divInfo" style="display: none">
        <div class="panel-heading">
            <h3 class="panel-title">Detalle de factura</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-9">
                </div>
                <div class="col-lg-3">
                    <button class="btn btn-lg btn-success" type="button">Efectuar pago</button>
                </div>
            </div>
            <div class="">
                <div class="row">
                    <div class="col-lg-6">
                    </div>
                    <div class="col-lg-6">
                            <h1>Factura # <b><div id="txtNumFactura"></div></b></h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <b>Ciudad y fecha:</b>Sonsonate, <?=date("d-m-Y")?><br><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <b>Nombre del cliente:</b><span id="txtNombre"></span><br><br>
                    </div>
                </div>
            </div>
            <div class="table-responsive" id="regTabla">
                
            </div>
            <div class="row well">
                <div class="col-lg-6">
                    <h3>Subtotal:</h3>
                    <h3>IVA:</h3>
                    <h1>Total:</h1>
                </div>
                <div class="col-lg-6">
                    <h3><span id="txtSubtotal"></span></h3>
                    <h3><span id="txtIva"></span></h3>
                    <h1><span id="txtTotal"></span></h1>
                </div>
            </div>
        </div>
    </div>
<form>

<script type="text/javascript" language="Javascript">
    $(document).ready(function(){
        $("#txtSearchHuesped").select2({
            placeholder: "Nombre del huesped",
            allowClear: true,
            minimumInputLength: 3
        });
        $("#factura_form").validate({
            rules:{
                txtSearchHuesped: { require: true }
            },
            submitHandler: function(form) {
                if($("#txtSearchHuesped").val()!=""){
                    var url = "api/factura.php";
                    var id = $("#txtSearchHuesped").val();
                    $.ajax({
                        url:url,
                        type:'GET',
                        data:'accion=get&id='+id,
                        success:function(res){
                            var obj = jQuery.parseJSON(res);
                            if(obj.success){
                                $("#txtNumFactura").text(obj.num_factura);
                                $("#txtNombre").text(obj.nombre+" "+obj.apellido);
                                $("#txtSubtotal").text(obj.total_costo);
                                $("#txtIva").text(obj.iva);
                                $("#txtTotal").text(obj.total_total);
                                $("#regTabla").append(obj.reservaciones);


                                $("#divInfo").show();
                                $("#divSearch").hide();
                            }
                        }
                    });
                }else{
                    new Messi('Seleccione un huesped', {title: 'Huesped', titleClass: 'anim error', buttons: [{id: 0, label: 'Close', val: 'X'}], modal: true });
                }
            }
        });
    });
</script>