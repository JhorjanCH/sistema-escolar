<?php
/**
 * Created By VisualStudioCode
 * User: Informatica Misión Sucre
 * Date: 10/10/2024
 * Time: 7:32am
 */
$id_estudiante = $_GET['id'];
include ('../../app/config.php');
include ('../../admin/layout/parte1.php');
include ('../../app/controllers/estudiantes/datos_del_estudiante.php');
include ('../../app/controllers/roles/listado_de_roles.php');
include ('../../app/controllers/niveles/listado_de_niveles.php');
include ('../../app/controllers/grados/listado_de_grados.php');

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- Main content -->
  <br>
  <div class="content">
    <div class="container">
      <div class="row">
        <h1>Modificar Estudiante: <?=$apellidos." ".$nombres;?></h1>
      </div>
      <br>

      <form action="<?=APP_URL;?>/app/controllers/estudiantes/update.php" method="post">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-outline card-success">
              <div class="card-header">
                <h3 class="card-title">Formulario de datos estudiante</h3>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <input type="text" value="<?=$id_usuario;?>" name="id_usuario" hidden>
                      <input type="text" value="<?=$id_persona;?>" name="id_persona" hidden>
                      <input type="text" value="<?=$id_estudiante;?>" name="id_estudiante" hidden>
                      <input type="text" value="<?=$id_ppff;?>" name="id_ppff" hidden>
                      <label for="">-</label>
                      <!-- <a href="<?=APP_URL;?>/admin/roles/create.php" style="margin-left: 5px" class="btn btn-primary btn-sm"><i class="bi bi-file-plus"></i></a> -->
                      <div class="form-group">
                        <select name="rol_id" id="" class="form-control">
                          <?php
                                                foreach ($roles as $role) { ?>
                          <option value="<?=$role['id_rol'];?>"
                            <?=$role['nombre_rol']== "ESTUDIANTE" ? 'selected' : ''?>><?=$role['nombre_rol'];?></option>
                          <?php
                                                }
                                                ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="">Nombres</label>
                      <input type="text" name="nombres" value="<?=$nombres;?>" class="form-control" required>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="">Apellidos</label>
                      <input type="text" name="apellidos" value="<?=$apellidos;?>" class="form-control" required>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="">Cedula de identidad</label>
                      <input type="number" name="ci" value="<?=$ci;?>" class="form-control" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="">Fecha de nacimiento</label>
                      <input type="date" name="fecha_nacimiento" value="<?=$fecha_nacimiento;?>" class="form-control"
                        required>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="">Celular</label>
                      <input type="number" name="celular" value="<?=$celular;?>" class="form-control" required>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="">Correo</label>
                      <input type="email" name="email" value="<?=$email;?>" class="form-control" required>
                    </div>
                  </div>

                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="">Dirección</label>
                      <input type="address" name="direccion" value="<?=$direccion;?>" class="form-control" required>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="card card-outline card-success">
              <div class="card-header">
                <h3 class="card-title">Formulario de datos académicos</h3>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="">Nivel</label>
                      <div class="form-group">
                        <select name="nivel_id" id="" class="form-control">
                          <?php
                                                foreach ($niveles as $nivele) { ?>
                          <option value="<?=$nivele['id_nivel'];?>"
                            <?=$nivele['id_nivel']==$nivel_id ? 'selected' : ''?>>
                            <?=$nivele['nivel']." - ".$nivele['turno']?></option>
                          <?php
                                                }
                                                ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="">Grado</label>
                      <select name="grado_id" id="" class="form-control">
                        <?php
                                            foreach ($grados as $grado) { ?>
                        <option value="<?=$grado['id_grado'];?>" <?=$grado['id_grado']==$grado_id ? 'selected' : ''?>>
                          <?=$grado['curso']." | Sección ".$grado['seccion']?></option>
                        <?php
                                            }
                                            ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="">SIGE</label>
                      <input type="text" name="sige" value="<?=$sige;?>" class="form-control" required>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="card card-outline card-success">
              <div class="card-header">
                <h3 class="card-title">Formulario de datos padre de familia</h3>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="">Nombres y Apellidos</label>
                      <input type="text" name="nombres_apellidos_ppff" value="<?=$nombres_apellidos_ppff;?>"
                        class="form-control" required>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="">Cédula de Identidad</label>
                      <input type="text" name="ci_ppff" value="<?=$ci_ppff;?>" class="form-control" required>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="">Celular</label>
                      <input type="text" name="celular_ppff" value="<?=$celular_ppff;?>" class="form-control" required>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="">Ocupación</label>
                      <input type="text" name="ocupacion_ppff" value="<?=$ocupacion_ppff;?>" class="form-control"
                        required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="">Nombre y apellido de referencia</label>
                      <input type="text" name="ref_nombre" value="<?=$ref_nombre;?>" class="form-control" required>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="">Parentesco de la referencia</label>
                      <input type="text" name="ref_parentezco" value="<?=$ref_parentezco;?>" class="form-control"
                        required>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="">Celular de la referencia</label>
                      <input type="number" name="ref_celular" value="<?=$ref_celular;?>" class="form-control" required>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <button type="submit" class="btn btn-success">Actualizar</button>
              <a href="<?=APP_URL;?>/admin/estudiantes" class="btn btn-secondary">Cancelar</a>
            </div>
          </div>
        </div>
      </form>

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