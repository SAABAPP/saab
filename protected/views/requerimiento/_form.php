<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'requerimiento-form',
	'enableAjaxValidation'=>false,
)); ?>

	

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'REQ_estado',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'REQ_fecha',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'REQ_presupuesto',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'IDUSUARIO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'CODMETA',array('class'=>'span5','maxlength'=>4)); ?>

	<?php echo $form->textFieldRow($model,'IDCUANEC',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Guardar' : 'Actualizar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>



            <form class="form-horizontal">
              <!-- <div class="control-group">
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
              </div> -->
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
