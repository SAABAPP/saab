
     <!-- Page heading -->
     <div class="page-head">
       <h2 class="pull-left"><i class="icon-home"></i> Inicio</h2>

       <!-- Breadcrumb -->
       <div class="bread-crumb pull-right">
        <a href="home.php"><i class="icon-home"></i> Inicio</a>
      </div>

      <div class="clearfix"></div>
    </div>
    <!-- Page heading ends -->

    <!-- Matter -->
    <div class="matter">
      <div class="container-fluid">

          <div class="row-fluid">
            <div class="span12">

              <!-- Bar Chart -->
              <div class="widget">

                <div class="widget-head">
                  <div class="pull-left">Gráfico de barras</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="icon-remove"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>             


                <div class="widget-content">
                  <div class="padd">
                    <!-- Barchart. jQuery Flot plugin used. -->
                    <div id="bar-chart"></div>

                    <hr />

                    <!--Bar chart stuffs -->
                    <div class="btn-group stackControls">
                        <input type="button" value="Con Stock" class="btn">
                        <input type="button" value="Sin Stock" class="btn">
                    </div>            

                    <div class="btn-group graphControls">

                        <input type="button" value="Barras" class="btn">
                        <input type="button" value="Lineas" class="btn">
                        <input type="button" value="Lineas con paso" class="btn">
                    </div>

                  </div>
                </div>

              </div>
              <!-- Bar chart ends -->

              <!-- Realtime chart starts -->

                <div class="widget">

                <div class="widget-head">
                  <div class="pull-left">Gráfico en tiempo real</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="icon-remove"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>             

                  <div class="widget-content ">
                    <div class="padd">

                      <div id="live-chart"></div>
                      <hr />
                      <div class="input-append">
                        <label>Intervalo de tiempo: </label><input id="updateInterval" type="text" class="span3" value="">
                        <span class="add-on">ms</span>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Realtime chart ends -->

                <!-- Pie chart starts -->

                <div class="widget">

                <div class="widget-head">
                  <div class="pull-left">Pie Chart</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="icon-remove"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>

                  <div class="widget-content">
                    <div class="padd">

                      <div class="row-fluid">
                        <div class="span4">
                          <div id="pie-chart"></div>
                        </div>
                        <div class="span4">
                          <div id="pie-chart2"></div>
                        </div>
                        <div class="span4">
                          <div id="pie-chart3"></div>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
                <!-- Pie chart ends -->

            </div>
          </div>

        </div>	
  