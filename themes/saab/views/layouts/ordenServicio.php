<?php include("header.php"); ?>

     <!-- Page heading -->
     <div class="page-head">
       <h2 class="pull-left"><i class="icon-list-alt"></i> Orden de Servicio</h2>
       <!-- Breadcrumb -->
       <div class="bread-crumb pull-right">
        <a href="home.php"><i class="icon-home"></i> Inicio</a>
        <span class="divider">/</span> 
        <a href=""> Órdenes</a>
        <span class="divider">/</span> 
        <a href="ordenServicio.php" class="bread-current"> Orden de Servicio</a>
      </div>
      <div class="clearfix"></div>
    </div>
    <!-- Page heading ends -->
    <!-- Matter -->
    <div class="matter">
      <div class="container-fluid">
        <div class="row-fluid">
          <div class="span8 input-append">
            <input class="span4" id="appendedInputButton" type="text" placeholder="Buscar...">
            <button class="btn" type="button"><i class="icon-search"></i></button>
          </div>
        </div>
        <hr>
        <div class="row-fluid">
          <h3>Lista de Ordenes de Servicio:</h3>
          <br>
          <div class="span8 offset2">
          <table class="table table-bordered table-hover">
              <thead>
                <tr><th>N°</th><th>Oficina</th><th>Fecha</th><th>Estado</th></tr>
              </thead>
              <tbody>
                <tr class="success"><td><a href="ordenServicio2.php">35</a></td><td>Abastecimiento</td><td>12/04/2013</td><td>Aprobado</td></tr>
                <tr class="finalized"><td>22</td><td>Abastecimiento</td><td>01/04/2013</td><td>Finalizado</td></tr>
                <tr class="finalized"><td>16</td><td>Abastecimiento</td><td>01/04/2013</td><td>Finalizado</td></tr>
                <tr class="finalized"><td>15</td><td>Abastecimiento</td><td>01/04/2013</td><td>Finalizado</td></tr>
                <tr class="finalized"><td>8</td><td>Abastecimiento</td><td>01/04/2013</td><td>Finalizado</td></tr>
                <tr class="finalized"><td>4</td><td>Abastecimiento</td><td>01/04/2013</td><td>Finalizado</td></tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- Matter ends -->
  </div>
  <!-- Mainbar ends -->	    	
  
<?php include("footer.php"); ?>