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
        <div class="row-fluid">
          <div class="span12">
            <!-- Form of requirement begins -->
            <form class="form-horizontal">
              <div class="control-group">
                <label id="control-label" class="control-label" for="solicitante">Solicitante:</label>
                <div class="controls">
                  <input type="text" id="solicitante" placeholder="Su nombre...">
                </div>
              </div>
              <div class="control-group">
                <label id="control-label" class="control-label" for="dependencia">Dependencia:</label>
                <div class="controls">
                  <input type="text" id="dependencia" placeholder="Dependencia a la que pertenece...">
                </div>
              </div>
              <div class="control-group">
                <label id="control-label" for="unidad" class="control-label">Unidad:</label>
                <div class="controls">
                  <input type="text" id="unidad" placeholder="Unidad a la que pertenece...">
                </div>
              </div>
              <div class="control-group">
                <label id="control-label" for="clasificador" class="control-label">Clasificador:</label>
                <div class="controls">
                  <input type="text" id="clasificador" placeholder="A que clasificador pertenece...">
                </div>
              </div>
              <div class="control-group">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>N°</th><th>Bien</th><th>Marca</th><th>Característica</th><th>Unidad</th><th>Cantidad</th><th class="button-column">Opciones</th>
                    </tr>
                    <tr>
                      <td></td><td><div class="filter-container"><input name="" id="" type="text"></div></td><td><div class="filter-container"><input name="" id="" type="text"></div></td><td><div class="filter-container"><input name="" id="" type="text"></div></td><td></td><td><div class="filter-container"><input name="" id="" type="text" style="width:40px;"></div></td><td></td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="odd">
                      <td style="width: 60px">1</td><td>PAPEL BOND 80 g TAMAÑO A4.</td><td>Kerocopy</td><td>Blanco</td><td>Millares</td><td>25</td><td nowrap="nowrap"><a class="update" rel="tooltip" href="#" title="Update"><i class="icon-pencil"></i></a> <a class="delete" rel="tooltip" href="#" title="Delete"><i class="icon-trash"></i></a></td>
                    </tr>
                    <tr class="even">
                      <td style="width: 60px">2</td><td>BOLIGRAFO (LAPICERO) DE TINTA SECA PUNTA FINA.</td><td>Pilot</td><td>Negro</td><td>Cajas</td><td>15</td><td nowrap="nowrap"><a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td>
                    </tr>
                    <tr class="odd">
                      <td style="width: 60px">3</td><td>PLUMON DE TINTA INDELEBLE PUNTA FINA.</td><td>Artesco</td><td>Rojo</td><td>Decenas</td><td>3</td><td nowrap="nowrap"><a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td>
                    </tr>
                    <tr class="even">
                      <td style="width: 60px">4</td><td>CD REGRABABLE DE 700 MB.</td><td>Sony</td><td></td><td>Cuarto de ciento</td><td>20</td><td nowrap="nowrap"><a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="control-group">
                <label for="observaciones" class="control-label">Utilizado en:</label>
                <div class="controls">
                  <input type="text" name="observaciones" placeholder="Lista de metas....">
                </div>
              </div>
              <div class="control-group center">
                <div class="controls">
                  <button class="btn inline" type="submit">Guardar</button>
                  <a class="btn inline secundario" type="button" href="requerimiento.php">Cancelar</a>
                </div>
              </div>
            </form>
            <!-- Form of requirement ends -->
          </div>
        </div>
      </div>
    </div>
    <!-- Matter ends -->
    
<?php include("footer.php"); ?>