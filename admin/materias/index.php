<?php
/**
 * Created By VisualStudioCode
 * User: Informatica Misión Sucre
 * Date: 10/10/2024
 * Time: 7:32am
 */
include ('../../app/config.php');
include ('../../admin/layout/parte1.php');
include ('../../app/controllers/materias/listado_de_materias.php');
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- Main content -->
  <br>
  <div class="content">
    <div class="container">
      <div class="row">
        <h1>Listado de Materias</h1>
      </div>
      <br>
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-primary">
            <div class="card-header">
              <h3 class="card-title">Materias registradas</h3>
              <div class="card-tools">
                <a href="create.php" class="btn btn-primary"><i class="bi bi-plus-square"></i> Crear nueva materia</a>
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
                      <center>Materia</center>
                    </th>
                    <th>
                      <center>Estado</center>
                    </th>
                    <th>
                      <center>Acciones</center>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $contador_materias = 0;
                  foreach ($materias as $materia){
                      $id_materia = $materia['id_materia'];
                      $contador_materias = $contador_materias +1; ?>
                  <tr style="text-align: center;">
                    <td><?=$contador_materias;?></td>
                    <td><?=$materia['nombre_materia']?></td>
                    <td>
                      <?php
                            if($materia['estado']=='1') echo "ACTIVO";
                            else echo "INACTIVO";
                            ?>
                    </td>
                    <td style="text-align: center">
                      <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="show.php?id=<?=$id_materia;?>" type="button" class="btn btn-info btn-sm"><i
                            class="bi bi-eye"></i></a>
                        <a href="edit.php?id=<?=$id_materia;?>" type="button" class="btn btn-success btn-sm"><i
                            class="bi bi-pencil"></i></a>
                        <form action="<?=APP_URL;?>/app/controllers/materias/delete.php"
                          onclick="preguntar<?=$id_materia;?>(event)" method="post" id="miformulario<?=$id_materia;?>">
                          <input type="text" name="id_materia" value="<?=$id_materia;?>" hidden>
                          <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 4px 4px 0px;"><i
                              class="bi bi-trash"></i></button>
                        </form>
                        <script>
                        function preguntar<?=$id_materia;?>(event) {
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
                              var form = $('#miformulario<?=$id_materia;?>');
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
      "info": "Mostrando _START_ a _END_ de _TOTAL_ Materias",
      "infoEmpty": "Mostrando 0 a 0 de 0 Materias",
      "infoFiltered": "(Filtrado de _MAX_ total Materias)",
      "infoPostFix": "",
      "thousands": ",",
      "lengthMenu": "Mostra _MENU_ Materias",
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