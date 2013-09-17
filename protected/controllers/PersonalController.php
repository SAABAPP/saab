<?php

class PersonalController extends Controller
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
			
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','create','update','index','view','buscaArea'),
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
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Personal;
		$usuario=new Usuario;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation(array($model,$usuario));

		if(isset($_POST['Personal'],$_POST['Usuario']))
		{
			$model->attributes=$_POST['Personal'];			
			if(!$model->save()){
				Yii::app()->user->setFlash('error', '<strong>Oh Nooo!</strong> No se pueden guardar el personal');
			}
			else{
				$usuario->attributes=$_POST['Usuario'];
				$usuario->IDPERSONAL=$model->IDPERSONAL;
				if(!$usuario->save()){
					Yii::app()->user->setFlash('warning', '<strong>Oh Nooo!</strong> No se pueden guardar el usuario');
				}
				else{
					Yii::app()->user->setFlash('success', '<strong>Bien!!</strong> se creo el nuevo usuario');
				}	
			}

			
			$this->redirect(array('admin'));
		}

		$this->render('create',array(
			'model'=>$model,
			'usuario'=>$usuario,
		));
	}
	public function actionBuscaArea(){
		       //$q = $_GET['busca_clasificador'];
    	$q=trim($_GET['term']);
    	//echo 'funciona el valor es:'.$_GET['term'];
       //$q='LA';

    	if (isset($q)) {
    		$condicion = new CDbCriteria;
           // condition to find your data, using q as the parameter field
    		$condicion->condition = "ARE_nombre LIKE '%". $q ."%' ";
           //$condicion->order = 'CLA_descripcion'; // correct order-by field
           $condicion->limit = 10; // probably a good idea to limit the results
           // with trailing wildcard only; probably a good idea for large volumes of data
           //$condicion->params = array(':q' => trim($q) . '%'); 
           $area=  Area::model()->findAll($condicion);


           if (!empty($area)) {
           	
           	$salida = array();
           	foreach ($area as $a) {
           		$salida[] = array(
                      // expression to give the string for the autoComplete drop-down
           			'label' => $a->ARE_nombre,  
           			'id' => $a->IDAREA,
                       );
           	}
           	echo CJSON::encode($salida);
           	Yii::app()->end();
           }
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
		$usuario=Usuario::model()->findByAttributes(array('IDPERSONAL'=>$id));


		if(isset($_POST['Personal']) && isset($_POST['Usuario']))
		{
			$model->attributes=$_POST['Personal'];			
			if(!$model->save()){
				Yii::app()->user->setFlash('error', '<strong>Oh Nooo!</strong> No se pueden actualizar el personal');
			}
			else{
				$usuario->attributes=$_POST['Usuario'];
				if(!$usuario->save()){
					Yii::app()->user->setFlash('warning', '<strong>Oh Nooo!</strong> No se pueden actualizar el usuario');
				}
				else{
					Yii::app()->user->setFlash('success', '<strong>Bien!!</strong> se creo el nuevo usuario');
				}	
			}

			
			$this->redirect(array('admin'));
		}

		$this->render('update',array(
			'model'=>$model,
			'usuario'=>$usuario,
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
		$dataProvider=new CActiveDataProvider('Personal');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Personal('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Personal']))
			$model->attributes=$_GET['Personal'];

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
		$model=Personal::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='personal-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
