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
include ('../../app/controllers/niveles/listado_de_niveles.php');

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <!-- Main content -->
    <br>
    <div class="content">
      <div class="container">
        <div class="row">
          <h1>Modificar del Grado: <?=$curso;?> </h1>
        </div>
        <br>
        <div class="row">
          <div class="col-md-6">
            <div class="card card-outline card-success">
                <div class="card-header">
                  <h3 class="card-title">Formulario de datos</h3>
                </div>
              <div class="card-body">
                <form action="<?=APP_URL;?>/app/controllers/grados/update.php" method="post">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Nivel</label>
                            <input type="text" name="id_grado" value="<?=$id_grado;?>" hidden>
                            <select name="nivel_id" id="" class="form-control">
                                <?php 
                                foreach ($niveles as $nivele) { 
                                    ?>
                                    <option value="<?=$nivele['id_nivel'];?>"<?=$nivel_id==$nivele['id_nivel'] ? 'selected' : '' ?>><?=$nivele['nivel']." - ".$nivele['turno'];?></option>
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
                                <option value="INICIAL - 1"<?=$curso=='INICIAL - 1' ? 'selected' : ''?>>INICIAL - 1</option>
                                <option value="INICIAL - 2"<?=$curso=='INICIAL - 2' ? 'selected' : ''?>>INICIAL - 2</option>
                                <option value="INICIAL - 3"<?=$curso=='INICIAL - 3' ? 'selected' : ''?>>INICIAL - 3</option>
                                <option value="PRIMARIA - PRIMER GRADO"<?=$curso=='PRIMARIA - PRIMER GRADO' ? 'selected' : ''?>>PRIMARIA - PRIMER GRADO</option>
                                <option value="PRIMARIA - SEGUNDO GRADO"<?=$curso=='PRIMARIA - SEGUNDO GRADO' ? 'selected' : ''?>>PRIMARIA - SEGUNDO GRADO</option>
                                <option value="PRIMARIA - TERCER GRADO"<?=$curso=='PRIMARIA - TERCER GRADO' ? 'selected' : ''?>>PRIMARIA - TERCER GRADO</option>
                                <option value="PRIMARIA - CUARTO GRADO"<?=$curso=='PRIMARIA - CUARTO GRADO' ? 'selected' : ''?>>PRIMARIA - CUARTO GRADO</option>
                                <option value="PRIMARIA - QUINTO GRADO"<?=$curso=='PRIMARIA - QUINTO GRADO' ? 'selected' : ''?>>PRIMARIA - QUINTO GRADO</option>
                                <option value="PRIMARIA - SEXTO GRADO"<?=$curso=='PRIMARIA - SEXTO GRADO' ? 'selected' : ''?>>PRIMARIA - SEXTO GRADO</option>
                                <option value="BÁSICA - PRIMER AÑO"<?=$curso=='BÁSICA - PRIMER AÑO' ? 'selected' : ''?>>BÁSICA - PRIMER AÑO</optin>
                                <option value="BÁSICA - SEGUNDO AÑO"<?=$curso=='BÁSICA - SEGUNDO AÑO' ? 'selected' : ''?>>BÁSICA - SEGUNDO AÑO</option>
                                <option value="BÁSICA - TERCER AÑO"<?=$curso=='BÁSICA - TERCER AÑO' ? 'selected' : ''?>>BÁSICA - TERCER AÑO</option>
                                <option value="DIVERSIFICADO - CUARTO AÑO"<?=$curso=='DIVERSIFICADO - CUARTO AÑO' ? 'selected' : ''?>>DIVERSIFICADO - CUARTO AÑO</option>
                                <option value="DIVERSIFICADO - QUINTO AÑO"<?=$curso=='DIVERSIFICADO - QUINTO AÑO' ? 'selected' : ''?>>DIVERSIFICADO - QUINTO AÑO</option>
                            </select>
                        </div>  
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="">Sección</label>
                            <select name="seccion" id="" class="form-control">
                                <option value="A"<?=$seccion=='A' ? 'selected' : ''?>>A</option>
                                <option value="B"<?=$seccion=='B' ? 'selected' : ''?>>B</option>
                                <option value="C"<?=$seccion=='C' ? 'selected' : ''?>>C</option>
                                <option value="D"<?=$seccion=='D' ? 'selected' : ''?>>D</option>
                            </select>
                        </div>  
                    </div>
                </div>        
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                             <button type="submit" class="btn btn-success">Actualizar</button>
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