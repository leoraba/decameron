<?php
    if(isset($_POST['btnGuardar'])){
        $nombre = $_POST['txtNombre'];
        $precio = $_POST['txtPrecio'];
        mysql_query("INSERT INTO PRODUCTO(nombre_producto, precio) VALUES('$nombre', '$precio')",$ln);
    }else if(isset($_GET['elim'])){
        $id = $_GET['id'];
        mysql_query("DELETE FROM PRODUCTO WHERE id_producto = '$id'",$ln);
    }
?>

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1>
            Producto
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-home"></i> <a href='?m=home'> Inicio</a>
            </li>
            <li>
                <i class="fa fa-wrench"></i> <a href='?m=cat'> Catalogos</a>
            </li>
            <li class="active">
                <i class="fa fa-building"></i> Producto
            </li>
        </ol>
    </div>
</div>

<!-- contenido -->

<div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <form role="form" id="manto_form" action="" method="POST">
            <div class="panel panel-primary">

                <!-- titulo del form -->
                <div class="panel-heading">
                    <i class="fa fa-plus"></i>
                    Nuevo
                </div>
                
                <!-- Body del form -->
                <div class="panel-body">
                    <div class="row">
                        <div class="form-group col-lg-8">
                            <label class="control-label" >Nombre *</label><br/>
                            <input class="form-control" placeholder="" name="txtNombre" id="txtNombre">
                        </div>
                    </div>
                </div>




                <div class="panel-body">

                    <div class="row">
                        <div class="form-group col-lg-8">
                            <label class="control-label" > Tipo de Producto *</label>
                            <select class="form-control" name="cmbTipoProducto" id="cmbTipoProducto">
                                <option value=""> Seleccione una opci&oacute;n</option>
                                <?php
                                    $qr = mysql_query("SELECT id_tipo_producto, nombre_tipo_producto FROM TIPO_PRODUCTO ORDER BY nombre_tipo_producto ASC",$ln);
                                    while($row = mysql_fetch_array($qr)){
                                        echo "<option value='".$row['id_tipo_producto']."'>".$row['nombre_tipo_producto']."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>


                    <div class="panel-body">
                         <div class="row">

                            <div class="form-group col-lg-8">
                                <label class="control-label" > Marca *</label>
                                <select class="form-control" name="cmbMarca" id="cmbMarca">
                                    <option value=""> Seleccione una opci&oacute;n</option>
                                    <?php
                                         $qr = mysql_query("SELECT id_marca, nombre_marca FROM MARCA ORDER BY nombre_marca ASC",$ln);
                                        while($row = mysql_fetch_array($qr)){
                                             echo "<option value='".$row['id_marca']."'>".$row['nombre_marca']."</option>";
                                         }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                


                <div class="panel-body">
                    <div class="row">
                        <div class="form-group col-lg-8">
                             <label class="control-label"> Precio * </label><br/>
                             <input class="form-control" placeholder="$" name="txtPrecio" id="txtPrecio">
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
    <div class="col-lg-3"></div>
</div>

<!-- Formulario editar -->
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- dialog body -->
            <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            Hello world!
            </div>
            <!-- dialog buttons -->
            <div class="modal-footer"><button type="button" class="btn btn-primary">OK</button></div>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-7">
    <table id="table1" class="table table-striped table-bordered" cellspacing="0" width="130%">
        <thead>
            <tr role="row">
                <th>Nombre del Producto</th>
                <th>Precio del Producto</th>
                <th>Tipo del Producto</th>
                <th>Marca del Producto</th>
                <th width="120px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>

             <?php

            $qr = mysql_query("SELECT p.id_producto, CONCAT(p.nombre_producto,' ',p.precio) , t.nombre_tipo_producto, FROM PRODUCTO as p LEFT JOIN TIPO_PRODUCTO as t on p.fk_id_tipo_producto=t.id_tipo_producto LEFT JOIN MARCA as m on p.fk_id_marca=m.id_marca",$ln);
                
            while($row=mysql_fetch_array($qr)){
           
                echo "<tr>";
                echo "<td>".$row['nombreProducto']."</td>";
                echo "<td>".$row['precio']."</td>";
                echo "<td>".$row['tipoProducto']."</td>";
                echo "<td>".$row['marca']."</td>";
                echo "<td style='width:50px'>";
                echo "<div class='input-group-btn'>";
                echo "<button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown'>";
                echo "<i class='fa fa-gear'></i> <span class='caret'></span>";
                echo "</button>";
                echo "<ul class='dropdown-menu pull-right' role='menu'>";
                echo "<li><a onClick=\"abrirModificar('".$row['id_producto']."')\">Modificar</a></li>";
                echo "<li><a href='?m=prod&elim=1&id=".$row['id_producto']."'>Eliminar</a></li>";
                echo "</ul>";
                echo "</div>";
                echo "</td>";
                echo "</tr>";
            }
            
            ?>


        </tbody>
    </table>
    <div class="col-lg-3"></div>
</div>
<script language="JavaScript" type="text/javascript">
$(document).ready(function() {
    $('#table1').dataTable();
} );
</script>




