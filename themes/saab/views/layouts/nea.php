<?php include("header.php"); ?>

     <!-- Page heading -->
     <div class="page-head">
       <h2 class="pull-left"><i class="icon-plus"></i> Nota Entrada Almacén</h2>

       <!-- Breadcrumb -->
       <div class="bread-crumb pull-right">
        <a href="home.php"><i class="icon-home"></i> Inicio</a>
        <span class="divider">/</span> 
        <a href="nea.php" class="bread-current"> N.E.A.</a>
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
          <div class="span4">
            <a class="btn btn-large btn-primary" href="nea2.php">Crear N.E.A.</a>
          </div>
        </div>
        <hr>
        <div class="row-fluid">
          <h3>Mis requerimientos:</h3>
          <br>
          <div class="span8 offset2">
          <table class="table table-bordered table-hover">
              <thead>
                <tr><th>N°</th><th>Procedencia</th><th>Tipo de bien</th><th>Fecha</th></tr>
              </thead>
              <tbody>
                <tr><td><a href="nea3.php">8</a></td><td>Otra emnpresa.....</td><td>Equipo de oficina.</td><td>01/04/2013</td></tr>
                <tr><td>7</td><td>Otra emnpresa.....</td><td>Equipo de transporte.</td><td>01/04/2013</td></tr>
                <tr><td>6</td><td>Otra emnpresa.....</td><td>Maquinaria y equipo.</td><td>01/04/2013</td></tr>
                <tr><td>5</td><td>Otra emnpresa.....</td><td>Gastos de operacion.</td><td>01/04/2013</td></tr>
                <tr><td>4</td><td>Otra emnpresa.....</td><td>Bienes en deposito.</td><td>01/04/2013</td></tr>
                <tr><td>3</td><td>Otra emnpresa.....</td><td>Pedidos en transito.</td><td>01/04/2013</td></tr>
                <tr><td>2</td><td>Otra emnpresa.....</td><td>Traspaso de bienes.</td><td>01/04/2013</td></tr>
                <tr><td>1</td><td>Otra emnpresa.....</td><td>Remesa de bienes.</td><td>01/04/2013</td></tr>
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