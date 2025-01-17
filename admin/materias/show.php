<?php
/**
 * Created By VisualStudioCode
 * User: Informatica Misión Sucre
 * Date: 10/10/2024
 * Time: 7:32am
 */
$id_materia = $_GET['id'];

include ('../../app/config.php');
include ('../../admin/layout/parte1.php');
include ('../../app/controllers/materias/datos_materia.php');

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <!-- Main content -->
    <br>
    <div class="content">
      <div class="container">
        <div class="row">
          <h1>Materia: <?=$nombre_materia;?></h1>
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
                            <label for="">Materia</label>
                            <P><?=$nombre_materia?></P>
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
                             <a href="<?=APP_URL;?>/admin/materias" class="btn btn-secondary">Volver</a>
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