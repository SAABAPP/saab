<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
$this->breadcrumbs=array(
	'',
);
?>
    <!-- Matter -->
    <div class="matter">
      <div class="container-fluid">

          <div class="row-fluid">
            <div class="span12">
              <?php if (Yii::app()->user->checkAccess("usuario")) {
                
               ?>
              <!-- Usuario General-->
              <div class="widget">                        
                <div class="widget-content">
                  <div class="padd">
                    <div id="">
                      <h3>Bienvenido, <small><?=$usuario->iDPERSONAL->PER_nombres?> <?=$usuario->iDPERSONAL->PER_paterno?></small> </h3>
                      <h5>Oficina: <small><?=$usuario->iDPERSONAL->iDAREA->ARE_nombre?></small> </h5>
                      
                      <br><br>
                      <div class="row-fluid text-center">
                        <div class="span3">
                          <a class="hdata" href="<?php echo Yii::app()->request->baseUrl; ?>/usuario/update/<?=$usuario->IDUSUARIO?>">
                            <i class="icon-user icon-manten"></i> 
                            <p>Modificar mis Datos y Contraseña</p>
                          </a>
                        </div>
                        <div class="span3">
                          <a class="hdata" href="<?php echo Yii::app()->request->baseUrl; ?>/requerimiento/create">
                            <i class="icon-list-ul bblue"></i> 
                            <p>Crear un Requerimiento de Bien</p>
                          </a>
                        </div>
                        <div class="span3">
                          <a class="hdata" href="<?php echo Yii::app()->request->baseUrl; ?>/requerimiento/servicio">
                            <i class="icon-list-ul bgreen"></i> 
                            <p>Crear un Requerimiento de Servicio</p>
                          </a>
                        </div>
                        <div class="span3">
                          <a class="hdata" href="<?php echo Yii::app()->request->baseUrl; ?>/site/logout">
                            <i class="icon-off bred"></i> 
                            <p>Cerrar Sesion</p>
                          </a>
                        </div>
                      </div>
                      <br><br>
                      
                    </div>                    

                  </div>
                </div>
              </div>
              <?php } ?>
              
              <?php if (Yii::app()->user->checkAccess("abastecimiento")) {
                
               ?>
              <!-- Usuario Abastecimiento Gerente-->
              <div class="widget">                        
                <div class="widget-content">
                  <div class="padd">
                    <div id="">
                      
                      <br><br>
                      <div class="row-fluid text-center">
                        <div class="span4">
                          <a class="hdata" href="<?php echo Yii::app()->request->baseUrl; ?>/requerimiento">
                            <i class="icon-money icon-manten"></i> 
                            <p>Asignar Presupuesto a Requerimientos</p>
                          </a>
                        </div>
                        <div class="span4">
                          <a class="hdata" href="<?php echo Yii::app()->request->baseUrl; ?>/cotizacion">
                            <i class="icon-list-ul icon-manten"></i> 
                            <p>Cotizar Requerimiento</p>
                          </a>
                        </div>
                        <div class="span4">
                          <a class="hdata" href="<?php echo Yii::app()->request->baseUrl; ?>/cuaNec/admin">
                            <i class="icon-table icon-manten"></i> 
                            <p>Cuadro de Necesidades Actual</p>
                          </a>
                        </div>
                      </div>
                      <br><br>
                      <div class="row-fluid text-center">
                        <div class="span4">
                          <a class="hdata" href="<?php echo Yii::app()->request->baseUrl; ?>/kardex">
                            <i class="icon-file icon-manten"></i> 
                            <p>Mostar Kardex</p>
                          </a>
                        </div>
                        <div class="span4">
                          <a class="hdata" href="<?php echo Yii::app()->request->baseUrl; ?>/reportes">
                            <i class="icon-bar-chart icon-manten"></i> 
                            <p>Generar Reportes</p>
                          </a>
                        </div>
                        
                        <div class="span4">
                          <a class="hdata" href="<?php echo Yii::app()->request->baseUrl; ?>/site/logout">
                            <i class="icon-off bred"></i> 
                            <p>Salir</p>
                          </a>
                        </div>
                      </div>
                      <br><br>
                      
                    </div>                    

                  </div>
                </div>
              </div>
              <?php } ?>

              <?php if (Yii::app()->user->checkAccess("almacen")) {
                
               ?>
              <!-- Usuario Abastecimiento Gerente-->
              <div class="widget">                        
                <div class="widget-content">
                  <div class="padd">
                    <div id="">
                      
                      <br><br>
                      <div class="row-fluid text-center">
                        <div class="span4">
                          <a class="hdata" href="<?php echo Yii::app()->request->baseUrl; ?>/pecosa/admin">
                            <i class="icon-arrow-up icon-manten"></i> 
                            <p>Registrar Salida</p>
                          </a>
                        </div>
                        <div class="span4">
                          <a class="hdata" href="<?php echo Yii::app()->request->baseUrl; ?>/entrada">
                            <i class="icon-arrow-down icon-manten"></i> 
                            <p>Registrar Entrada</p>
                          </a>
                        </div>
                        <div class="span4">
                          <a class="hdata" href="<?php echo Yii::app()->request->baseUrl; ?>/requerimiento/autorizacion">
                            <i class="icon-share icon-manten"></i> 
                            <p>Autorizar Salida de Requerimiento</p>
                          </a>
                        </div>
                      </div>
                      <br><br>
                      <div class="row-fluid text-center">
                        <div class="span4">
                          <a class="hdata" href="<?php echo Yii::app()->request->baseUrl; ?>/pecosa">
                            <i class="icon-columns icon-manten"></i> 
                            <p>Ver Pecosa</p>
                          </a>
                        </div>
                        <div class="span4">
                          <a class="hdata" href="<?php echo Yii::app()->request->baseUrl; ?>/kardex">
                            <i class="icon-file icon-manten"></i> 
                            <p>Mostrar Kardex</p>
                          </a>
                        </div>
                        <div class="span4">
                          <a class="hdata" href="<?php echo Yii::app()->request->baseUrl; ?>/site/logout">
                            <i class="icon-off bred"></i> 
                            <p>Cerrar Sesion</p>
                          </a>
                        </div>
                      </div>
                      <br><br>
                      
                    </div>                    

                  </div>
                </div>
              </div>
              <?php } ?>


              <?php if (Yii::app()->user->checkAccess("administrador")) {
                
               ?>
              <div class="widget">                         
                <div class="widget-content">
                  <div class="padd">
                    <h3>Mantenedores del Sistema</h3>
                    <br><br>
                    <div class="row-fluid text-center">
                      <div class="span4">
                        <a class="hdata" href="<?php echo Yii::app()->request->baseUrl; ?>/bien">
                            <i class="icon-book icon-manten"></i> 
                            <p>Administrar Bienes</p>
                        </a>
                      </div>
                      <div class="span4">
                        <a class="hdata" href="<?php echo Yii::app()->request->baseUrl; ?>/personal">
                            <i class="icon-group icon-manten"></i> 
                            <p>Administrar Personal</p>
                        </a>
                      </div>
                      <div class="span4">
                        <a class="hdata" href="<?php echo Yii::app()->request->baseUrl; ?>/proveedor">
                            <i class="icon-truck icon-manten"></i> 
                            <p>Administrar Proveedor</p>
                        </a>
                      </div>
                    </div>
                    <br>
                    <div class="row-fluid text-center">
                      <div class="span4">
                        <a class="hdata" href="<?php echo Yii::app()->request->baseUrl; ?>/variables">
                            <i class="icon-desktop icon-manten"></i> 
                            <p>Administrar Variables</p>
                        </a>
                      </div>
                      <div class="span4">
                        <a class="hdata" href="<?php echo Yii::app()->request->baseUrl; ?>/meta">
                            <i class="icon-tags icon-manten"></i> 
                            <p>Administrar Metas</p>
                        </a>
                      </div>
                      <div class="span4">
                        <a class="hdata" href="<?php echo Yii::app()->request->baseUrl; ?>/area">
                            <i class="icon-building icon-manten"></i> 
                            <p>Administrar Areas</p>
                        </a>
                      </div>
                    </div>
                    <br><br>
                  </div>


                  </div>
                </div>
              </div>
              <?php } ?>
            </div>
          </div>

        </div>	






