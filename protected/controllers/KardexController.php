<?php

class KardexController extends Controller
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
				'actions'=>array('index','admin','create','view'),
				'expression'=>'Yii::app()->user->checkAccess("almacen")',
			),
			array('allow',
				'actions'=>array('index','admin','create','view','reporteArea','reporteBien','reporteMes'),
				'expression'=>'Yii::app()->user->checkAccess("abastecimiento")',
			),
			array('allow',
				'actions'=>array('index','admin','create','view','reporteArea','reporteBien','reporteMes','excel'),
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
		$model=new Kardex;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Kardex']))
		{
			$model->attributes=$_POST['Kardex'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->IDKARDEX));
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

		if(isset($_POST['Kardex']))
		{
			$model->attributes=$_POST['Kardex'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->IDKARDEX));
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
		$dataProvider=new CActiveDataProvider('Kardex');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionReporteArea(){


		
		
		$criteria = new CDbCriteria;
		$counter=array();
		
		$model=new Area('search');
		$_requerimiento=new Requerimiento('search');
		$area=$model->search()->getData();
		

		if(isset($_GET['Requerimiento'])){
			$fecha=$_GET['Requerimiento']['REQ_fecha'];
			list($year, $month, $day) = split('[/.-]', $fecha);
			
			$rango=[
				"year"=>$year,
				"month"=>$month
			];

		}else{
			$rango=[
				"year"=>date('Y'),
				"month"=>date('m')
			];
		}

		foreach ($area as $value) {
			$requerimiento = array();
			$criteria->condition="REQ_oficina='".$value->ARE_nombre."' and MONTH(REQ_fecha)=".$rango['month']." and YEAR(REQ_fecha)=".$rango['year'];
			$requerimientos=  Requerimiento::model()->findAll($criteria);
			
			$rows = array();
             foreach($requerimientos as $model){
                $rows[] = $model->attributes;
             }
			if (!empty($requerimientos)) {
				$counter[]=["area"=>$rows[0]['REQ_oficina'],"count"=>Requerimiento::model()->count($criteria)];						
			}			

		}


		if(isset($_GET['imprimir'])){
			$this->layout='//layouts/reportes';		
		}

		$this->render('reporte_area',array(
			'rango'=>$rango,
			'counter'=>$counter,
			'_requerimiento'=>$_requerimiento
		));
	}

	public function actionReporteMes(){


		
		
		$criteria = new CDbCriteria;
		$val=array();
		
		

		$_requerimiento=new Requerimiento('search');		

		if(isset($_GET['Requerimiento'])){
			$fecha=$_GET['Requerimiento']['REQ_fecha'];
			list($year, $month, $day) = split('[/.-]', $fecha);
			
			$rango=[
				"year"=>$year,
				"month"=>$month
			];

		}else{
			$rango=[
				"year"=>date('Y'),
				"month"=>date('m')
			];
		}



		for ($i=1; $i <=12 ; $i++) { 
			
			$criteria->condition="MONTH(REQ_fecha)='".$i."' and YEAR(REQ_fecha)=".$rango['year'];
			$val[]=Requerimiento::model()->count($criteria);
		}

		if(isset($_GET['imprimir'])){
			$this->layout='//layouts/reportes';		
		}

		$this->render('reporte_mes',array(
			'rango'=>$rango,
			'_requerimiento'=>$_requerimiento,
			'val'=>$val
		));
	}

	public function actionExcel(){


		
		header("Content-type: application/vnd.ms-excel; name='excel'");
		header("Content-Disposition: filename=ficheroExcel.xls");
		header("Pragma: no-cache");
		header("Expires: 0");

		$bien= new Bien('search');		
		$bien->unsetAttributes();  // clear any default values


		if(isset($_GET['Kardex'])){
			$model->attributes=$_GET['Kardex'];	
						
		}

		if(isset($_GET['Bien'])){
			$bien->attributes=$_GET['Bien'];
			$idbien=$bien->IDBIEN?$bien->IDBIEN:'37393';
			$min=$_GET['Bien']['min'];
			$max=isset($_GET['Bien']['max'])?$_GET['Bien']['max']:date('Y-m-d');
			
			$rango=[
				"min"=>$min,
				"max"=>$max
			];
						
		}else{
			$rango=[
				"min"=>'2000-01-01',
				"max"=>date('Y-m-d')
			];
			$bien->IDBIEN="37393";
			$idbien="37393";
		}

		$model=new Kardex('search');
		


		$this->layout='//layouts/reportes';		


		$this->render('excel',array(
			'model'=>$model,
			'bien'=>$bien,
			'idbien'=>$idbien,
			'rango'=>$rango
		));
	}

	public function actionReporteBien(){


		
		
		$counter=array();
		
		


		$_requerimiento=new Requerimiento('search');		

		if(isset($_GET['Requerimiento'])){
			$fecha=$_GET['Requerimiento']['REQ_fecha'];
			list($year, $month, $day) = split('[/.-]', $fecha);
			
			$rango=[
				"year"=>$year,
				"month"=>$month
			];

		}else{
			$rango=[
				"year"=>date('Y'),
				"month"=>date('m')
			];
		}

		$sql="SELECT  IDBIEN, count(IDBIEN) as total FROM entrada_bien group by IDBIEN ";
		$connection=Yii::app()->db;
		$command=$connection->createCommand($sql);
		$results=$command->queryAll();


		foreach ($results as $value) {
				$id=Bien::model()->findByPk($value['IDBIEN'])->IDCATALOGO;
				$bien=Catalogo::model()->findByPk($id)->CAT_descripcion;
				$counter[]=["idbien"=>$value['IDBIEN'],"bien"=>$bien,"total"=>$value['total']];					
		}



		if(isset($_GET['imprimir'])){
			$this->layout='//layouts/reportes';		
		}

		$this->render('reporte_bien',array(
			'rango'=>$rango,
			'counter'=>$counter,
			'_requerimiento'=>$_requerimiento
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
	
		

		$bien= new Bien('search');		
		$bien->unsetAttributes();  // clear any default values


		if(isset($_GET['Kardex'])){
			$model->attributes=$_GET['Kardex'];	
						
		}

		if(isset($_GET['Bien'])){
			$bien->attributes=$_GET['Bien'];
			$idbien=$bien->IDBIEN?$bien->IDBIEN:'5474';
			$min=$_GET['Bien']['min'];
			$max=isset($_GET['Bien']['max'])?$_GET['Bien']['max']:date('Y-m-d');
			
			$rango=[
				"min"=>$min,
				"max"=>$max
			];
						
		}else{
			$rango=[
				"min"=>date('Y-m-d'),
				"max"=>date('Y-m-d')
			];
			$bien->IDBIEN="5474";
			$idbien="5474";
		}

		$model=new Kardex('search');
		

		if(isset($_GET['imprimir'])){
			$this->layout='//layouts/reportes';		
		}

		$this->render('admin',array(
			'model'=>$model,
			'bien'=>$bien,
			'idbien'=>$idbien,
			'rango'=>$rango
		));
	}


	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Kardex::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='kardex-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
