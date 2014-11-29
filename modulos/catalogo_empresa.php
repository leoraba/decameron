<?php
    if(isset($_POST['btnGuardar'])){
        $numero = $_POST['txtNRegistro'];
        $nit = $_POST['txtnit'];
        $nombreRegistro = $_POST['txtNombreRegistro'];
        $idGiro = $_POST['cmbGiroEmpresa'];
        mysql_query("INSERT INTO EMPRESA(numero_registro_iva, nit, nombre_registro, fk_id_giro_empresa) VALUES('$numero','$nit','$nombreRegistro','$idGiro')",$ln);
    }else if(isset($_GET['elim'])){
        $id = $_GET['id'];
        mysql_query("DELETE FROM EMPRESA WHERE id_empresa = '$id'",$ln);
    }
?>

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-10">
        <h1>
            Empresa
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-home"></i> <a href='?m=home'> Inicio</a>
            </li>
            <li>
                <i class="fa fa-wrench"></i> <a href='?m=cat'> Catalogos</a>
            </li>
            <li class="active">
                <i class="fa fa-building"></i> Empresa
            </li>
        </ol>
    </div>
</div>

<!-- contenido -->
<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-6">
        <form role="form" id="manto_form" action="" method="POST">
            <div class="panel panel-primary">
                <!-- titulo del form -->
                <div class="panel-heading">
                    <i class="fa fa-plus"></i>
                    Nueva Empresa
                </div>
                
                <!-- Body del form -->
                <div class="panel-body">
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label class="control-label" > # Registro de IVA *</label><br/>
                            <input class="form-control" placeholder="" name="txtNRegistro" id="txtNRegistro" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label class="control-label" > # NIT *</label><br/>
                            <input class="form-control" placeholder="" name="txtnit" id="txtnit" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label class="control-label" > Nombre del Registro *</label><br/>
                            <input class="form-control" placeholder="" name="txtNombreRegistro" id="txtNombreRegistro" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label class="control-label" > Giro de la Empresa *</label><br/>
                            <select class="form-control" name="cmbGiroEmpresa" id="cmbGiroEmpresa">
                                <option value=""> Seleccione una opci&oacute;n</option>
                                <?php
                                    $qr = mysql_query("SELECT id_giro_empresa, nombre_giro FROM GIRO_EMPRESA ORDER BY nombre_giro ASC",$ln);
                                    while($row = mysql_fetch_array($qr)){
                                        echo "<option value='".$row['id_giro_empresa']."'>".$row['nombre_giro']."</option>";
                                    }
                                ?>
                            </select>
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
<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-9">
    <table id="table1" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr role="row">
                <th> # Registro de IVA</th>
                <th> # NIT</th>
                <th> Nombre del Registro</th>
                <th> Giro de la Empresa</th>
                <th width="130px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $qr = mysql_query("SELECT em.id_empresa as id_empresa, em.numero_registro_iva as numero_registro_iva, em.nit as nit, em.nombre_registro as nombre_registro, g.nombre_giro as nombre_giro FROM EMPRESA as em LEFT JOIN GIRO_EMPRESA as g ON em.fk_id_giro_empresa = g.id_giro_empre ORDER BY em.numero_registro_iva ASC", $ln);
            while($row=mysql_fetch_array($qr)){
                
                echo "<tr>";
                echo "<td>".$row['numero_registro_iva']."</td>";
                
                echo "<td>".$row['nit']."</td>";
                echo "<td>".$row['nombre_registro']."</td>";
                echo "<td> $".$row['nombre_giro']."</td>";
                echo "<td style='width:50px'>";
                echo "<div class='input-group-btn'>";
                echo "<button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown'>";
                echo "<i class='fa fa-gear'></i> <span class='caret'></span>";
                echo "</button>";
                echo "<ul class='dropdown-menu pull-right' role='menu'>";
                echo "<li><a href='#'>Modificar</a></li>";
                echo "<li><a href='?m=empre&elim=1&id=".$row['id_empresa']."'>Eliminar</a></li>";
                echo "</ul>";
                echo "</div>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <div class="col-lg-1"></div>
</div>

<script language="JavaScript" type="text/javascript">
$(document).ready(function() {
    $('#table1').dataTable();
} );

</script>