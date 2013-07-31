<?php include("header.php"); ?>

     <!-- Page heading -->
     <div class="page-head">
       <h2 class="pull-left"><i class="icon-arrow-up"></i> Registro de Salida</h2>

       <!-- Breadcrumb -->
       <div class="bread-crumb pull-right">
        <a href="home.php"><i class="icon-home"></i> Inicio</a>
        <span class="divider">/</span> 
        <a href=""> Movimientos</a>
        <span class="divider">/</span> 
        <a href="regSalida.php" class="bread-current"> Registro de Salida</a>
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
          <!-- <div class="span4">
            <a class="btn btn-large btn-primary" href="#">Crear registro de salida</a>
          </div> -->
        </div>
        <hr>
        <div class="row-fluid">
          <h3>Lista de Pedidos en Almacén:</h3>
          <br>
          <div class="span8 offset2">
          <table class="table table-bordered table-hover">
              <thead>
                <tr><th>N°</th><th>Oficina</th><th>Fecha</th><th>Estado</th></tr>
              </thead>
              <tbody>
                <tr class="warehouse"><td><a href="regSalida2.php">35</a></td><td>Abastecimiento</td><td>12/04/2013</td><td>En almacen</td></tr>
                <tr class="finalized"><td>30</td><td>Abastecimiento</td><td>01/04/2013</td><td>Finalizado</td></tr>
                <tr class="finalized"><td>29</td><td>Abastecimiento</td><td>01/04/2013</td><td>Finalizado</td></tr>
                <tr class="finalized"><td>28</td><td>Abastecimiento</td><td>01/04/2013</td><td>Finalizado</td></tr>
                <tr class="finalized"><td>27</td><td>Abastecimiento</td><td>01/04/2013</td><td>Finalizado</td></tr>
                <tr class="finalized"><td>26</td><td>Abastecimiento</td><td>01/04/2013</td><td>Finalizado</td></tr>
                <tr class="finalized"><td>25</td><td>Abastecimiento</td><td>01/04/2013</td><td>Finalizado</td></tr>
                <tr class="finalized"><td>24</td><td>Abastecimiento</td><td>01/04/2013</td><td>Finalizado</td></tr>
                <tr class="finalized"><td>23</td><td>Abastecimiento</td><td>01/04/2013</td><td>Finalizado</td></tr>
                <tr class="finalized"><td>21</td><td>Abastecimiento</td><td>01/04/2013</td><td>Finalizado</td></tr>
                <tr class="finalized"><td>20</td><td>Abastecimiento</td><td>01/04/2013</td><td>Finalizado</td></tr>
                <tr class="finalized"><td>19</td><td>Abastecimiento</td><td>01/04/2013</td><td>Finalizado</td></tr>
                <tr class="finalized"><td>18</td><td>Abastecimiento</td><td>01/04/2013</td><td>Finalizado</td></tr>
                <tr class="finalized"><td>17</td><td>Abastecimiento</td><td>01/04/2013</td><td>Finalizado</td></tr>
                <tr class="finalized"><td>14</td><td>Abastecimiento</td><td>01/04/2013</td><td>Finalizado</td></tr>
                <tr class="finalized"><td>13</td><td>Abastecimiento</td><td>01/04/2013</td><td>Finalizado</td></tr>
                <tr class="finalized"><td>12</td><td>Abastecimiento</td><td>01/04/2013</td><td>Finalizado</td></tr>
                <tr class="finalized"><td>11</td><td>Abastecimiento</td><td>01/04/2013</td><td>Finalizado</td></tr>
                <tr class="finalized"><td>10</td><td>Abastecimiento</td><td>01/04/2013</td><td>Finalizado</td></tr>
                <tr class="finalized"><td>9</td><td>Abastecimiento</td><td>01/04/2013</td><td>Finalizado</td></tr>
                <tr class="finalized"><td>7</td><td>Abastecimiento</td><td>01/04/2013</td><td>Finalizado</td></tr>
                <tr class="finalized"><td>6</td><td>Abastecimiento</td><td>01/04/2013</td><td>Finalizado</td></tr>
                <tr class="finalized"><td>5</td><td>Abastecimiento</td><td>01/04/2013</td><td>Finalizado</td></tr>
                <tr class="finalized"><td>3</td><td>Abastecimiento</td><td>01/04/2013</td><td>Finalizado</td></tr>
                <tr class="finalized"><td>2</td><td>Abastecimiento</td><td>01/04/2013</td><td>Finalizado</td></tr>
                <tr class="finalized"><td>1</td><td>Abastecimiento</td><td>01/04/2013</td><td>Finalizado</td></tr>
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