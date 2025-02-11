<?php
/**
 * Created By VisualStudioCode
 * User: Informatica Misión Sucre
 * Date: 10/10/2024
 * Time: 7:32am
 */
include ('../../app/config.php');
include ('../../admin/layout/parte1.php');
include ('../../app/controllers/roles/listado_de_roles.php');
include ('../../app/controllers/roles/listado_de_permisos.php');
include ('../../app/controllers/roles/listado_de_roles_permisos.php');
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- Main content -->
  <br>
  <div class="content">
    <div class="container">
      <div class="row">
        <h1>Listado de Cargos</h1>
      </div>
      <br>
      <div class="row">
        <div class="col-md-8">
          <div class="card card-outline card-primary">
            <div class="card-header">
              <h3 class="card-title">Cargos registrados</h3>
              <div class="card-tools">
                <a href="create.php" class="btn btn-primary"><i class="bi bi-plus-square"></i> Crear nuevo cargo</a>
              </div>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                <thead>
                  <tr>
                    <th>
                      <center>Nro</center>
                    </th>
                    <th>
                      <center>Nombre del Cargo</center>
                    </th>
                    <th>
                      <center>Acciones</center>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $contador_rol = 0;
                  foreach ($roles as $role){
                      $id_rol = $role['id_rol'];
                      $contador_rol = $contador_rol +1; ?>
                  <tr>
                    <td style="text-align: center"><?=$contador_rol;?></td>
                    <td><?=$role['nombre_rol']?></td>
                    <td style="text-align: center">
                      <div class="btn-group" role="group" aria-label="Basic example">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                          data-target="#moda_asignacion<?=$id_rol;?>">
                          <i class="bi bi-check-circle"></i>
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="moda_asignacion<?=$id_rol;?>" tabindex="-1"
                          aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <div class="modal-header" style="background-color: #fad138;">
                                <h5 class="modal-title" id="exampleModalLabel">Asignación de Cargos</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-md-3">
                                    <input type="text" name="rol_id" id="rol_id<?=$id_rol;?>" value="<?=$id_rol;?>"
                                      hidden>
                                    <label>Cargo: <?=$role['nombre_rol'];?></label>
                                  </div>
                                  <div class="col-md-6">
                                    <select name="permiso_id" id="permiso_id<?=$id_rol;?>" class="form-control">
                                      <?php
                                                foreach ($permisos as $permiso){
                                                    $id_permiso = $permiso['id_permiso']; ?>
                                      <option value="<?=$id_permiso;?>"><?=$permiso['nombre_url'];?></option>
                                      <?php
                                                }
                                              ?>
                                    </select>
                                  </div>
                                  <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary mb-2"
                                      id="btn_reg<?=$id_rol;?>">Asignar</button>
                                  </div>
                                  <script>
                                  $('#btn_reg<?=$id_rol;?>').click(function() {
                                    var a = $('#rol_id<?=$id_rol;?>').val();
                                    var b = $('#permiso_id<?=$id_rol;?>').val();
                                    //alert(a+"-"+b);

                                    var url = "../../app/controllers/roles/create_roles_permisos.php";
                                    $.get(url, {
                                      rol_id: a,
                                      permiso_id: b
                                    }, function(datos) {
                                      $('#respuesta<?=$id_rol;?>').html(datos);
                                      $('#tabla<?=$id_rol;?>').css('display', 'none');
                                      //alert("mando los datos");
                                      Swal.fire({
                                        position: "top",
                                        icon: "success",
                                        title: "Se asigno permiso correctamente",
                                        showConfirmButton: false,
                                        timer: 2500
                                      });

                                    });
                                  });
                                  </script>
                                </div>
                                <hr>
                                <div id="respuesta<?=$id_rol;?>"></div>
                                <div class="row" id="tabla<?=$id_rol;?>">
                                  <table class="table table-bordered table-sm table-striped table-hovers">
                                    <tr>
                                      <th style="text-align: center;background-color: #fad138;">Nro</th>
                                      <th style="text-align: center;background-color: #fad138;">Cargo</th>
                                      <th style="text-align: center;background-color: #fad138;">Permiso</th>
                                      <th style="text-align: center;background-color: #fad138;">Acción</th>
                                    </tr>
                                    <?php
                                              $contador = 0;
                                              foreach ($roles_permisos as $roles_permiso){
                                                if ($id_rol == $roles_permiso['id_rol']) {                                                     
                                                    $id_rol_permiso = $roles_permiso['id_rol_permiso'];
                                                    $contador = $contador +1; ?>
                                    <tr>
                                      <td>
                                        <center><?=$contador;?></center>
                                      </td>
                                      <td>
                                        <center><?=$roles_permiso['nombre_rol'];?></center>
                                      </td>
                                      <td>
                                        <center><?=$roles_permiso['nombre_url'];?></center>
                                      </td>
                                      <td>
                                        <form action="<?=APP_URL;?>/app/controllers/roles/delete_rol_permiso.php"
                                          onclick="preguntar<?=$id_rol_permiso;?>(event)" method="post"
                                          id="miformulario<?=$id_rol_permiso;?>">
                                          <input type="text" name="id_rol_permiso" value="<?=$id_rol_permiso;?>" hidden>
                                          <button type="submit" class="btn btn-danger btn-sm"><i
                                              class="bi bi-trash"></i></button>
                                        </form>
                                        <script>
                                        function preguntar<?=$id_rol_permiso;?>(event) {
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
                                              var form = $('#miformulario<?=$id_rol_permiso;?>');
                                              form.submit();
                                              // swal.fire('Eliminado', 'Se elimino el registro', 'success');
                                            }
                                          });
                                        }
                                        </script>
                                      </td>
                                    </tr>
                                    <?php  
                                                  }  
                                                }
                                                ?>
                                  </table>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <a href="show.php?id=<?=$id_rol;?>" type="button" class="btn btn-info btn-sm"><i
                            class="bi bi-eye"></i></a>
                        <a href="edit.php?id=<?=$id_rol;?>" type="button" class="btn btn-success btn-sm"><i
                            class="bi bi-pencil"></i></a>
                        <form action="<?=APP_URL;?>/app/controllers/roles/delete.php"
                          onclick="preguntar<?=$id_rol;?>(event)" method="post" id="miformulario<?=$id_rol;?>">
                          <input type="text" name="id_rol" value="<?=$id_rol;?>" hidden>
                          <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 4px 4px 0px;"><i
                              class="bi bi-trash"></i></button>
                        </form>
                        <script>
                        function preguntar<?=$id_rol;?>(event) {
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
                              var form = $('#miformulario<?=$id_rol;?>');
                              form.submit();
                              // swal.fire('Eliminado', 'Se elimino el registro', 'success');
                            }
                          });
                        }
                        </script>
                      </div>
                    </td>
                  </tr>
                  <?php
                  }
                  ?>
                </tbody>
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

