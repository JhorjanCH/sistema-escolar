<?php
/**
 * Created By VisualStudioCode
 * User: Informatica Misión Sucre
 * Date: 10/10/2024
 * Time: 7:32am
 */
$id_grado = $_GET['id'];

include ('../../app/config.php');
include ('../../admin/layout/parte1.php');
include ('../../app/controllers/grados/datos_grados.php');

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- Main content -->
  <br>
  <div class="content">
    <div class="container">
      <div class="row">
        <h1>Grado: <?=$curso." - ".$seccion;?></h1>
      </div>
      <br>
      <div class="row">
        <div class="col-md-6">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">Datos resgistrados</h3>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">Nivel</label>
                    <P><?=$nivel?></P>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="">Grado</label>
                    <p><?=$curso?></p>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Turno</label>
                    <p><?=$turno?></p>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="">Fecha y hora creación</label>
                    <p><?=$fyh_creacion?></p>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="">Estado</label>
                    <p>
                      <?php 
                                if ($estado == "1") echo "ACTIVO";
                                else echo "INACTIVO"; 
                                ?>
                    </p>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <a href="<?=APP_URL;?>/admin/grados" class="btn btn-secondary">Volver</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php

include ('../../admin/layout/parte2.php');
include ('../../layout/mensajes.php');

?>