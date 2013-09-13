<?php

class PecosaController extends Controller
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow',
				'actions'=>array('index','admin','create','view'),
				'expression'=>'Yii::app()->user->checkAccess("almacen")',
			),					
			// array('allow', 
			// 	'actions'=>array('create','update'),
			// 	'users'=>array('@'),
			// ),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','create','update','view'),
				'users'=>array('admin'),
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
		$this->redirect(array('//ordenCompra/'.$id));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($id)
	{
		$model=new Pecosa;
		$ordenCompra=new OrdenCompra;
		$ordenCompra=OrdenCompra::model()->findByPk($id);
		$id_requerimiento=$ordenCompra->iDREQUERIMIENTO->IDREQUERIMIENTO;
		$cotizacion= new Cotizacion;
		$cotizacion=Cotizacion::model()->findByAttributes(array('IDREQUERIMIENTO'=>$id_requerimiento,'COT_buenaPro'=>'1'));		
		$entradaOC= new EntradaOc;
		$entradaOC=EntradaOc::model()->findByAttributes(array('IDORDENCOMPRA'=>$id));
		$requerimiento_bien = new RequerimientoBien();
		$requerimiento_bien->unsetAttributes();
		$requerimiento_bien->IDREQUERIMIENTO = $id_requerimiento;
		$requerimiento=new Requerimiento;
		$requerimiento=Requerimiento::model()->findByPk($id_requerimiento);

		$Criteria_OC = new CDbCriteria();
		$Criteria_OC->condition = "IDORDENCOMPRA = $id";
		$detalleOC=DetalleOrdenCompra::model()->findAll($Criteria_OC);
		
		$temporal=array();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if($ordenCompra->TIPO=='s' or $requerimiento->REQ_estado!='En almacen'){
			$this->redirect(array('admin'));
		}else{
			if(isset($_POST['Pecosa']))
			{
				$model->attributes=$_POST['Pecosa'];
				$model->PEC_referencia=$entradaOC->EOC_documento;
				if(!$model->save()){
					Yii::app()->user->setFlash('error', '<strong>Oh Nooo!</strong> No se pueden realizar el pedido de salida');
				}
				else{
					$requerimiento->REQ_estado='Finalizado';
					if(!$requerimiento->save()){
						Yii::app()->user->setFlash('warning', '<strong>Oh Nooo!</strong> No se pueden cambiar le estado');
					}
					else{
						foreach ($detalleOC as $value) {
							$pecosa=new PecosaBien;
							$pecosa->IDBIEN=$value->DOC_bien;
							$pecosa->IDPECOSA=$model->IDPECOSA;
							$pecosa->PBI_cantidad=$value->DOC_cantidad;
							if(!$pecosa->save())
								Yii::app()->user->setFlash('error', '<strong>Oh Nooo!</strong> No se pueden realizar el pedido de salida de los bienes');
						}
						
					}
				}
				$this->redirect(array('admin'));
			}

			$this->render('create',array(
				'model'=>$model,
				'ordenCompra'=>$ordenCompra,
				'cotizacion'=>$cotizacion,
				'entradaOC'=>$entradaOC,
				'requerimiento_bien'=>$requerimiento_bien,
			));
		}
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

		if(isset($_POST['Pecosa']))
		{
			$model->attributes=$_POST['Pecosa'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->IDPECOSA));
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
		$dataProvider=new CActiveDataProvider('Pecosa');
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
		$model->TIPO='c'; 
		
		if(isset($_GET['OrdenCompra']))
			$model->attributes=$_GET['OrdenCompra'];

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
		$model=Pecosa::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='pecosa-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
