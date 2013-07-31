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
        <h2 class="center">Nota de Entrada a Almacén</h2>
        <div class="row-fluid">
          <div class="span12">
            <!-- Form of requirement begins -->
            <form class="form-horizontal">
              <div class="control-group">
                <label id="control-label" class="control-label" for="procedencia">Procedencia:</label>
                <div class="controls">
                  <input type="text" id="procedencia" placeholder="Empresa...">
                </div>
              </div>
              <div class="control-group">
                <label id="control-label" class="control-label" for="destino">Con destino a:</label>
                <div class="controls">
                  <input type="text" id="destino" placeholder="Con destino a...">
                </div>
              </div>
              <div class="control-group">
              <div class="control-group">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>N°</th><th>Detalle</th><th>Unidad</th><th>Cantidad</th><th>P. Unitario (S/.)</th><th>Sub-Total (S/.)</th><th class="button-column">Opciones</th>
                    </tr>
                    <tr class="filters">
                      <td></td><td><div class="filter-container"><input name="" id="" type="text"></div></td><td></td><td><div class="filter-container"><input name="" id="" type="text"></div></td><td><div class="filter-container"><input name="" id="" type="text"style="width:50px;"></div></td><td><div class="filter-container"><input name="" id="" type="text" style="width:50px;"></div></td><td>&nbsp;</td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td style="width: 60px">1</td><td>Cuaderno de Trab. Matemática 1° Prim</td><td>Unidad</td><td>10</td><td>6.4493</td><td>64.49</td><td nowrap="nowrap"><a class="update" rel="tooltip" href="#" title="Update"><i class="icon-pencil"></i></a> <a class="delete" rel="tooltip" href="#" title="Delete"><i class="icon-trash"></i></a></td>
                    </tr>
                    <tr>
                      <td style="width: 60px">2</td><td>Cuaderno de Trab. Matemática 2° Prim</td><td>Unidad</td><td>10</td><td>6.4493</td><td>64.49</td><td nowrap="nowrap"><a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="control-group">
                <label for="tipobien" class="control-label">Tipo de bien:</label>
                <div class="controls">
                  <table class="tipobien">
                    <tr>
                      <td><input class="checkb" type="checkbox" name="oficina" id="oficina"><label class="checkl" for="oficina"> Equipo de oficina</label></td>
                      <td><input class="checkt" type="text"></td>
                      <td><input class="checkb" type="checkbox" name="deposito" id="deposito"><label class="checkl" for="deposito"> Bienes en depósito</label></td>
                      <td><input class="checkt" type="text"></td>
                    </tr>
                    <tr>
                      <td><input class="checkb" type="checkbox" name="transporte" id="transporte"><label class="checkl" for="transporte"> Equipo de transporte</label></td>
                      <td><input class="checkt" type="text"></td>
                      <td><input class="checkb" type="checkbox" name="transito" id="transito"><label class="checkl" for="transito"> Pedidos en tránsito</label></td>
                      <td><input class="checkt" type="text"></td>
                    </tr>
                    <tr>
                      <td><input class="checkb" type="checkbox" name="maquinaria" id="maquinaria"><label class="checkl" for="maquinaria"> Maquinaria y equipo</label></td>
                      <td><input class="checkt" type="text"></td>
                      <td><input class="checkb" type="checkbox" name="traspaso" id="traspaso"><label class="checkl" for="traspaso"> Traspaso de bienes</label></td>
                      <td><input class="checkt" type="text"></td>
                    </tr>
                    <tr>
                      <td><input class="checkb" type="checkbox" name="operacion" id="operacion"><label class="checkl" for="operacion"> Gastos de operacion</label></td>
                      <td><input class="checkt" type="text"></td>
                      <td><input class="checkb" type="checkbox" name="remesa" id="remesa"><label class="checkl" for="remesa"> Remesa de bienes</label></td>
                      <td><input class="checkt" type="text"></td>
                    </tr>
                  </table>
                </div>
              </div>
              <div class="control-group center">
                <div class="controls">
                  <button class="btn inline" type="submit">Guardar</button>
                  <a class="btn inline secundario" type="button" href="nea.php">Cancelar</a>
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