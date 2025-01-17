<?php
/**
 * Created By VisualStudioCode
 * User: Informatica Misión Sucre
 * Date: 10/10/2024
 * Time: 7:32am
 */
include ('../../app/config.php');
include ('../../admin/layout/parte1.php');
include ('../../app/controllers/configuraciones/gestion/listado_de_gestiones.php');

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <!-- Main content -->
    <br>
    <div class="content">
      <div class="container">
        <div class="row">
          <h1>Registro de nivel</h1>
        </div>
        <br>
        <div class="row">
          <div class="col-md-6">
            <div class="card card-outline card-primary">
                <div class="card-header">
                  <h3 class="card-title">Formulario de datos</h3>
                </div>
              <div class="card-body">
                <form action="<?=APP_URL;?>/app/controllers/niveles/create.php" method="post">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Gestión educativa</label>
                            <select name="gestion_id" id="" class="form-control">
                                <?php 
                                foreach ($gestiones as $gestione) { 
                                    if ($gestione['estado']=="1") {   ?>
                                        <option value="<?=$gestione['id_gestion'];?>"><?=$gestione['gestion'];?></option>
                                        <?php
                                    } ?>    
                                <?php    
                                }
                                ?>
                            </select>
                        </div>  
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nivel">Niveles</label>
                            <select name="nivel" id="" class="form-control">
                                <option value="INICIAL">INICIAL</option>
                                <option value="PRIMARIA">PRIMARIA</option>
                                <option value="BÁSICA">BÁSICA</option>
                                <option value="DIVERSIFICADO">DIVERSIFICADO</option>
                            </select>
                        </div>  
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Turnos</label>
                            <select name="turno" id="" class="form-control">
                                <option value="MAÑANA">MAÑANA</option>
                                <option value="TARDE">TARDE</option>
                                <option value="NOCHE">NOCHE</option>
                            </select>
                        </div>  
                    </div>
                </div>        
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                             <button type="submit" class="btn btn-primary">Registrar</button>
                             <a href="<?=APP_URL;?>/admin/niveles" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </div>
                </div>
                </form>
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