<script>
$(function() {
  $("#example1").DataTable({
    "pageLength": 5,
    "language": {
      "emptyTable": "No hay información",
      "info": "Mostrando _START_ a _END_ de _TOTAL_ Cargos",
      "infoEmpty": "Mostrando 0 a 0 de 0 Cargos",
      "infoFiltered": "(Filtrado de _MAX_ total Cargos)",
      "infoPostFix": "",
      "thousands": ",",
      "lengthMenu": "Mostra _MENU_ Cargos",
      "loadingRecords": "Cargando...",
      "processing": "Procesando...",
      "search": "Buscador:",
      "zeroRecords": "Sin resultados encontrados",
      "paginate": {
        "first": "Primero",
        "last": "Ultimo",
        "next": "Siguiente",
        "previous": "Anterior"
      }
    },
    "responsive": true,
    "lengthChange": true,
    "autoWidth": false,
    buttons: [{
        extend: 'collection',
        text: 'Reportes',
        orientation: 'landscape',
        buttons: [{
          text: 'Copiar',
          extend: 'copy'
        }, {
          extend: 'pdf'
        }, {
          extend: 'csv'
        }, {
          extend: 'excel'
        }, {
          text: 'Imprimir',
          extend: 'print',
        }]
      },
      {
        extend: 'colvis',
        text: 'Visor de  columnas',
        collectionLayout: 'fixed three-column'
      }
    ],
  }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)')
});
</script>