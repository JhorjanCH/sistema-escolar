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
include ('../../app/controllers/pagos/datos_pago_estudiante.php');
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- Main content -->
  <br>
  <div class="content">
    <div class="container">
      <div class="row">
        <h1>PAGO DE CUOTAS</h1>
      </div>
      <div class="row">
        <h5>
          <b>Estudiante: </b><?=$apellidos." ".$nombres;?><br>
          <b>Cédula de identidad: </b><?=$ci;?>
        </h5>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="card card-outline card-primary">
            <div class="card-header">
              <h3 class="card-title">Pagos registrados</h3>
              <div style="text-align: right;">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                  <i class="bi bi-cash"></i> Registrar pago
                </button>
              </div>
            </div>
            <div class="card-body">
              <table class="table table-striped table-bordered table-sm table-hovers">
                <tr style="text-align: center;">
                  <th style="background-color: cyan;">Nro</th>
                  <th style="background-color: cyan;">Mes pagado</th>
                  <th style="background-color: cyan;">Monto</th>
                  <th style="background-color: cyan;">Fecha de pago</th>
                  <th style="background-color: cyan;">Acciones</th>
                </tr>
                <?php
                    $contador = 0;
                    foreach ($pagos as $pago){
                        $estudiante_id = $pago['estudiante_id'];
                        $id_pago = $pago['id_pago']; ?>
                <tr style="text-align: center;">
                  <td><?=$contador = $contador +1;?></td>
                  <td><?=$pago['mes_pagado'];?></td>
                  <td>Bs. <?=$pago['monto_pagado'];?></td>
                  <td><?=$pago['fecha_pago'];?></td>
                  <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                      <a type="button" data-toggle="modal" data-target="#Modal_editar<?=$id_pago;?>"
                        class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></a>
                      <!-- Modal -->
                      <div class="modal fade" id="Modal_editar<?=$id_pago;?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header" style="background-color: limegreen;">
                              <h5 class="modal-title" id="exampleModalLabel">Editar pago</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="<?=APP_URL;?>/app/controllers/pagos/update.php" method="post">
                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <input type="text" name="estudiante_id" value="<?=$id_estudiante;?>" hidden>
                                      <input type="text" name="id_pago" value="<?=$id_pago;?>" hidden>
                                      <label for="">Estudiante</label>
                                      <input type="text" class="form-control" value="<?=$apellidos." ".$nombres;?>"
                                        disabled>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label for="">Cédula de indentidad</label>
                                      <input type="text" class="form-control" value="<?=$ci;?>" disabled>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label for="">Mes pagado</label>
                                      <select name="mes_pagado" id="" class="form-control">
                                        <option value="Enero" <?=$pago['mes_pagado']== "Enero" ? 'selected' : ''?>>Enero
                                        </option>
                                        <option value="Febrero" <?=$pago['mes_pagado']== "Febrero" ? 'selected' : ''?>>
                                          Febrero</option>
                                        <option value="Marzo" <?=$pago['mes_pagado']== "Marzo" ? 'selected' : ''?>>Marzo
                                        </option>
                                        <option value="Abril" <?=$pago['mes_pagado']== "Abril" ? 'selected' : ''?>>Abril
                                        </option>
                                        <option value="Mayo" <?=$pago['mes_pagado']== "Mayo" ? 'selected' : ''?>>Mayo
                                        </option>
                                        <option value="Junio" <?=$pago['mes_pagado']== "Junio" ? 'selected' : ''?>>Junio
                                        </option>
                                        <option value="Julio" <?=$pago['mes_pagado']== "Julio" ? 'selected' : ''?>>Julio
                                        </option>
                                        <option value="Agosto" <?=$pago['mes_pagado']== "Agosto" ? 'selected' : ''?>>
                                          Agosto</option>
                                        <option value="Septiembre"
                                          <?=$pago['mes_pagado']== "Septiembre" ? 'selected' : ''?>>Septiembre</option>
                                        <option value="Octubre" <?=$pago['mes_pagado']== "Octubre" ? 'selected' : ''?>>
                                          Octubre</option>
                                        <option value="Noviembre"
                                          <?=$pago['mes_pagado']== "Noviembre" ? 'selected' : ''?>>Noviembre</option>
                                        <option value="Diciembre"
                                          <?=$pago['mes_pagado']== "Diciembre" ? 'selected' : ''?>>Diciembre</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label for="">Monto</label>
                                      <input type="text" name="monto_pagado" class="form-control"
                                        value="<?=$pago['monto_pagado'];?>">
                                    </div>
                                  </div>
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label for="">Fecha de pago</label>
                                      <input type="date" name="fecha_pago" value="<?=$pago['fecha_pago'];?>"
                                        class="form-control">
                                    </div>
                                  </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Volver</button>
                              <button type="submit" class="btn btn-success">Actualizar</button>
                            </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <form action="<?=APP_URL;?>/app/controllers/pagos/delete.php"
                        onclick="preguntar<?=$id_pago;?>(event)" method="post" id="miformulario<?=$id_pago;?>">
                        <input type="text" name="id_pago" value="<?=$id_pago;?>" hidden>
                        <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 0px 0px 0px;"><i
                            class="bi bi-trash"></i></button>
                      </form>
                      <script>
                      function preguntar<?=$id_pago;?>(event) {
                        event.preventDefault();
                        Swal.fire({
                          title: 'Eliminar registro',
                          text: '¿Desea eliminar este registro?',
                          icon: 'question',
                          showDenyButton: true,
                          confirmButtonText: 'Eliminar',
                          confirmButtonColor: '#fa1717',
                          denyButtonColor: '#969696',
                          denyButtonText: 'Cancelar',
                        }).then((result) => {
                          if (result.isConfirmed) {
                            var form = $('#miformulario<?=$id_pago;?>');
                            form.submit();
                            // swal.fire('Eliminado', 'Se elimino el registro', 'success');
                          }
                        });
                      }
                      </script>
                      <a href="comprobante_pago.php?id=<?=$id_pago;?>&&id_estudiante=<?=$estudiante_id;?>" type="button"
                        class="btn btn-warning btn-sm"><i class="bi bi-printer"></i></a>
                    </div>
                  </td>
                </tr>
                <?php
                    }
                    ?>
              </table>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: cyan;">
        <h5 class="modal-title" id="exampleModalLabel">Registro de pago</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?=APP_URL;?>/app/controllers/pagos/create.php" method="post">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <input type="text" name="estudiante_id" value="<?=$id_estudiante;?>" hidden>
                <label for="">Estudiante</label>
                <input type="text" class="form-control" value="<?=$apellidos." ".$nombres;?>" disabled>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="">Cédula de indentidad</label>
                <input type="text" class="form-control" value="<?=$ci;?>" disabled>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="">Mes pagado</label>
                <select name="mes_pagado" id="" class="form-control">
                  <option value="Enero">Enero</option>
                  <option value="Febrero">Febrero</option>
                  <option value="Marzo">Marzo</option>
                  <option value="Abril">Abril</option>
                  <option value="Mayo">Mayo</option>
                  <option value="Junio">Junio</option>
                  <option value="Julio">Julio</option>
                  <option value="Agosto">Agosto</option>
                  <option value="Septiembre">Septiembre</option>
                  <option value="Octubre">Octubre</option>
                  <option value="Noviembre">Noviembre</option>
                  <option value="Diciembre">Diciembre</option>
                </select>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="">Monto</label>
                <input type="text" name="monto_pagado" class="form-control" value="0">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="">Fecha de pago</label>
                <input type="date" name="fecha_pago" class="form-control">
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Registrar</button>
      </div>
      </form>
    </div>
  </div>
</div>