<?php
ob_start();
session_start();

if (!isset($_SESSION["nombres"]))
{
  header("Location: login.php");
}
else
{
require 'header.php';
if ($_SESSION['usuarios']==1){

?>

<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../../dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
</div>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Reportes</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Reportes</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- INICIO CARD LISTADO -->
      <div id="listado" class="card card-default">
        <!-- inicio Card Header -->
        <div class="card-header">
          <h3 class="card-title">Reportes por fecha y cliente</h3> 
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <!-- fin Card Header -->

        <!-- inicio Card Body -->
        <div class="card-body">
            <div class="row">
                <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <label>Fecha Inicio</label>
                    <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" value="<?php echo date("Y-m-d"); ?>">
                </div>
                <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <label>Fecha Fin</label>
                    <input type="date" class="form-control" name="fecha_fin" id="fecha_fin" value="<?php echo date("Y-m-d"); ?>">
                </div>
                <div class="form-group col-lg-6 col-md-3 col-sm-6 col-xs-12">
                    <label>Cliente</label>
                    <select class="form-control selectpicker" id="id_usuario" name="id_usuario" data-live-search="true" required></select>
                    <!--<select id="id_usuario" name="id_usuario" class="form-control select2" data-live-search="true" required>-->
                    <button class="btn btn-success" onclick="listar()">Mostrar</button>
                </div>       
            </div>
          
          <table id="registros" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Cliente</th>
                <th>Hora Inicio</th>
                <th>Hora Fin</th>
                <th>Cantidad de Horas</th>
                <th>Monto</th>
                <th>Estado</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
              <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Cliente</th>
                <th>Hora Inicio</th>
                <th>Hora Fin</th>
                <th>Cantidad de Horas</th>
                <th>Monto</th>
                <th>Estado</th>
              </tr>
            </tfoot>
          </table>
        </div>
        <!-- fin Card Body --> 
      </div>
      <!-- FIN CARD LISTADO -->
    </div>
  </section>
  <!-- Main content -->
</div>
<!-- /.content-wrapper -->
    
<?php
}

else{
  require 'no_acceso.php';
}
    require 'footer.php';
?>
<!-------------------------------------------------------------------------------------------------->
<!-- Script Usuario -->
<script src="../scripts/reportesfechacliente.js"></script>

<?php
}
ob_end_flush();
?>  
    
