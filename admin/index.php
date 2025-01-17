<?php
/**
 * Created By VisualStudioCode
 * User: Informatica Misión Sucre
 * Date: 10/10/2024
 * Time: 7:32am
 */
include ('../app/config.php');
include ('../admin/layout/parte1.php');
include ('../app/controllers/roles/listado_de_roles.php');
include ('../app/controllers/usuarios/listado_de_usuarios.php');
include ('../app/controllers/niveles/listado_de_niveles.php');
include ('../app/controllers/grados/listado_de_grados.php');
include ('../app/controllers/materias/listado_de_materias.php');
include ('../app/controllers/administrativos/listado_de_administrativos.php');
include ('../app/controllers/docentes/listado_de_docentes.php');
include ('../app/controllers/estudiantes/listado_de_estudiantes.php');
include ('../app/controllers/estudiantes/reporte_estudiantes.php');
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <!-- Main content -->
    <br>
    <div class="container">
      <div class="container">
        <div class="row">
          <h1><?=APP_NAME;?></h1>
        </div>
        <br>

        <!-- vista para el estudiante -->
        <?php
        if ($rol_sesion_usuario == "ESTUDIANTE"){
              foreach ($estudiantes as $estudiante) {
                if ($email_sesion == $estudiante['email']) {
                      $id_estudiante = $estudiante['id_estudiante'];
                      $nivel = $estudiante['nivel'];
                      $turno = $estudiante['turno'];
                      $curso = $estudiante['curso'];
                      $seccion = $estudiante['seccion'];
                }
              }
            ?>
            <div class="row">
              <div class="col-md-6">
                  <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Datos del estudiante</h3>
                      <div class="card-tools">
                      </div>
                    </div>
                    <div class="card-body">
                      <table class="table table-sm table-hover table-striped table-bordered">
                        <tr>
                          <td><b>Nombre y Apellidos:</b></td>
                          <td><?=$nombres_sesion_usuario." ".$apellidos_sesion_usuario;?></td>
                        </tr>
                        <tr>
                          <td><b>Cédula de Identidad:</b></td>
                          <td><?=$ci_sesion_usuario;?></td>
                        </tr>
                        <tr>
                          <td><b>Nivel:</b></td>
                          <td><?=$nivel;?></td>
                        </tr>
                        <tr>
                          <td><b>Turno:</b></td>
                          <td><?=$turno;?></td>
                        </tr>
                        <tr>
                          <td><b>Grado:</b></td>
                          <td><?=$curso;?></td>
                        </tr>
                        <tr>
                          <td><b>Sección:</b></td>
                          <td><?=$seccion;?></td>
                        </tr>
                      </table>
                    </div>
                </div>
              </div>
                  <div class="col-md-3 col-sm-6 col-12">
                      <div class="info-box">
                              <span class="info-box-icon bg-primary"><i class="bi bi-hospital"></i></i></span>
                          <div class="info-box-content">
                              <span class="info-box-text"><b>Reportes de Kardex</b></span>
                              <a href="<?=APP_URL;?>admin/kardex/reporte_estudiante.php?id_estudiante=<?=$id_estudiante;?>" class="btn btn-primary btn-sm">Ingresar</a>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-3 col-sm-6 col-12">
                      <div class="info-box">
                              <span class="info-box-icon bg-info"><i class="bi bi-calendar-range"></i></i></span>
                          <div class="info-box-content">
                              <span class="info-box-text"><b>Calificaciones</b></span>
                              <a href="<?=APP_URL;?>admin/calificaciones/reporte_estudiante.php?id_estudiante=<?=$id_estudiante;?>" class="btn btn-info btn-sm">Ingresar</a>
                          </div>
                      </div>
                  </div>
            </div>
        <?php
        }else  if ($rol_sesion_usuario == "DOCENTE"){
                foreach ($docentes as $docente) {
                  if ($email_sesion == $docente['email']) {
                        $nombre_rol = $docente['nombre_rol'];
                        $profesion = $docente['profesion'];
                        $especialidad = $docente['especialidad'];
                      }
                    }
                  ?>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Datos del docente</h3>
                          <div class="card-tools">
                          </div>
                        </div>
                        <div class="card-body">
                          <table class="table table-sm table-hover table-striped table-bordered">
                            <tr>
                              <td><b>Nombre y Apellidos:</b></td>
                              <td><?=$nombres_sesion_usuario." ".$apellidos_sesion_usuario;?></td>
                            </tr>
                            <tr>
                              <td><b>Profesión:</b></td>
                              <td><?=$profesion;?></td>
                            </tr>
                            <tr>
                              <td><b>Cargo:</b></td>
                              <td><?=$nombre_rol;?></td>
                            </tr>
                            <tr>
                              <td><b>Especialidad:</b></td>
                              <td><?=$especialidad;?></td>
                            </tr>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
          <?php
          }else {
            $sql_datos = "SELECT * FROM usuarios AS usu
                  INNER JOIN roles AS rol ON rol.id_rol = usu.rol_id 
                  INNER JOIN personas AS per ON per.usuario_id = usu.id_usuario 
                  WHERE usu.estado = '1' and usu.email = '$email_sesion' ";
            $query_datos = $pdo->prepare($sql_datos);
            $query_datos->execute();
            $datos = $query_datos->fetchAll(PDO::FETCH_ASSOC);
            foreach ($datos as $dato) {
               $nombre_rol = $dato['nombre_rol'];
            }
            ?>
              <div class="row">
                    <div class="col-md-6">
                      <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Datos del usuario</h3>
                          <div class="card-tools">
                          </div>
                        </div>
                        <div class="card-body">
                          <table class="table table-sm table-hover table-striped table-bordered">
                            <tr>
                              <td><b>Nombre y Apellidos:</b></td>
                              <td><?=$nombres_sesion_usuario." ".$apellidos_sesion_usuario;?></td>
                            <tr>
                              <td><b>Cargo:</b></td>
                              <td><?=$nombre_rol;?></td>
                            </tr>
                          </table>
                        </div>
                      </div>
                    </div>
              </div>
            <?php 
          }
        ?>

        <!-- vista para el administrador -->
        <?php
        if ($rol_sesion_usuario == "ADMINISTRADOR"){ ?>
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
              <div class="inner">
                    <?php
                    $contador_roles = 0;
                    foreach($roles as $role) {
                        $contador_roles = $contador_roles +1;
                    }

                    ?>
                <h3><?=$contador_roles?></h3>
                  <p>Cargos registrados</p>
              </div>
                <div class="icon">
                  <i class="fas"><i class="bi bi-bookmarks"></i></i>
                </div>
                  <a href="<?=APP_URL;?>/admin/roles" class="small-box-footer">
                    Más Información <i class="fas fa-arrow-circle-right"></i>
                  </a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                    <?php
                    $contador_usuarios = 0;
                    foreach($usuarios as $usuario) {
                        $contador_usuarios = $contador_usuarios +1;
                    }

                    ?>
                <h3><?=$contador_usuarios?></h3>
                  <p>Usuarios registrados</p>
              </div>
                <div class="icon">
                  <i class="fas"><i class="bi bi-people-fill"></i></i>
                </div>
                  <a href="<?=APP_URL;?>/admin/usuarios" class="small-box-footer">
                    Más Información <i class="fas fa-arrow-circle-right"></i>
                  </a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                    <?php
                    $contador_niveles = 0;
                    foreach($niveles as $nivele) {
                        $contador_niveles = $contador_niveles +1;
                    }

                    ?>
                <h3><?=$contador_niveles?></h3>
                  <p>Niveles registrados</p>
              </div>
                <div class="icon">
                  <i class="fas"><i class="bi bi-bookshelf"></i></i>
                </div>
                  <a href="<?=APP_URL;?>/admin/niveles" class="small-box-footer">
                    Más Información <i class="fas fa-arrow-circle-right"></i>
                  </a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                    <?php
                    $contador_grados = 0;
                    foreach($grados as $grado) {
                        $contador_grados = $contador_grados +1;
                    }

                    ?>
                <h3><?=$contador_grados?></h3>
                  <p>Grados registrados</p>
              </div>
                <div class="icon">
                  <i class="fas"><i class="bi bi-bar-chart-steps"></i></i>
                </div>
                  <a href="<?=APP_URL;?>/admin/grados" class="small-box-footer">
                    Más Información <i class="fas fa-arrow-circle-right"></i>
                  </a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                    <?php
                    $contador_materias = 0;
                    foreach($materias as $materia) {
                        $contador_materias = $contador_materias +1;
                    }

                    ?>
                <h3><?=$contador_materias?></h3>
                  <p>Materias registradas</p>
              </div>
                <div class="icon">
                  <i class="fas"><i class="bi bi-book-half"></i></i>
                </div>
                  <a href="<?=APP_URL;?>/admin/materias" class="small-box-footer">
                    Más Información <i class="fas fa-arrow-circle-right"></i>
                  </a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-dark">
              <div class="inner">
                    <?php
                    $contador_administrativos = 0;
                    foreach($administrativos as $administrativo) {
                        $contador_administrativos = $contador_administrativos +1;
                    }

                    ?>
                <h3><?=$contador_administrativos?></h3>
                  <p>Administrativos registrados</p>
              </div>
                <div class="icon">
                  <i class="fas"><i class="bi bi-person-lines-fill"></i></i>
                </div>
                  <a href="<?=APP_URL;?>/admin/administrativos" class="small-box-footer">
                    Más Información <i class="fas fa-arrow-circle-right"></i>
                  </a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-default">
              <div class="inner">
                    <?php
                    $contador_docentes = 0;
                    foreach($docentes as $docente) {
                        $contador_docentes = $contador_docentes +1;
                    }

                    ?>
                <h3><?=$contador_docentes?></h3>
                  <p>Docentes registrados</p>
              </div>
                <div class="icon">
                  <i class="fas"><i class="bi bi-person-video3"></i></i>
                </div>
                  <a href="<?=APP_URL;?>/admin/docentes" class="small-box-footer">
                    Más Información <i class="fas fa-arrow-circle-right"></i>
                  </a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-secondary">
              <div class="inner">
                    <?php
                    $contador_estudiantes = 0;
                    foreach($estudiantes as $estudiante) {
                        $contador_estudiantes = $contador_estudiantes +1;
                    }

                    ?>
                <h3><?=$contador_estudiantes?></h3>
                  <p>Estudiantes registrados</p>
              </div>
                <div class="icon">
                  <i class="fas"><i class="bi bi-person-video"></i></i>
                </div>
                  <a href="<?=APP_URL;?>/admin/estudiantes" class="small-box-footer">
                    Más Información <i class="fas fa-arrow-circle-right"></i>
                  </a>
            </div>
          </div>

        </div>

        <hr>

        <div class="row">
             <div class="col-md-6">
                <div class="card card-outline card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Datos de los estudiantes</h3>
                  </div>
                  <div class="card-body">
                    <div>
                      <canvas id="myChart"></canvas>
                    </div>            
                  </div>
                </div>    
                <?php
                $contador = 0;
                $contador_inicial1 = 0;
                $contador_inicial2 = 0;
                $contador_inicial3 = 0;
                $contador_primaria1 = 0;
                $contador_primaria2 = 0;
                $contador_primaria3 = 0;
                $contador_primaria4 = 0;
                $contador_primaria5 = 0;
                $contador_primaria6 = 0;
                $contador_basica1 = 0;
                $contador_basica2 = 0;
                $contador_basica3 = 0;
                $contador_diversificado1 = 0;
                $contador_diversificado2 = 0;
                foreach ($reportes_estudiantes as $reportes_estudiante) {
                     if ($reportes_estudiante['grado_id']=="1") $contador_inicial1 = $contador_inicial1 + 1;
                     if ($reportes_estudiante['grado_id']=="2") $contador_inicial2 = $contador_inicial2 + 1;
                     if ($reportes_estudiante['grado_id']=="3") $contador_inicial3 = $contador_inicial3 + 1;
                     if ($reportes_estudiante['grado_id']=="4") $contador_primaria1 = $contador_primaria1 + 1;
                     if ($reportes_estudiante['grado_id']=="5") $contador_primaria2 = $contador_primaria2 + 1;
                     if ($reportes_estudiante['grado_id']=="6") $contador_primaria3 = $contador_primaria3 + 1;
                     if ($reportes_estudiante['grado_id']=="7") $contador_primaria4 = $contador_primaria4 + 1;
                     if ($reportes_estudiante['grado_id']=="8") $contador_primaria5 = $contador_primaria5 + 1;
                     if ($reportes_estudiante['grado_id']=="9") $contador_primaria6 = $contador_primaria6 + 1;
                     if ($reportes_estudiante['grado_id']=="10") $contador_basica1 = $contador_basica1 + 1;
                     if ($reportes_estudiante['grado_id']=="11") $contador_basica2 = $contador_basica2 + 1;
                     if ($reportes_estudiante['grado_id']=="12") $contador_basica3 = $contador_basica3 + 1;
                     if ($reportes_estudiante['grado_id']=="13") $contador_diversificado4 = $contador_diversificado4 + 1;
                     if ($reportes_estudiante['grado_id']=="14") $contador_diversificado5 = $contador_diversificado5 + 1; 
                    }
                $dato_reportes_estudiantes = $contador_inicial1.",".$contador_inicial2.",".$contador_inicial3.","
                                            .$contador_primaria1.",".$contador_primaria2.",".$contador_primaria3.","
                                            .$contador_primaria2.",".$contador_primaria4.",".$contador_primaria5.","
                                            .$contador_primaria6.",".$contador_basica1.",".$contador_basica2.","
                                            .$contador_basica3.",".$contador_diversificado2.",".$contador_diversificado2;
                ?>
                <script>
                    var grados = ['1er°', '2do°', '3er°','4to°', '5to°', '6to°',
                                 '1er - Año', '2do - Año', '3er - Año', '3er - Año',
                                 '4to - Año', '5to - Año'];
                    var datos =[<?=$dato_reportes_estudiantes;?>];
                    const ctx = document.getElementById('myChart');
                    new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: grados,
                            datasets: [{
                                  label: 'Estudiantes por grados',
                                  data: datos,
                                  borderWidth: 1
                            }]
                        },
                        options: {
                              scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    })
                </script>
             </div>
             <div class="col-md-6">
             <div class="card card-outline card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Estudiantes inscritos por meses</h3>
                  </div>
                  <div class="card-body">
                    <div>
                      <canvas id="myChart2"></canvas>
                    </div>            
                  </div>
                </div>
                <?php
                $enero = 0; $febrero = 0; $marzo = 0; $abril = 0; $mayo = 0; $junio = 0;
                $julio = 0; $agosto = 0; $septiembre = 0; $octubre = 0; $noviembre = 0; $diciembre = 0;
                foreach ($reportes_estudiantes as $reportes_estudiante) {
                    $fecha = $reportes_estudiante['fyh_creacion'];
                    $fecha = strtotime($fecha);
                    $mes = date("m",$fecha);
                    if ($mes == "01") $enero = $enero +1;
                    if ($mes == "02") $febrero = $febrero +1;
                    if ($mes == "03") $marzo = $marzo +1;
                    if ($mes == "04") $abril = $abril +1;
                    if ($mes == "05") $mayo = $mayo +1;
                    if ($mes == "06") $junio = $junio +1;
                    if ($mes == "07") $julio = $julio +1;
                    if ($mes == "08") $agosto = $agosto +1;
                    if ($mes == "09") $septiembre = $septiembre +1;
                    if ($mes == "10") $octubre = $octubre +1;
                    if ($mes == "11") $noviembre = $noviembre +1;
                    if ($mes == "12") $diciembre = $diciembre +1;
                }
                $reporte_meses = $enero.",".$febrero.",".$marzo.",".$abril.",".$mayo.",".$junio.",".$julio.",".$agosto.",".$septiembre.",".$octubre.",".$noviembre.",".$diciembre;       
                ?>    
                <script>
                    var meses = ['Enero', 'Febrero', 'Marzo','Abril', 'Mayo', 'Junio',
                                 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
                    var datos =[<?=$reporte_meses;?>];
                    const ctx2 = document.getElementById('myChart2');
                    new Chart(ctx2, {
                        type: 'bar',
                        data: {
                            labels: meses,
                            datasets: [{
                                  label: 'Inscritos por meses',
                                  data: datos,
                                  borderWidth: 1
                            }]
                        },
                        options: {
                              scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    })
                </script>
             </div>
        </div>       
        <hr>
        <div class="row">
             <div class="col-6 col-md-3 text-center">
                  <div class="card card-outline card-primary">
                       <div class="card-header">
                        <h3 class="card-title">Estudiantes inscritos</h3>
                       </div>
                      <div class="card-body">
                        <input type="text" class="knob" value="<?=$contador_estudiantes;?>" data-min="0" data-max="200"
                              data-readonly="true" data-thickness="0.1"
                              data-width="100" data-height="100" data-fgColor="#fe2f02" disabled >  
                      </div>
                  </div>                 
             </div>
             <div class="col-6 col-md-3 text-center">
                  <div class="card card-outline card-primary">
                       <div class="card-header">
                        <h3 class="card-title">Personal docentes</h3>
                       </div>
                      <div class="card-body">
                        <input type="text" class="knob" value="<?=$contador_docentes;?>" data-min="0" data-max="30"
                              data-readonly="true" data-thickness="0.1"
                              data-width="100" data-height="100" data-fgColor="#021dfe" disabled >  
                      </div>
                  </div>                 
             </div>
             <div class="col-6 col-md-3 text-center">
                  <div class="card card-outline card-primary">
                       <div class="card-header">
                        <h3 class="card-title">Personal administrativos</h3>
                       </div>
                      <div class="card-body">
                        <input type="text" class="knob" value="<?=$contador_administrativos;?>" data-min="0" data-max="30"
                              data-readonly="true" data-thickness="0.1"
                              data-width="100" data-height="100" data-fgColor="#19fe02" disabled >  
                      </div>
                  </div>                 
             </div>
             <div class="col-6 col-md-3 text-center">
                  <div class="card card-outline card-primary">
                       <div class="card-header">
                        <h3 class="card-title">Usuarios</h3>
                       </div>
                      <div class="card-body">
                        <input type="text" class="knob" value="<?=$contador_usuarios;?>" data-min="0" data-max="500"
                              data-readonly="true" data-thickness="0.1"
                              data-width="100" data-height="100" data-fgColor="#fe02fe" disabled >  
                      </div>
                  </div>                 
             </div>
        </div>
        <?php
        }
        ?>
        <!-- vista para el administrador -->
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
include ('../admin/layout/parte2.php');
include ('../layout/mensajes.php');
?>

<script>
    $(function () {
        $('.knob').knob({
            draw: function () {
                if (this.$.data('skin') == 'tron') {
                    var a   = this.angle(this.cv)  // Angle
                        ,
                        sa  = this.startAngle          // Previous start angle
                        ,
                        sat = this.startAngle         // Start angle
                        ,
                        ea                            // Previous end angle
                        ,
                        eat = sat + a                 // End angle
                        ,
                        r   = true

                    this.g.lineWidth = this.lineWidth

                    this.o.cursor
                    && (sat = eat - 0.3)
                    && (eat = eat + 0.3)

                    if (this.o.displayPrevious) {
                        ea = this.startAngle + this.angle(this.value)
                        this.o.cursor
                        && (sa = ea - 0.3)
                        && (ea = ea + 0.3)
                        this.g.beginPath()
                        this.g.strokeStyle = this.previousColor
                        this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false)
                        this.g.stroke()
                    }

                    this.g.beginPath()
                    this.g.strokeStyle = r ? this.o.fgColor : this.fgColor
                    this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false)
                    this.g.stroke()

                    this.g.lineWidth = 2
                    this.g.beginPath()
                    this.g.strokeStyle = this.o.fgColor
                    this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false)
                    this.g.stroke()

                    return false
                }
            }
        })
    });
</script>