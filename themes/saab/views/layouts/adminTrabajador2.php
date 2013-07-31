<?php include("header.php"); ?>

     <!-- Page heading -->
     <div class="page-head">
       <h2 class="pull-left"><i class="icon-user"></i> Administrar Usuarios</h2>
       <!-- Breadcrumb -->
       <div class="bread-crumb pull-right">
        <a href="home.php"><i class="icon-home"></i> Inicio</a>
        <span class="divider">/</span>
        <a href="adminTrabajador.php" class="bread-current"> Administrar Trabajador</a>
      </div>
      <div class="clearfix"></div>
    </div>
    <!-- Page heading ends -->
    <!-- Matter -->
    <div class="matter">
      <div class="container-fluid">
        <h2 class="center">Nuevo Trabajador</h2>
        <div class="row-fluid">
          <div class="span12">
            <!-- Form of new worcker begins -->
            <form class="form-horizontal">
              <div class="control-group">
                <label id="control-label" class="control-label" for="nombres">Nombres:</label>
                <div class="controls">
                  <input type="text" id="nombres" placeholder="Nombres...">
                </div>
              </div>
              <div class="control-group">
                <label id="control-label" class="control-label" for="">Apellidos:</label>
                <div class="controls">
                  <input type="text" id="paterno" placeholder="Apellido paterno">
                </div>
                <br>
                <div class="controls">
                  <input type="text" id="materno" placeholder="Apellido materno">
                </div>
              </div>
              <div class="control-group">
                <label id="control-label" for="dni" class="control-label">D.N.I.:</label>
                <div class="controls">
                  <input type="text" id="dni" placeholder="N° Documento">
                </div>
              </div>
              <div class="control-group">
                <label id="control-label" for="sexo" class="control-label">Sexo:</label>
                <div class="controls">
                  <input type="radio" name="sex" style="margin-top:0px;" value="male" checked> Hombre<br>
                  <input type="radio" name="sex" style="margin-top:0px;" value="female"> Mujer
                </div>
              </div>
              <div class="control-group">
                <label id="control-label" for="direccion" class="control-label">Dirección:</label>
                <div class="controls">
                  <input type="text" id="direccion" placeholder="Dirección">
                </div>
              </div>
              <div class="control-group">
                <label id="control-label" for="telefono" class="control-label">Teléfono:</label>
                <div class="controls">
                  <input type="text" id="telefono" placeholder="Teléfono">
                </div>
              </div>
              <div class="control-group">
                <label id="control-label" for="celular" class="control-label">Celular:</label>
                <div class="controls">
                  <input type="text" id="celular" placeholder="Celular">
                </div>
              </div>
              <div class="control-group">
                <label id="control-label" for="area" class="control-label">Área:</label>
                <div class="controls">
                  <input type="text" id="area" placeholder="Área a la que pertenece">
                </div>
              </div>
              <div class="control-group">
                <label id="control-label" for="cargo" class="control-label">Cargo:</label>
                <div class="controls">
                  <input type="text" id="cargo" placeholder="Cargo que tiene">
                </div>
              </div>
              <input type="hidden" name="estado" value="Activo">
              <div class="control-group">
                <label id="control-label" for="encargado" class="control-label">Responsable:</label>
                <div class="controls">
                  <input type="text" id="encargado" placeholder="A cargo de...">
                </div>
              </div>
              <div class="control-group center">
                <div class="controls">
                  <button class="btn inline" type="submit">Guardar</button>
                  <a class="btn inline secundario" type="button" href="adminTrabajador.php">Cancelar</a>
                  <a id="showsd" class="btn inline secundario disabled">Crear usuario</a>
                </div>
              </div>
            </form>
            <!-- Form of new worcker ends -->
          </div>
          <div id="sd">
            <div class="span12">
              <h2 class="center">Nuevo usuario del sistema</h2>
              <!-- Form of new user begins -->
              <form class="form-horizontal">
                <div class="control-group">
                  <label id="control-label" class="control-label" for="usuario">Usuario:</label>
                  <div class="controls">
                    <input type="text" id="usuario" placeholder="Usuario">
                  </div>
                </div>
                <input type="hidden" name="estado" value="Activo">
                <div class="control-group">
                  <label id="control-label" for="password" class="control-label">Contraseña:</label>
                  <div class="controls">
                    <input type="text" id="password" placeholder="Contraseña">
                  </div>
                </div>
                <div class="control-group center">
                  <div class="controls">
                    <button class="btn inline" type="submit">Guardar</button>
                    <a class="btn inline secundario" type="button" href="adminTrabajador.php">Cancelar</a>
                  </div>
                </div>
              </form>
              <!-- Form of new user ends -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Matter ends -->  	
  
<?php include("footer.php"); ?>