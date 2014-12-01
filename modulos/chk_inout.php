<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Habitaciones
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-home"></i> <a href='?m=home'> Inicio</a>
            </li>
            <li class="active">
                <i class="fa fa-key"></i> Checkin/checkout
            </li>
        </ol>
    </div>
</div>

<div role="tabpanel">






<div class="row" id="presentation" name="presentation">
    <div class="col-lg-1"></div>
    <div class="col-lg-9">
        <ul role="tablist" class="nav nav-tabs" id="myTab">
            <li role="presentation" class="active"><a aria-expanded="false" aria-controls="checkin" data-toggle="tab" role="tab" id="checkin-tab" href="#checkin">Reservas</a></li>
            <li role="presentation"><a aria-expanded="false" aria-controls="checkout" data-toggle="tab" role="tab" id="checkout-tab" href="#checkout">Ocupadas</a></li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <div aria-labelledby="checkin-tab" id="checkin" class="tab-pane active" role="tabpanel">
                <br>
                <table id="table1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr role="row">
                            <th># Reserva</th>
                            <th>Cliente titular</th>
                            <th>Documento</th>
                            <th>Cantidad de huespedes</th>
                            <th>Fecha de inicio</th>
                            <th>Fecha fin</th>
                            <th width="100px">&nbsp;</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $qr = mysql_query("SELECT r.id_reserva_habitacion, r.codigo_reserva, r.fecha_inicio, r.fecha_fin, c.nombres, c.apellidos, c.num_documento FROM RESERVA_HABITACION r LEFT JOIN CLIENTE_TITULAR c ON r.fk_id_cliente_titular=c.id_cliente_titular WHERE r.checkin IS NULL ORDER BY r.fecha_inicio ASC ", $ln);
                        while($row=mysql_fetch_array($qr)){
                            $idReserva=$row['id_reserva_habitacion'];
                            $rwCant=mysql_fetch_array(mysql_query("SELECT COUNT(id_acompanante) FROM ACOMPANANTE WHERE fk_id_reserva_habitacion='$idReserva'",$ln));
                            $cantAcomp=$rwCant[0];
                            echo "<tr>";
                            echo "<td>".$row['codigo_reserva']."</td>";
                            echo "<td>".$row['nombres']." ".$row['apellidos']."</td>";
                            echo "<td>".$row['num_documento']."</td>";
                            echo "<td>$cantAcomp</td>";
                            echo "<td>".$row['fecha_inicio']."</td>";
                            echo "<td>".$row['fecha_fin']."</td>";
                            echo "<td style='width:50px'>";
                            echo "<div class='input-group-btn'>";
                            echo "<button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown'>";
                            echo "<i class='fa fa-gear'></i> <span class='caret'></span>";
                            echo "</button>";
                            echo "<ul class='dropdown-menu pull-right' role='menu'>";
                            echo "<li><a href='#' onClick=\"abrirCheckinForm('".$row['id_reserva_habitacion']."')\">Check-in</a></li>";
                            echo "<li><a href='#' onClick=\"abrirEditarForm('".$row['id_reserva_habitacion']."')\">Modificar</a></li>";
                            echo "<li><a href='#' onClick=\"eliminarAccion('".$row['id_reserva_habitacion']."')\">Eliminar</a></li>";
                            echo "</ul>";
                            echo "</div>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>

            </div>
            <div aria-labelledby="checkout-tab" id="checkout" class="tab-pane fade" role="tabpanel">
                
                <br>
                <table id="table1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr role="row">
                            <th># Reserva</th>
                            <th># Habitacion</th>
                            <th>Cliente titular</th>
                            <th>Documento</th>
                            <th>Cantidad de huespedes</th>
                            <th>Fecha de inicio</th>
                            <th>Fecha fin</th>
                            <th width="100px">&nbsp;</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $qr = mysql_query("SELECT r.id_reserva_habitacion, r.codigo_reserva, r.fecha_inicio, r.fecha_fin, c.nombres, c.apellidos, c.num_documento, h.num_habitacion FROM RESERVA_HABITACION r LEFT JOIN CLIENTE_TITULAR c ON r.fk_id_cliente_titular=c.id_cliente_titular LEFT JOIN HABITACION h ON r.id_habitacion=h.id_habitacion WHERE r.checkin IS NOT NULL AND r.checkout IS NULL ORDER BY r.fecha_fin ASC", $ln);
                        while($row=mysql_fetch_array($qr)){
                            $idReserva=$row['id_reserva_habitacion'];
                            $rwCant=mysql_fetch_array(mysql_query("SELECT COUNT(id_acompanante) FROM ACOMPANANTE WHERE fk_id_reserva_habitacion='$idReserva'",$ln));
                            $cantAcomp=$rwCant[0];
                            echo "<tr>";
                            echo "<td>".$row['codigo_reserva']."</td>";
                            echo "<td>".$row['num_habitacion']."</td>";
                            echo "<td>".$row['nombres']." ".$row['apellidos']."</td>";
                            echo "<td>".$row['num_documento']."</td>";
                            echo "<td>$cantAcomp</td>";
                            echo "<td>".$row['fecha_inicio']."</td>";
                            echo "<td>".$row['fecha_fin']."</td>";
                            echo "<td style='width:50px'>";
                            echo "<div class='input-group-btn'>";
                            echo "<button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown'>";
                            echo "<i class='fa fa-gear'></i> <span class='caret'></span>";
                            echo "</button>";
                            echo "<ul class='dropdown-menu pull-right' role='menu'>";
                            echo "<li><a href='#' onClick=\"abrirCheckoutForm('".$row['id_reserva_habitacion']."')\">Check-out</a></li>";
                            echo "</ul>";
                            echo "</div>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <div class="col-lg-1"></div>
</div>

<div id="divFormCheckIn" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Check-in</h4>
            </div>
            <div class="modal-body">
                <form role="form" id="checkin_form" action="" method="POST">
                    <input type="hidden" name="idReservaCheckin" id="idReservaCheckin" value="">
                    <input type="hidden" name="accion" id="accion" value="checkin">
                    <div class="row">
                        <div class="form-group col-lg-8">
                            <label class="control-label" > Edificio *</label><br/>
                            <select class="form-control" name="cmbEdificio" id="cmbEdificio">
                                <option></option>
                                <?php
                                    $qrEdi=mysql_query("SELECT id_edificio, nombre_edificio FROM EDIFICIO ORDER BY nombre_edificio ASC",$ln);
                                    while($rowEdi=mysql_fetch_array($qrEdi)){
                                        echo "<option value='".$rowEdi['id_edificio']."'>".$rowEdi['nombre_edificio']."</option>\n";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-8">
                            <label class="control-label" > Habitacion *</label><br/>
                            <select class="form-control" name="cmbHabitacion" id="cmbHabitacion">
                                <option></option>
                                <?php
                                    $qrEdi=mysql_query("SELECT id_habitacion, num_habitacion FROM HABITACION WHERE estado_habitacion='d' and fk_id_edificio='1'",$ln);
                                    while($rowEdi=mysql_fetch_array($qrEdi)){
                                        echo "<option value='".$rowEdi['id_habitacion']."'>".$rowEdi['num_habitacion']."</option>\n";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-8">
                            <button class="btn btn-primary" type="submit" id="btnCheckin" name="btnCheckin">
                                <i class="fa fa-save"></i>
                                Guardar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script language="JavaScript" type="text/javascript">
    $(document).ready(function() {
        $('#table1').dataTable();
        $('#cmbEdificio').select2({
            placeholder: "Seleccione un edificio"
        });
        $('#cmbHabitacion').select2({
            placeholder: "Seleccione una habitacion"
        });
        $("#checkin_form").validate({
            rules:{
                cmbEdificio: { required: true },
                cmbHabitacion: { required: true }
            },
            submitHandler: function(form) { 
                if($("#cmbEdificio").val()!="" && $("#cmbHabitacion").val()!=""){
                    realizarCheckin() 
                }else{
                    new Messi('Seleccione una habitacion.', {title: 'Checkin', titleClass: 'anim error', buttons: [{id: 0, label: 'Close', val: 'X'}]});
                }
            }
        });
        estadosHabitacion();
    });
    function realizarCheckin(){
        var url = "api/habitaciones.php";
        var form = $("#checkin_form");
        var data = form.serialize();
        $.ajax({
            url:url,
            type:'POST',
            data:data,
            success:function(res){
                var obj = jQuery.parseJSON(res);
                if(obj.success){
                    $("#lean_overlay").trigger("click");
                    window.location.href="?m=chinout";
                }
            }
        });
    }
    function estadosHabitacion(){
        var url = "api/habitaciones.php";
        $.ajax({
            url:url,
            type:'GET',
            data:'accion=estadoHabitaciones',
            success:function(res){
                var obj = jQuery.parseJSON(res);
                if(obj.success){
                    $("#lean_overlay").trigger("click");
                    window.location.href="?m=chinout";
                }
            }
        });
    }
    function eliminarAccion(id){
        Messi.ask('Desea eliminar este registro?', function(val) { 
            if(val=="Y"){
                var url = "api/habitaciones.php";
                $.ajax({
                    url:url,
                    type:'GET',
                    data:'accion=elim&id='+id,
                    success:function(res){
                        var obj = jQuery.parseJSON(res);
                        if(obj.success){
                            $("#lean_overlay").trigger("click");
                            window.location.href="?m=chinout";
                        }
                    }
                });
            } 
        });
    }
    function abrirCheckinForm(id){
        $("#idReservaCheckin").val(id);
        $("#divFormCheckIn").modal('show');
    }
    function abrirCheckoutForm(id){
        new Messi('Desea continuar con el checkout?.', {title: 'Check-out', buttons: [{id: 0, label: 'Si', val: 'Y'}, {id: 1, label: 'No', val: 'N'}], callback: function(val) {
            var url = "api/habitaciones.php";
            $.ajax({
                url:url,
                type:'GET',
                data:'accion=checkout&id='+id,
                success:function(res){
                    var obj = jQuery.parseJSON(res);
                    if(obj.success){
                        $("#lean_overlay").trigger("click");
                        window.location.href="?m=chinout";
                    }
                }
            });
        }});
    }
</script>