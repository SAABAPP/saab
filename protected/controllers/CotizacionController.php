<?php
error_reporting(E_ALL ^ E_NOTICE);
class CotizacionController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
	public $cotizaciones=array();
	public $cotizacionmenor=array();

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl',
			);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',
				'actions'=>array('index','admin','create','view','update'),
				'expression'=>'Yii::app()->user->checkAccess("abastecimiento")',
				),
			array('allow',
				'actions'=>array('index','admin','create','view','update'),
				'expression'=>'Yii::app()->user->checkAccess("administrador")',
				),
			array('allow', 
				'actions'=>array('buscaProveedor','addCotizacion','details','removeCotizacion','busqueda','analizar','asignarBuenaPro','grabar'),
				'users'=>array('*'),
				),
			array('deny',
				'users'=>array('*'),
				),
			);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$cotizado= Yii::app()->db->createCommand()
		->select('count(*) as cont')
		->from('cotizacion C')
		->join('requerimiento R', 'R.IDREQUERIMIENTO=C.IDREQUERIMIENTO')
		->where('R.IDREQUERIMIENTO=:id', array(':id'=>$id))
		->queryRow();

		switch ($cotizado['cont']) {
			case 0:
			throw new CHttpException(403,'El requerimiento no tiene cotizaciones.');
			break;
			default:
			$model=Cotizacion::model()->findByAttributes(array('IDREQUERIMIENTO'=>$id));
			$cotizacion=new Cotizacion();
			$cotizacion->unsetAttributes();
			$cotizacion->IDREQUERIMIENTO=$model->IDREQUERIMIENTO;
			$dataProvider=$cotizacion->search();
			$this->render('view',array(
				'model'=>$model,
				'dataProvider'=>$dataProvider,
				)
			);
			break;
		}
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($id)
	{
		
			
			$model=new Cotizacion;
			$requerimiento=Requerimiento::model()->findByPk($id);
			$proveedor=new Proveedor('search');
			$requerimiento_bien = new RequerimientoBien();
			$requerimiento_bien->unsetAttributes();
			$requerimiento_bien->IDREQUERIMIENTO = $id;
			Yii::app()->setGlobalState('requerimientoID', $id);
			$temporal=array();

			if(!empty($_POST['precioUnitario'])){				
				$this->cotizaciones=Yii::app()->getGlobalState('arrays');
				$ordenCompra=new ordenCompra;
				$ordenCompra->TIPO='c';
				$ordenCompra->IDREQUERIMIENTO=$id;
				if (!$ordenCompra->save()) {
					Yii::app()->user->setFlash('info', '<strong>Oh Nooo!</strong> No se pudo guardar la Orden');
				}
				else{
					$x=0;
					$cantidad=0;

					foreach($_POST['precioUnitario'] as $precio){
						$temporal[0][$x]=$precio;
						$x++;													
					}
					$x=0;
					foreach($_POST['marca'] as $marca){
						$temporal[1][$x]=$marca;
						$x++;														
					}
					$x=0;
					foreach ($_POST['caracteristica']  as $caracteristica) {
						$temporal[2][$x]=$caracteristica;
						$x++;						
					}
					$x=0;
					$cantidad=0;
					$Criteria_RB = new CDbCriteria();
					$Criteria_RB->condition = "IDREQUERIMIENTO = $id";
					$detalleRB=RequerimientoBien::model()->findAll($Criteria_RB);
					foreach ($detalleRB as $value) {
						$temporal[3][$x]=$value->IDBIEN;
						$temporal[4][$x]=$value->RBI_cantidadComprar;
						$x++;
						$cantidad++;
					}
					// print_r($temporal);
					// echo 'cantidad'.$cantidad;
					for($i=0;$i<$cantidad;$i++){
						$detalleOC=new DetalleOrdenCompra;						
						$detalleOC->IDORDENCOMPRA=$ordenCompra->IDORDENCOMPRA;						
						$detalleOC->DOC_precioUnitario=$temporal[0][$i];
						$detalleOC->DOC_marca=$temporal[1][$i];;
						$detalleOC->DOC_caracteristica=$temporal[2][$i];						
						$detalleOC->DOC_bien=$temporal[3][$i];
						$detalleOC->DOC_cantidad=$temporal[4][$i];
						if(!$detalleOC->save()){
							Yii::app()->user->setFlash('warning', '<strong>Oh Nooo!</strong> No se pudo guardar las detalle Orden Compra');
						}
					}

					for($i=0;$i<count($this->cotizaciones);$i++){
						$cotizacion=new Cotizacion;
						$cotizacion->COT_buenaPro=$this->cotizaciones[$i][4];
						$cotizacion->COT_total=$this->cotizaciones[$i][2];
						$cotizacion->IDREQUERIMIENTO=$id;
						$cotizacion->IDPROVEEDOR=$this->cotizaciones[$i][0];
						if(!$cotizacion->save()){
							Yii::app()->user->setFlash('error', '<strong>Oh Nooo!</strong> No se pudo guardar las cotizaciones');
						}

					}
					Yii::app()->user->setFlash('success', '<strong>Bien!</strong> se ha generado todo correctamente');
					$this->redirect(array('admin'));					
				}

					
			}
			else{
				Yii::app()->user->setFlash('warning', '<strong>Atencion!</strong> debe ingresar los precios unitarios');
			}

			
			$this->render('create',array(
				'model'=>$model,
				'requerimiento'=>$requerimiento,
				'proveedor'=>$proveedor,
				'requerimiento_bien'=>$requerimiento_bien,
				)
			);
			
		
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Cotizacion']))
		{
			$model->attributes=$_POST['Cotizacion'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->IDCOTIZACION));
		}

		$this->render('update',array(
			'model'=>$model,
			));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Cotizacion');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		Yii::app()->setGlobalState('indiceCotizacion', 0);
		Yii::app()->clearGlobalState('requerimientoID');
		Yii::app()->clearGlobalState('arrays');
		Yii::app()->clearGlobalState('detalleOC');
		Yii::app()->clearGlobalState('cantidadCotizaciones');
		Yii::app()->clearGlobalState('montoBajo');

		$model=new Requerimiento('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Requerimiento']))
			$model->attributes=$_GET['Requerimiento'];

		$this->render('admin',array(
			'model'=>$model,
			));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Cotizacion::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function actionBuscaProveedor()
	{
		$q=trim($_GET['term']);

		if (isset($q)) {
			$condicion = new CDbCriteria;
			$condicion->condition = "PRO_razonSocial LIKE '%". $q ."%' order by PRO_razonSocial";
			$condicion->limit = 10; ; 
			$proveedor=  Proveedor::model()->findAll($condicion);

			if (!empty($proveedor)) {
				$returnVal = '';
				$salida = array();
				foreach ($proveedor as $p) {
					$salida[] = array(
						'label'=>$p->PRO_razonSocial,
						'razonSocial' => $p->PRO_razonSocial,  
						'ruc' => $p->PRO_ruc,
                     	'idProveedor' => $p->IDPROVEEDOR, // return value from autocomplete
                     	);
				}
				echo CJSON::encode($salida);
				Yii::app()->end();
			}
		}
	}

	public function actionAddCotizacion()
	{
		$cantidad=Yii::app()->getGlobalState('cantidadCotizaciones');
		$montobajo=Yii::app()->getGlobalState('montoBajo');
		if ($cantidad<3) {
			try {
				$idProveedor= $_POST['idProveedor'];
				$ruc= $_POST['ruc'];
				$monto= $_POST['monto'];
				$razonSocial= $_POST['razonSocial'];

				if (is_numeric($monto)) {
					$i=Yii::app()->getGlobalState('indiceCotizacion');

					$this->cotizaciones=Yii::app()->getGlobalState('arrays');

					if($i==0){
						$this->cotizaciones[$i][0]=$idProveedor;
						$this->cotizaciones[$i][1]=$ruc;
						$this->cotizaciones[$i][2]=$monto;
						$this->cotizaciones[$i][3]=$razonSocial;
						Yii::app()->setGlobalState('arrays', $this->cotizaciones);
					}else{
						$this->cotizaciones[$i][0]=$idProveedor;
						$this->cotizaciones[$i][1]=$ruc;
						$this->cotizaciones[$i][2]=$monto;
						$this->cotizaciones[$i][3]=$razonSocial;
						Yii::app()->setGlobalState('arrays', $this->cotizaciones);
					}

					++$i;
					Yii::app()->setGlobalState('cantidadCotizaciones', ++$cantidad);
					Yii::app()->setGlobalState('indiceCotizacion', $i);
					$montobajo=$this->evaluarMenor();
					Yii::app()->setGlobalState('montoBajo', $montobajo);
					$this->asignarBuenaPro();
				} else {
					echo "<script>alert('El monto debe ser un numero.');</script>";
				}
				
				$this->actionDetails();
   				// echo "<script>alert('".Yii::app()->getGlobalState('cantidadCotizaciones')."');</script>";
			} catch (Exception $ex) {
				throw $ex;
			}
		} else {
			echo "<script>alert('No se pueden agregar mas de 3 cotizaciones.\\nSi desea agregar otra cotizacion borre una de las ingresadas.');</script>";
			$this->actionDetails();
		}
	}


	public function actionDetails()
	{
		$this->renderPartial('_details');
	}

	public function actionRemoveCotizacion()
	{
		$ruc= $_POST['ruc'];
		$fila=-1;
		$fila=$this->busqueda($ruc);
		$this->cotizaciones=Yii::app()->getGlobalState('arrays');
		$cantidad=Yii::app()->getGlobalState('cantidadCotizaciones');
		unset($this->cotizaciones[$fila][0]);
		unset($this->cotizaciones[$fila][1]);
		unset($this->cotizaciones[$fila][2]);
		unset($this->cotizaciones[$fila][3]);
		$this->cotizaciones = array_values($this->cotizaciones);
		Yii::app()->setGlobalState('arrays', $this->cotizaciones);
		Yii::app()->setGlobalState('cantidadCotizaciones', --$cantidad);
		$this->actionDetails();
	}

	public function busqueda($ruc)
	{
		$this->cotizaciones=Yii::app()->getGlobalState('arrays');
		for($i=0;$i<count($this->cotizaciones); $i++){
			if(stristr($this->cotizaciones[$i][1],$ruc))    			
				break;
		}
		return $i;
	}

	public function evaluarMenor()
	{
		$menor=9999999999999;
		$this->cotizaciones=Yii::app()->getGlobalState('arrays');
		for($i=0;$i<count($this->cotizaciones); $i++){
			if (isset($this->cotizaciones[$i][2])) {
				if($this->cotizaciones[$i][2]<$menor){
					$menor=$this->cotizaciones[$i][2];
				}
			}
		}
		return $menor;
	}

	public function asignarBuenaPro()
	{
		$this->cotizaciones=Yii::app()->getGlobalState('arrays');
		$menor=Yii::app()->getGlobalState('montoBajo');
		for($i=0;$i<count($this->cotizaciones); $i++){
			if (isset($this->cotizaciones[$i][2])) {
				if($this->cotizaciones[$i][2]==$menor){
					$this->cotizaciones[$i][4]=1;
				}else{
					$this->cotizaciones[$i][4]=0;
				}
			}
		}
		Yii::app()->setGlobalState('arrays', $this->cotizaciones);
	}

	public function actionAnalizar(){
	}

	public function actionGrabar(){
		$id=Yii::app()->getGlobalState('requerimientoID');
		$col=Yii::app()->getGlobalState('arrays');
		for($x=0;$x<count($col); $x++){
			$modelNew=new Cotizacion;
			if(!empty($col[$x][0])){
				// echo "<script>alert('".$id."');</script>";
				$modelNew->IDREQUERIMIENTO=$id;
				$modelNew->IDPROVEEDOR=$col[$x][0];
				$modelNew->COT_total=$col[$x][2];
				$modelNew->COT_buenaPro=$col[$x][4];
				$modelNew->save();
			}

		}
		$this->redirect(array('view','id'=>$id));
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='cotizacion-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
?>
