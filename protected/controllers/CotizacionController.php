<?php

class CotizacionController extends Controller
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
			array('allow',
				'actions'=>array('index','admin','create','view','update'),
				'expression'=>'Yii::app()->user->checkAccess("abastecimiento")',
			),
			array('allow',
				'actions'=>array('index','admin','create','view','update'),
				'expression'=>'Yii::app()->user->checkAccess("administrador")',
			),
			// array('allow', // allow admin user to perform 'admin' and 'delete' actions
			// 	'actions'=>array('delete'),
			// 	'users'=>array('admin'),
			// 	'deniedCallback' => function() {Yii::app()->controller->redirect(array ('site/error'));},
			// ),
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
		$model=Cotizacion::model()->findByAttributes(array('IDREQUERIMIENTO'=>$id));
		$cotizacion=new Cotizacion();
		$cotizacion->unsetAttributes();
		$cotizacion->IDREQUERIMIENTO=$model->IDREQUERIMIENTO;
		$dataProvider=$cotizacion->search();
		$this->render('view',array(
			'model'=>$model,
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($id)
	{
		$cotizado= Yii::app()->db->createCommand()
	        ->select('count(*) as cont')
	        ->from('cotizacion C')
	        ->join('requerimiento R', 'R.IDREQUERIMIENTO=C.IDREQUERIMIENTO')
	        ->where('R.IDREQUERIMIENTO=:id', array(':id'=>$id))
	        ->queryRow();

        switch ($cotizado['cont']) {
            case 0:
	            $model=new Cotizacion;
	            $requerimiento=Requerimiento::model()->findByPk($id);		

				// Uncomment the following line if AJAX validation is needed
				// $this->performAjaxValidation($model);

	            if(isset($_POST['Cotizacion']))
	            {
	            	$model->attributes=$_POST['Cotizacion'];
	            	if($model->save())
	            		$this->redirect(array('view','id'=>$model->IDCOTIZACION));
	            }

	            $this->render('create',array(
	            	'model'=>$model,
	            	'requerimiento'=>$requerimiento,
	            	));
                break;
            default:
                throw new CHttpException(403,'No se puede acceder a la pagina.');
                break;
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
