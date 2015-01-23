<?php
error_reporting(E_ALL ^ E_NOTICE);
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

			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','create','update','index','view','buscaArea','buscaAutorizacion','on','off'),
				'expression'=>'Yii::app()->user->checkAccess("administrador")',
			),

			array('allow',
				'actions'=>array('index','admin','create','view','update'),
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
		$asignacion= new AuthAssignment;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation(array($model,$usuario));

		if(isset($_POST['Personal'],$_POST['Usuario']))
		{
			$usuario->attributes=$_POST['Usuario'];
			if (!$this->BuscaUsuario($usuario->USU_usuario)) {
				$model->attributes=$_POST['Personal'];			
				if(!$model->save()){
					Yii::app()->user->setFlash('error', '<strong>Oh Nooo!</strong> No se pueden guardar el personal');
					$this->redirect(array('create'));
				}
				else{
					$usuario->attributes=$_POST['Usuario'];
					$usuario->USU_password=md5($usuario->USU_password);
					$usuario->IDPERSONAL=$model->IDPERSONAL;

					
					if(!$usuario->save()){
						Yii::app()->user->setFlash('warning', '<strong>Oh Nooo!</strong> No se pueden guardar el usuario');
					}
					else{
						$asignacion->attributes=$_POST['AuthAssignment'];
						$asignacion->userid=$usuario->USU_usuario;
						
						if(!$asignacion->save()){
							Yii::app()->user->setFlash('warning', '<strong>Oh Nooo!</strong> No se pueden guardar el permiso');
						}
						else{
							Yii::app()->user->setFlash('success', '<strong>Bien!!</strong> se creo el nuevo usuario');					
						}

					}	
				}
			}
			else{
				Yii::app()->user->setFlash('error', '<strong>Upps!</strong>Usuario Ya existe intente otro nombre');
				$this->redirect(array('create'));
			}
			

			
			$this->redirect(array('admin'));
		}

		$this->render('create',array(
			'model'=>$model,
			'usuario'=>$usuario,
			'asignacion'=>$asignacion,
		));
	}
	public function BuscaUsuario($username){


  			
  			$exists = Usuario::model()->exists('USU_usuario = "'.$username.'"');

  			return $exists;

	}
	public function actionOff($id){
		$model=$this->loadModel($id);


		$model->PER_estado=0;			
		if(!$model->save()){
			Yii::app()->user->setFlash('error', '<strong>Oh Nooo!</strong> No se pudo actualizar el personal');
		}
		else{
			Yii::app()->user->setFlash('success', '<strong>Bien!</strong> Se Actualizó Correctamente el personal');
		}

		$this->redirect(Yii::app()->user->returnUrl);

		// $this->redirect(array('admin'));


	}
	public function actionOn($id){

		$model=$this->loadModel($id);


		$model->PER_estado=1;			
		if(!$model->save()){
			Yii::app()->user->setFlash('error', '<strong>Oh Nooo!</strong> No se pudo actualizar el personal');
		}
		else{
			Yii::app()->user->setFlash('success', '<strong>Bien!</strong> Se Actualizó Correctamente el personal');
		}

		$this->redirect(Yii::app()->user->returnUrl);
		// $this->redirect(array('admin'));

		
	}
	public function actionBuscaAutorizacion(){
    	$q=trim($_GET['term']);
    	//echo 'funciona el valor es:'.$_GET['term'];
       //$q='LA';

    	if (isset($q)) {
    		$condicion = new CDbCriteria;
           // condition to find your data, using q as the parameter field
    		$condicion->condition = "name LIKE '%". $q ."%' ";
           //$condicion->order = 'CLA_descripcion'; // correct order-by field
           $condicion->limit = 10; // probably a good idea to limit the results
           // with trailing wildcard only; probably a good idea for large volumes of data
           //$condicion->params = array(':q' => trim($q) . '%'); 
           $autorizacion=  AuthItem::model()->findAll($condicion);


           if (!empty($autorizacion)) {
           	
           	$salida = array();
           	foreach ($autorizacion as $a) {
           		$salida[] = array(
                      // expression to give the string for the autoComplete drop-down
           			'label' => $a->name,  
           			'id' => $a->name,
                       );
           	}
           	echo CJSON::encode($salida);
           	Yii::app()->end();
           }
       }		
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
		$asignacion= AuthAssignment::model()->findByAttributes(array('userid'=>$usuario->USU_usuario));

		if(isset($_POST['Personal']) && isset($_POST['Usuario']))
		{
			$model->attributes=$_POST['Personal'];			
			if(!$model->save()){
				Yii::app()->user->setFlash('error', '<strong>Oh Nooo!</strong> No se pueden actualizar el personal');
			}
			else{
				try{
					$usu=Usuario::model()->findByPk($usuario->IDUSUARIO);
					$usu->attributes=$_POST['Usuario'];
					$usu->USU_password=md5($usuario->USU_password);
					if(!$usu->save()){
						Yii::app()->user->setFlash('warning', '<strong>Oh Nooo!</strong> No se pueden actualizar el usuario');
					}
					else{
						Yii::app()->user->setFlash('success', '<strong>Bien!!</strong> se creo el nuevo usuario');
					}	
				}catch(exception $e){
					Yii::app()->user->setFlash('error', $e);
				}
				
			}

			
			$this->redirect(array('admin'));
		}

		$this->render('update',array(
			'model'=>$model,
			'usuario'=>$usuario,
			'asignacion'=>$asignacion,
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

		Yii::app()->user->setReturnUrl(Yii::app()->request->url);

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
