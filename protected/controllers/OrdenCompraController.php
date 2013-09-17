<?php

class OrdenCompraController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
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
				'actions'=>array('view','servicio'),
				'expression'=>'Yii::app()->user->checkAccess("almacen")',
			),
			array('allow',
				'actions'=>array('index','admin','view','servicio'),
				'expression'=>'Yii::app()->user->checkAccess("abastecimiento")',
			),
			array('allow',
				'actions'=>array('index','admin','view','servicio'),
				'expression'=>'Yii::app()->user->checkAccess("administrador")',
			),
			array('deny',  // deny all users
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
		
		$model=new OrdenCompra;
		$model=OrdenCompra::model()->findByPk($id);
		$id_requerimiento=$model->iDREQUERIMIENTO->IDREQUERIMIENTO;
		$requerimiento=Requerimiento::model()->findByPk($id_requerimiento);
		$cotizacion= new Cotizacion;
		$cotizacion=Cotizacion::model()->findByAttributes(array('IDREQUERIMIENTO'=>$id_requerimiento,'COT_buenaPro'=>'1'));
		$requerimiento_bien = new RequerimientoBien();
		$requerimiento_bien->unsetAttributes();
		$requerimiento_bien->IDREQUERIMIENTO = $id_requerimiento;
		$requerimiento_servicio=new RequerimientoServicio;
		$requerimiento_servicio->unsetAttributes();
		$requerimiento_servicio->IDREQUERIMIENTO = $id_requerimiento;

		$detalleOC=new DetalleOrdenCompra('search');
		$detalleOC->unsetAttributes();  // clear any default values
		$detalleOC->IDORDENCOMPRA=$id;

		
		if(isset($_GET['imprimir'])){
			$this->layout='//layouts/pdf'; 
			// $mPDF1 = Yii::app()->ePdf->mpdf();
			// 	$mPDF1->WriteHTML($this->render('view',array(
			// 		'model'=>$this->loadModel($id),
			// 		'requerimiento'=>$requerimiento,
			// 		'cotizacion'=>$cotizacion,
			// 		'requerimiento_bien'=>$requerimiento_bien,
			// 		'requerimiento_servicio'=>$requerimiento_servicio,
			// 		'detalleOC'=>$detalleOC,			
			// 	),true));
			// 	$mPDF1->Output('OrdenCompra','I');	
					

		}
		
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'requerimiento'=>$requerimiento,
			'cotizacion'=>$cotizacion,
			'requerimiento_bien'=>$requerimiento_bien,
			'requerimiento_servicio'=>$requerimiento_servicio,
			'detalleOC'=>$detalleOC,			
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new OrdenCompra;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['OrdenCompra']))
		{
			$model->attributes=$_POST['OrdenCompra'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->IDORDENCOMPRA));
		}

		$this->render('create',array(
			'model'=>$model,
		));
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

		if(isset($_POST['OrdenCompra']))
		{
			$model->attributes=$_POST['OrdenCompra'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->IDORDENCOMPRA));
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
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('OrdenCompra');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new OrdenCompra('search');
		$model->unsetAttributes();  // clear any default values
		$model->TIPO= 'c';
		if(isset($_GET['OrdenCompra']))
			$model->attributes=$_GET['OrdenCompra'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	public function actionServicio()
	{
		$model=new OrdenCompra('search');
		$model->unsetAttributes();  // clear any default values
		$model->TIPO= 's';
		if(isset($_GET['OrdenCompra']))
			$model->attributes=$_GET['OrdenCompra'];

		$this->render('servicio',array(
			'model'=>$model,
		));
	}	

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return OrdenCompra the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=OrdenCompra::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param OrdenCompra $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='orden-compra-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
