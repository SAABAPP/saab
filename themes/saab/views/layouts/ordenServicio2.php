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
        <h2 class="center">Orden de Servicio</h2>
        <h3 class="center">N° 26</h3>
        <div class="row-fluid">
          <div class="span12">
            <!-- Form header of service order begins -->
            <form class="form-horizontal">
              <div class="control-group pull-right">
                <label class="control-label">R.U.C.:</label>
                <div class="controls"><p>20222053154</p></div>
              </div>
              <div class="control-group">
                <label class="control-label">Señor(es):</label>
                <div class="controls"><p>Discopy Nor S.R.L.</p></div>
              </div>
              <div class="control-group pull-right">
                <label class="control-label">Teléfono:</label>
                <div class="controls"><p>282578</p></div>
              </div>
              <div class="control-group">
                <label class="control-label">Dirección:</label>
                <div class="controls"><p>Mz. "C" - Lt. 27 Urb. Arboleda</p></div>
              </div>
              <div class="control-group">
                <label class="control-label">Le agradecemos enviar a nuestro almacén en:</label>
                <div class="controls"><p>Av. América Sur N° 2870</p></div>
              </div>
              <div class="control-group">
                <label class="control-label">Lo siguiente:</label>
                <div class="controls"><p>x.x.xx.x.x blablablabla</p></div>
              </div>
              <div class="control-group">
                <label class="control-label">Referencia:</label>
                <div class="controls"><p>Utiles de escritorio</p><p>Factura xxxx</p></div>
              </div>
              <div class="control-group">
                <label class="control-label">Facturara a nombre de:</label>
                <div class="controls"><p>Dirección Regional de Educación La Libertad</p></div>
              </div>
            </form>
            <!-- Form header of service order ends -->
          </div>
        </div>
        <div class="row-fluid">
          <div class="span12">
            <!-- Form detail of service order begins -->
            <form class="form-horizontal">
              <div class="control-group">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>N°</th><th>Bien</th><th>Unidad</th><th>Cantidad</th><th>P. Unitario (S/.)</th><th>Sub Total (S/.)</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td style="width: 60px">1</td><td>Por el servicio tecnico y mantenimiento de la copiadora marca Ricoh modelo AFICIO 650</td><td></td><td>1</td><td></td><td>95</td>
                    </tr>
                    <tr>
                      <td colspan="5" style="text-align:right;">Total (S/.)<td>95</td>
                    </tr>
                  </tbody>
                </table>
                <br>
                <p class="text-right">Son: NOVENTA Y CINCO CON 00/100 NUEVOS SOLES</p>
              </div>
              <div class="control-group center">
                <div class="controls">
                  <a class="btn inline" type="submit" href="#" onClick="print();">Imprimir Orden de Servicio</a>
                </div>
              </div>
            </form>
            <!-- Form detail of service order ends -->
          </div>
        </div>
      </div>
    </div>
    <!-- Matter ends -->

<?php include("footer.php"); ?>