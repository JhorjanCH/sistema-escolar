<?php
/**
 * Created By VisualStudioCode
 * User: Informatica Misión Sucre
 * Date: 10/10/2024
 * Time: 7:32am
 */
include ('../../app/config.php');
include ('../../admin/layout/parte1.php');
include ('../../app/controllers/niveles/listado_de_niveles.php');

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <!-- Main content -->
    <br>
    <div class="content">
      <div class="container">
        <div class="row">
          <h1>Registro de grado</h1>
        </div>
        <br>
        <div class="col-md-6">
            <div class="card card-outline card-primary">
                <div class="card-header">
                  <h3 class="card-title">Formulario de datos</h3>
                </div>
              <div class="card-body">
                <form action="<?=APP_URL;?>/app/controllers/grados/create.php" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nivel</label>
                            <select name="nivel_id" id="" class="form-control">
                                <?php 
                                foreach ($niveles as $nivele) { 
                                    ?>
                                    <option value="<?=$nivele['id_nivel'];?>"><?=$nivele['nivel']." - ".$nivele['turno'];?></option>
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
                            <label for="">Grado</label>
                            <select name="curso" id="" class="form-control">
                                <option value="INICIAL - 1">INICIAL - 1</option>
                                <option value="INICIAL - 2">INICIAL - 2</option>
                                <option value="INICIAL - 3">INICIAL - 3</option>
                                <option value="PRIMER GRADO">PRIMER GRADO</option>
                                <option value="SEGUNDO GRADO">SEGUNDO GRADO</option>
                                <option value="TERCER GRADO">TERCER GRADO</option>
                                <option value="CUARTO GRADO">CUARTO GRADO</option>
                                <option value="QUINTO GRADO">QUINTO GRADO</option>
                                <option value="SEXTO GRADO">SEXTO GRADO</option>
                                <option value="PRIMER AÑO">PRIMER AÑO</option>
                                <option value="SEGUNDO AÑO">SEGUNDO AÑO</option>
                                <option value="TERCER AÑO">TERCER AÑO</option>
                                <option value="CUARTO AÑO">CUARTO AÑO</option>
                                <option value="QUINTO AÑO">QUINTO AÑO</option>
                            </select>
                        </div>  
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="">Sección</label>
                            <select name="seccion" id="" class="form-control">
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                            </select>
                        </div>  
                    </div>
                </div>        
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                             <button type="submit" class="btn btn-primary">Registrar</button>
                             <a href="<?=APP_URL;?>/admin/grados" class="btn btn-secondary">Cancelar</a>
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