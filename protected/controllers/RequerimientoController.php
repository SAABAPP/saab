<?php

class RequerimientoController extends Controller
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
				'actions'=>array('index','admin','create','view'),
				'expression'=>'Yii::app()->user->checkAccess("usuario")',
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','admin','create','view'),
				'expression'=>'Yii::app()->user->checkAccess("administrador")',
			),
			array('allow', 
				'actions'=>array('buscaClasificador'),
				'users'=>array('*'),
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
		$model=new Requerimiento;
		$idusuario = Yii::app()->user->getState('idusuario');
  		$usuario= new Usuario;
 		$usuario = Usuario::model()->findByPk($idusuario);
 		$bien=	new Bien('search');
 		
 		$bien->unsetAttributes();	
        // $clasificador = new Clasificador;
        // $clasificador= Clasificador::model()->findAll();
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Requerimiento']))
		{
			$model->attributes=$_POST['Requerimiento'];
			//$model->IDUSUARIO=Yii::app()->user->getState('idusuario');
			if($model->save())
				$this->redirect(array('view','id'=>$model->IDREQUERIMIENTO));
		}

		$this->render('create',array(
			'model'=>$model,
			'usuario'=>$usuario,
			'bien'=>$bien,
		));
	}

	public function actionBuscaClasificador() {

       //$q = $_GET['busca_clasificador'];
       $q=trim($_GET['term']);

       //$q='LA';

       if (isset($q)) {
           $criteria = new CDbCriteria;
           // condition to find your data, using q as the parameter field
           $criteria->condition = "CLA_descripcion LIKE '%". $q ."%'";
           //$criteria->order = 'CLA_descripcion'; // correct order-by field
           $criteria->limit = 10; // probably a good idea to limit the results
           // with trailing wildcard only; probably a good idea for large volumes of data
           //$criteria->params = array(':q' => trim($q) . '%'); 
           $clasificador= Clasificador::model()->findAll($criteria);

           if (!empty($clasificador)) {
               $returnVal = '';
               $out = array();
               foreach ($clasificador as $p) {
                   $out[] = array(
                      // expression to give the string for the autoComplete drop-down
                       'label' => $p->CLA_descripcion,  
                       'value' => $p->CLA_descripcion,
                       'id' => $p->CODIGOCLASIFICADOR, // return value from autocomplete
                   );
                }
              echo CJSON::encode($out);
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
		$model=new Requerimiento;
		$idusuario = Yii::app()->user->getState('idusuario');
  		$usuario= new Usuario;
 		$usuario = Usuario::model()->findByPk($idusuario);		
        
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Requerimiento']))
		{
			$model->attributes=$_POST['Requerimiento'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->IDREQUERIMIENTO));
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
	// public function actionIndex()
	// {
	// 	$dataProvider=new CActiveDataProvider('Requerimiento');
	// 	$this->render('index',array(
	// 		'dataProvider'=>$dataProvider,
	// 	));
	// }

	public function actionIndex()
	{
		//aca es para el index, que redirecciona a views/requerimiento/admin.php

        $requerimiento = new Requerimiento('search');//creo una variable con la funcion search de Requerimiento
        $requerimiento->unsetAttributes();//limpio los valores que pueda tener
        $requerimiento->IDUSUARIO = Yii::app()->user->getState('idusuario');//a la variable le asigno el IDUSUARIO igual que el que esta logeado
        
        $dataProvider = $requerimiento->search();//creo un dataprovider que mandaremos al admin y ese dataprovider solo tendra los requerimientos del usuario logeado
        
		//$dataProvider=new CActiveDataProvider('Requerimiento');//,array('pagination'=>array('pageSize'=>2,),));//,array('criteria'=>array('condition'=>'IDUSUARIO=2'))
		// $dataProvider->setPagination('1');
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
		//para la accion admin, solo le cree esto, si el idusuario es diferente del admin, los filtro; sino que se muestren todos
		if (Yii::app()->user->getState('idusuario')!=1) {
			$model->IDUSUARIO = Yii::app()->user->getState('idusuario');
		}
		
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
		$model=Requerimiento::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='requerimiento-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
