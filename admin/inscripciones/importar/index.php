<?php
/**
 * Created By VisualStudioCode
 * User: Informatica Misión Sucre
 * Date: 10/10/2024
 * Time: 7:32am
 */
include ('../../../app/config.php');
include ('../../../admin/layout/parte1.php');
?>

<script src="xlsx.full.min.js"></script>
<script src="jquery-3.6.0.min.js"></script>
<script language="JavaScript">
$(function() {
  // File input element
  var oFileIn = document.getElementById('my_file_input');
  if (oFileIn.addEventListener) {
    oFileIn.addEventListener('change', filePicked, false);
  }
});

// Function to handle file selection
function filePicked(oEvent) {
  var oFile = oEvent.target.files[0];
  if (!oFile) {
    alert('No file selected!');
    return;
  }

  var reader = new FileReader();

  // On file load
  reader.onload = function(e) {
    var data = new Uint8Array(e.target.result); // Use ArrayBuffer for modern APIs
    var workbook = XLSX.read(data, {
      type: 'array'
    });

    // Iterate over each sheet
    workbook.SheetNames.forEach(function(sheetName) {
      var sheet = workbook.Sheets[sheetName];
      var jsonData = XLSX.utils.sheet_to_json(sheet, {
        header: 1
      }); // Convert to JSON array

      // Build table rows
      var tableRows = '';
      jsonData.forEach(function(row) {
        tableRows += '<tr>';
        row.forEach(function(cell) {
          tableRows += '<td>' + (cell || '') + '</td>'; // Fill empty cells
        });
        tableRows += '</tr>';
      });

      // Append rows to the table
      $('#my_file_output').append(tableRows);
    });

    // Hide import button/image
    $('#imgImport').css('display', 'none');
  };

  // Read file as ArrayBuffer
  reader.readAsArrayBuffer(oFile);
}
</script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- Main content -->
  <br>
  <div class="content">
    <div class="container">
      <div class="row">
        <h1>Importar estudiantes</h1>
      </div>
      <br>
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-primary">
            <div class="card-header">
              <h3 class="card-title">Datos de los estudiantes</h3>
              <div class="card-tools">
                <a href="PLANTILLA_IMPORTAR_ESTUDIANTES.xls" class="btn btn-success"><i class="bi bi-download"></i>
                  Descargar plantilla</a>
              </div>
            </div>
            <div class="card-body">
              <input type="file" id="my_file_input" class="form-control" />
              <div id="imgImport">
                <br>
                <center>

                </center>
              </div>
              <br>
              <div class="table table-responsive">
                <table id="my_file_output" border="" class="table table-bordered table-condensed table-striped">
                </table>
              </div>
              <button id="btn_lectura" class="btn btn-info">Registrar estudiantes</button>
              <a href="" class="btn btn-default">Cancelar</a>
              <p id="respuesta">

              </p>
              <p id="contador">

              </p>
            </div>
          </div>
        </div>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>

</div>
<!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>
$('#btn_lectura').click(function() {
  valores = new Array();
  var contador = 0;
  $('#my_file_output').each(function() {

    var d1 = $(this).find('td').eq(0).html();
    var d2 = $(this).find('td').eq(1).html();
    var d3 = $(this).find('td').eq(2).html();
    var d4 = $(this).find('td').eq(3).html();
    var d5 = $(this).find('td').eq(4).html();
    var d6 = $(this).find('td').eq(5).html();
    var d7 = $(this).find('td').eq(6).html();
    var d8 = $(this).find('td').eq(7).html();
    var d9 = $(this).find('td').eq(8).html();
    var d10 = $(this).find('td').eq(9).html();
    var d11 = $(this).find('td').eq(10).html();
    var d12 = $(this).find('td').eq(11).html();
    var d13 = $(this).find('td').eq(12).html();
    var d14 = $(this).find('td').eq(13).html();
    var d15 = $(this).find('td').eq(14).html();
    var d16 = $(this).find('td').eq(15).html();
    var d17 = $(this).find('td').eq(16).html();
    var d18 = $(this).find('td').eq(17).html();


    valor = new Array(d1, d2, d3, d4, d5, d6, d7, d8, d9, d10, d11, d12, d13, d14, d15, d16, d17, d18)
    valores.push(valor);
    console.log(valor);
    //alert("valor");
    $.post('insertar.php', {
      d1: d1,
      d2: d2,
      d3: d3,
      d4: d4,
      d5: d5,
      d6: d6,
      d7: d7,
      d8: d8,
      d9: d9,
      d10: d10,
      d11: d11,
      d12: d12,
      d13: d13,
      d14: d14,
      d15: d15,
      d16: d16,
      d17: d17,
      d18: d18
    }, function(datos) {
      $('#respuesta').html(datos);
      contador = contador + 1;
      $('#contador').html("Se registro " + contador + " registros correctamente.");
    });

  });
  //alert("hola");
});
</script>

<?php

include ('../../../admin/layout/parte2.php');
include ('../../../layout/mensajes.php');

?>