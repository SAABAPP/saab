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
			array('allow', 
				'actions'=>array('buscaProveedor','addCotizacion','details','removeCotizacion','busqueda'),
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
		$cotizado= Yii::app()->db->createCommand()
	        ->select('count(*) as cont')
	        ->from('cotizacion C')
	        ->join('requerimiento R', 'R.IDREQUERIMIENTO=C.IDREQUERIMIENTO')
	        ->where('R.IDREQUERIMIENTO=:id', array(':id'=>$id))
	        ->queryRow();

        switch ($cotizado['cont']) {
            case 0:
            	Yii::app()->setGlobalState('indiceCotizacion', 0);
            	Yii::app()->clearGlobalState('arrays');
            	Yii::app()->clearGlobalState('cantidadCotizaciones');
	            $model=new Cotizacion;
	            $requerimiento=Requerimiento::model()->findByPk($id);
	            $proveedor=new Proveedor('search');

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
	            	'proveedor'=>$proveedor,
	            	)
	            );
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

	public function actionBuscaProveedor() {
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

   	public function actionAddCotizacion() {
   		$cantidad=Yii::app()->getGlobalState('cantidadCotizaciones');
   		if ($cantidad<3) {
   			try {
   				$idProveedor= $_POST['idProveedor'];
   				$ruc= $_POST['ruc'];
   				$monto= $_POST['monto'];
   				$razonSocial= $_POST['razonSocial'];
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
   				$this->actionDetails();
   				// echo "<script>alert('".Yii::app()->getGlobalState('cantidadCotizaciones')."');</script>";
   			} catch (Exception $ex) {
   				throw $ex;
   			}
   		} else {
   			echo "<script>alert('No se pueden agregar mas de 3 cotizaciones');</script>";
   			$this->actionDetails();
   		}
   		
   		
	}


    public function actionDetails() {
        $this->renderPartial('_details');
    }

    public function actionRemoveCotizacion() {
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

    public function busqueda($ruc){
    	$this->cotizaciones=Yii::app()->getGlobalState('arrays');
    	for($i=0;$i<count($this->cotizaciones); $i++){
    		if(stristr($this->cotizaciones[$i][1],$ruc))    			
    			break;
    	}
    	return $i;
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
