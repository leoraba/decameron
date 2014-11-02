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
                <i class="fa fa-dollar"></i> Facturaci&oacute;n
            </li>
        </ol>
    </div>
</div>

<!-- contenido -->
<div id="divSearch">
    <div class="row">
        <div class="col-lg-6">
            <label class="control-label">Busqueda:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group input-group">
                <input type="text" class="form-control" placeholder="nombre de cliente o # de habitacion">
                <span class="input-group-btn"><button type="button" class="btn btn-default" id="btnBuscar"><i class="fa fa-search"></i></button></span>
            </div>
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
                            <h1>Factura # <b>28883</b></h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <b>Ciudad y fecha:</b>Sonsonate, Sabado 01 de noviembre del 2014<br><br>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th># de Orden</th>
                            <th>Detalle</th>
                            <th>Monto (USD)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>3326</td>
                            <td>Hospedaje 2 adultos 1 ni&ntilde;o</td>
                            <td>$321.33</td>
                        </tr>
                        <tr>
                            <td>3451</td>
                            <td>1 servicio de spa</td>
                            <td>$19.25</td>
                        </tr>
                        <tr>
                            <td>3502</td>
                            <td>1 alquiler de bicicleta</td>
                            <td>$2.00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row well">
                <div class="col-lg-6">
                    <h3>Subtotal:</h3>
                    <h3>IVA:</h3>
                    <h1>Total:</h1>
                </div>
                <div class="col-lg-6">
                    <h3>$342.58</h3>
                    <h3>$44.53</h3>
                    <h1>$387.11</h1>
                </div>
            </div>
        </div>
    </div>
<form>

<script type="text/javascript" language="Javascript">
    $(document).ready(function(){
        $("#btnBuscar").click(function(){
           $("#divInfo").show();
           $("#divSearch").hide();
        });
    });
</script>