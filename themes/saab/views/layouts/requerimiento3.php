<?php include("header.php"); ?>

     <!-- Page heading -->
     <div class="page-head">
       <h2 class="pull-left"><i class="icon-list-ul"></i> Requerimiento</h2>
       <!-- Breadcrumb -->
       <div class="bread-crumb pull-right">
        <a href="home.php"><i class="icon-home"></i> Inicio</a>
        <span class="divider">/</span>
        <a href=""> Pre-Orden</a>
        <span class="divider">/</span>
        <a href="requerimiento.php" class="bread-current"> Requerimiento</a>
      </div>
      <div class="clearfix"></div>
    </div>
    <!-- Page heading ends -->
    <!-- Matter -->
    <div class="matter">
      <div class="container-fluid">
        <h2 class="center">Hoja de Requerimiento</h2>
        <h3 class="center">N° 35</h3>
        <div class="row-fluid">
          <div class="span12">
            <!-- Form of previsualization of requirement begins -->
            <form class="form-horizontal">
              <div class="control-group">
                <label class="control-label" for="solicitante">Solicitante:</label>
                <div class="controls"><p>Juan Pérez</p></div>
              </div>
              <div class="control-group">
                <label class="control-label" for="dependencia">Dependencia:</label>
                <div class="controls"><p>Oficina de Administración</p></div>
              </div>
              <div class="control-group">
                <label for="unidad" class="control-label">Unidad:</label>
                <div class="controls"><p>Abastecimiento</p></div>
              </div>
              <div class="control-group">
                <table class="table table-bordered">
                  <thead>
                    <tr><th>N°</th><th>Bien</th><th>Unidad</th><th>Cantidad</th><th>Stock Actual</th><th>Stock Minimo</th><th>Diferencia a comprar</th></tr>
                  </thead>
                  <tbody>
                    <tr><td style="width: 60px">1</td><td>Hojas Bond de 75 gr.</td><td>Millares</td><td>25</td><td>20</td><td>20</td><td><input name="" id="" type="text" value="25"></td></tr>
                    <tr><td style="width: 60px">2</td><td>Lapiceros rojos.</td><td>Cajas</td><td>15</td><td>25</td><td>5</td><td><input name="" id="" type="text" value="0"></td></tr>
                    <tr><td style="width: 60px">3</td><td>Plumones para pizarra.</td><td>Decenas</td><td>3</td><td>12</td><td>4</td><td><input name="" id="" type="text" value="0"></td></tr>
                    <tr><td style="width: 60px">4</td><td>Discos regrabables.</td><td>Cuarto de ciento</td><td>20</td><td>10</td><td>10</td><td><input name="" id="" type="text" value="20"></td></tr>
                  </tbody>
                </table>
              </div>
              <div class="control-group center">
                <div class="controls">
                  <button class="btn inline disabled" type="">Autorizar Salida</button>
                </div>
              </div>
              <div class="control-group">
                <label for="observaciones" class="control-label">Utilizado en:</label>
                <div class="controls">
                  <p>Para programa xxxxxxxxxxxxxxxxxx.</p>
                </div>
              </div>
              <div class="control-group">
                <label for="presupuesto" class="control-label">Presupuesto:</label>
                <div class="controls">
                  <input type="text" id="presupuesto" placeholder="El presupuesto es...">
                </div>
              </div>
              <div class="control-group center">
                <div class="controls">
                  <button class="btn inline" type="" onClick="print();" >Guardar</button>
                </div>
              </div>
            </form>
            <!-- Form of previsualization of requirement ends -->
          </div>
        </div>
      </div>
    </div>
    <!-- Matter ends -->

<?php include("footer.php"); ?>