<?php include("header.php"); ?>

     <!-- Page heading -->
     <div class="page-head">
       <h2 class="pull-left"><i class="icon-list-ul"></i> Cotización</h2>
       <!-- Breadcrumb -->
       <div class="bread-crumb pull-right">
        <a href="home.php"><i class="icon-home"></i> Inicio</a> 
        <span class="divider">/</span> 
        <a href=""> Pre-Orden</a>
        <span class="divider">/</span> 
        <a href="cotizacion.php" class="bread-current"> Cotización</a>
      </div>
      <div class="clearfix"></div>
    </div>
    <!-- Page heading ends -->
    <!-- Matter -->
    <div class="matter">
      <div class="container-fluid">
        <h2 class="center">Cotización de Requerimiento</h2>
        <h3 class="center">N° 35</h3>
        <div class="row-fluid">
          <div class="span12">
            <!-- Form header of quotation begins -->
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
              <hr>
              <h4 class="pull-right">Presupuesto: S/. xxxxxxx</h4>
              <h3>Ingresar las cotizaciones:</h3>
              <br>
              <div class="control-group">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>N°</th><th>Razón Social</th><th>R.U.C.</th><th>Monto</th><th class="button-column">Opciones</th>
                    </tr>
                    <tr class="filters">
                      <td></td><td><div class="filter-container"><input name="" id="" type="text"></div></td><td><div class="filter-container"><input name="" id="" type="text"></div></td><td><div class="filter-container"><input name="" id="" type="text"></div></td><td>&nbsp;</td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td style="width: 60px">1</td><td>Comercial Juanito</td><td>12345678901</td><td>4034.50</td><td nowrap="nowrap"><a class="update" rel="tooltip" href="#" title="Update"><i class="icon-pencil"></i></a> <a class="delete" rel="tooltip" href="#" title="Delete"><i class="icon-trash"></i></a></td>
                    </tr>
                    <tr class="success">
                      <td style="width: 60px">2</td><td>Hipermercado Tacora</td><td>23456789012</td><td>4031.49</td><td nowrap="nowrap"><a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="control-group center">
                <div class="controls">
                  <button class="btn inline disabled">Pasar a observación</button>
                  <a id="showsd" class="btn inline secundario">Detallar</a>
                </div>
              </div>
            </form>
            <!-- Form header of quotation ends -->
          </div>
        </div>
        <hr>
        <!-- Quotation detail begins -->
        <div id="sd" class="row-fluid">
          <div class="span12">
            <form class="form-horizontal">
              <div class="control-group pull-right">
                <label class="control-label" for="ruc">R.U.C.:</label>
                <div class="controls"><p>23456789012</p></div>
              </div>
              <div class="control-group">
                <label class="control-label" for="solicitante">Señor(es):</label>
                <div class="controls"><p>Hipermercado Tacora</p></div>
              </div>
            </form>
          </div>
          <form class="form-horizontal">
            <div class="control-group">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>N°</th><th>Bien</th><th>Unidad</th><th>Cantidad</th><th>P. Unitario (S/.)</th><th>Sub Total (S/.)</th><th class="button-column">Opciones</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="odd">
                    <td style="width: 60px">1</td><td>Hojas Bond de 75 gr.</td><td>Millares</td><td>25</td><td>15</td><td>325</td><td nowrap="nowrap"><a class="update" rel="tooltip" href="#" title="Update"><i class="icon-pencil"></i></a> <a class="delete" rel="tooltip" href="#" title="Delete"><i class="icon-trash"></i></a></td>
                  </tr>
                  <tr class="even">
                    <td style="width: 60px">2</td><td>Lapiceros rojos.</td><td>Cajas</td><td>15</td><td>10</td><td>150</td><td nowrap="nowrap"><a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td>
                  </tr>
                  <tr class="odd">
                    <td style="width: 60px">3</td><td>Plumones para pizarra.</td><td>Decenas</td><td>3</td><td>12</td><td>36</td><td nowrap="nowrap"><a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td>
                  </tr>
                  <tr class="even">
                    <td style="width: 60px">4</td><td>Discos regrabables.</td><td>Cuarto de ciento</td><td>20</td><td><input type="text"></td><td></td><td nowrap="nowrap"><a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="control-group">
              <label for="observaciones" class="control-label">Observaciones:</label>
              <div class="controls">
                <textarea id="observaciones" rows="4"></textarea>
              </div>
            </div>
            <div class="control-group center">
              <div class="controls">
                  <a class="btn inline secundario" href="ordenCompra2.php" onClick="print();">Imprimir Acta de Otorgamiento y Generar Orden de Compra</a>
              </div>
            </div>
          </form>
        </div>
        <!-- Quotation detail ends -->
      </div>
    </div>
    <!-- Matter ends -->

<?php include("footer.php"); ?>