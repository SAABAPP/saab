<?php

class NeaController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/main';
	public $columnas=array();

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
				'actions'=>array('index','admin','create','view'),
				'expression'=>'Yii::app()->user->checkAccess("almacen")',
			),
			array('allow',
				'actions'=>array('index','admin','create','view'),
				'expression'=>'Yii::app()->user->checkAccess("abastecimiento")',
			),
			array('allow',
				'actions'=>array('index','admin','create','view'),
				'expression'=>'Yii::app()->user->checkAccess("administrador")',
			),
			array('allow', 
				'actions'=>array('buscaBien','addItem','details','aumentarItem','disminuirItem','removeItem'),
				'users'=>array('*'),
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
		$entradaBien=new EntradaBien('search');
		$entradaBien->unsetAttributes();
		$entradaBien->IDENTRADA=$id;
        if(isset($_GET['imprimir'])){
			$this->layout='//layouts/pdf'; 
		}		
		
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'entradaBien'=>$entradaBien,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		Yii::app()->user->setState('site_id', 0);

		$model=new Nea;
		$catalogo=new Catalogo;
		$entrada=new Entrada;
		$col=Yii::app()->user->getState('arrays_nea');
		$temporal=array();
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if($this->validador()){
			if(isset($_POST['Nea']) && isset($_POST['Entrada']) && isset($_POST['tipo']))
			{
				$entrada->attributes=$_POST['Entrada'];
							
				//$tipo = unserialize($_POST['tipo']);
				// print_r($tipo);
				if($entrada->save()){
					$model->attributes=$_POST['Nea'];
					$model->IDENTRADA=$entrada->IDENTRADA;
					if($model->save()){
						foreach($_POST['tipo'] as $value){
							array_push($temporal, $value);							
						}
						for($x=0;$x<count($temporal)/2; $x++){
							$detalle_nea= new DetalleNea;
							$detalle_nea->IDENTRADA=$entrada->IDENTRADA;
							$detalle_nea->DNE_tipoBien=$temporal[2*$x];
							$detalle_nea->DNE_monto=$temporal[2*$x+1];
							if (!$detalle_nea->save()) {
					        		// $transaction->rollBack();
		                            Yii::app()->user->setFlash('error', '<strong>Oh Nooo!</strong> No se pueden guardar los tipos');
		                    }
		                    else{
		                    		Yii::app()->user->setFlash('success', '<strong>Bien!</strong> se ha creado una nueva Nota de Entrada Nº'.$entrada->IDENTRADA);
		                        	// $transaction->commit();
		                        		
		                    }
						}

     				    for($x=0;$x<count($col); $x++){
					        $entrada_bien= new EntradaBien; 
					        if(!empty($col[$x][1])){
					        	$entrada_bien->IDENTRADA=$entrada->IDENTRADA;
					        	$entrada_bien->IDBIEN=$col[$x][0];
					        	$entrada_bien->EBI_cantidad=$col[$x][3];
					        	$entrada_bien->EBI_precioCompra=$col[$x][4];
					        	if (!$entrada_bien->save()) {
					        		// $transaction->rollBack();
		                            Yii::app()->user->setFlash('error', '<strong>Oh Nooo!</strong> No se pueden guardar lo bienes');
		                        }
		                        else{
		                        	// $transaction->commit();
		                        		
		                        }
		                        
					        }

					    }

					}
					$this->redirect(array('admin'));
				}
				
				
			}
			else
				Yii::app()->user->setFlash('warning', '<strong>Atencion!</strong> debe ingresar tipo de bien');
		}
		else{
			Yii::app()->user->setFlash('warning', '<strong>Atencion!</strong> debe ingresar algun bien');			
		}


		$this->render('create',array(
			'model'=>$model,
			'entrada'=>$entrada,
			'catalogo'=>$catalogo
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

		if(isset($_POST['Nea']))
		{
			$model->attributes=$_POST['Nea'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->IDENTRADA));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	public function actionDetails() {
        
        $this->renderPartial('_details');
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
		Yii::app()->user->setState('arrays_nea', $this->columnas);
		$dataProvider=new CActiveDataProvider('Nea');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
    public function actionBuscaBien() {

       //$q = $_GET['busca_clasificador'];
    	$q=trim($_GET['term']);
    	//echo 'funciona el valor es:'.$_GET['term'];
       //$q='LA';

    	if (isset($q)) {
    		$condicion = new CDbCriteria;
           // condition to find your data, using q as the parameter field
    		$condicion->condition = "IDCATALOGO>=4898 AND length(CAT_codigo)=12  AND CAT_descripcion LIKE '%". $q ."%' order by CAT_descripcion";
           //$condicion->order = 'CLA_descripcion'; // correct order-by field
           $condicion->limit = 10; // probably a good idea to limit the results
           // with trailing wildcard only; probably a good idea for large volumes of data
           //$condicion->params = array(':q' => trim($q) . '%'); 
           $catalogo=  Catalogo::model()->findAll($condicion);


           if (!empty($catalogo)) {
           	$returnVal = '';
           	$salida = array();
           	foreach ($catalogo as $c) {
           		$salida[] = array(
                      // expression to give the string for the autoComplete drop-down
           			'label' => $c->CAT_descripcion,  
           			'value' => $c->CAT_descripcion,
           			'unidad'=>$c->CAT_unidad,
                     'id' => Bien::model()->findByAttributes(array('IDCATALOGO'=>$c->IDCATALOGO))->IDBIEN, // return value from autocomplete
                       );
           	}
           	echo CJSON::encode($salida);
           	Yii::app()->end();
           }
       }
   	}

	public function actionAddItem() {

        try {
        	
        	$idbien= $_POST['idbien'];
        	$descripcion= $_POST['descripcion'];
        	$unidad= $_POST['unidad'];
        	$cantidad= $_POST['cantidad'];
            $precio_unitario= $_POST['precio_unitario'];
            $sub_total= $_POST['sub_total'];
            
            // Yii::app()->params['valor']
         
			$i=Yii::app()->user->getState('site_id'); //obtiene el valor de una variable global
          	
          if($i==0){
          	
          	$this->columnas[$i][0]=$idbien;
            $this->columnas[$i][1]=$descripcion;
            $this->columnas[$i][2]=$unidad;
            $this->columnas[$i][3]=$cantidad;
            $this->columnas[$i][4]=$precio_unitario;
            $this->columnas[$i][5]=$sub_total;
            Yii::app()->user->setState('arrays_nea', $this->columnas);
          }else{
          	$this->columnas=Yii::app()->user->getState('arrays_nea');
          	$this->columnas[$i][0]=$idbien;
            $this->columnas[$i][1]=$descripcion;
            $this->columnas[$i][2]=$unidad;
            $this->columnas[$i][3]=$cantidad;
            $this->columnas[$i][4]=$precio_unitario;
            $this->columnas[$i][5]=$sub_total;
            Yii::app()->user->setState('arrays_nea', $this->columnas);
          }

            ++$i;

           	Yii::app()->user->setState('site_id', $i);	// envia valor a una varible global
            
            //user->setState()
            $this->actionDetails();          

            
        } catch (Exception $ex) {
            throw $ex;
        }
    }
	public function actionAdmin()
	{
		
		Yii::app()->user->setState('arrays_nea',null);

		$model=new Entrada('search');
		$model->unsetAttributes();  // clear any default values
		$model->ENT_tipo = '1';
		if(isset($_GET['Entrada']))
			$model->attributes=$_GET['Entrada'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	public function actionAumentarItem() {

    	$id= $_POST['idbien'];
    	$this->columnas=Yii::app()->user->getState('arrays_nea');
    	$valor=-1;
    	
    	$valor=$this->busqueda($id);
        
        ++$this->columnas[$valor][3];
        $this->columnas[$valor][4];
        $this->columnas[$valor][5]=$this->columnas[$valor][4]*$this->columnas[$valor][3];
        Yii::app()->user->setState('arrays_nea', $this->columnas);
		//echo $valor.' bien:'.$id.' valor:'.$this->columnas[$valor][0];
        $this->actionDetails();
    }
    public function actionDisminuirItem() {

        $id= $_POST['idbien'];
    	$valor=-1;    	
        $valor=$this->busqueda($id);
        $this->columnas=Yii::app()->user->getState('arrays_nea');
        if($this->columnas[$valor][3]<=1){
         	//unset($this->columnas[$valor][0]);
        	unset($this->columnas[$valor][1]);
       		unset($this->columnas[$valor][2]);      
         	unset($this->columnas[$valor][3]);
        	unset($this->columnas[$valor][4]);
       		unset($this->columnas[$valor][5]);       		 	
        }
        else{
        	--$this->columnas[$valor][3];        	
	        $this->columnas[$valor][4];
	        $this->columnas[$valor][5]=$this->columnas[$valor][4]*$this->columnas[$valor][3];
        }
        
        Yii::app()->user->setState('arrays_nea', $this->columnas);

        $this->actionDetails();
    }

    public function actionRemoveItem() {

    	$id= $_POST['idbien'];
    	$valor=-1;
        $valor=$this->busqueda($id);
        $this->columnas=Yii::app()->user->getState('arrays_nea');
     	//unset($this->columnas[$valor][0]);
    	unset($this->columnas[$valor][1]);
   		unset($this->columnas[$valor][2]);      
     	unset($this->columnas[$valor][3]);
    	unset($this->columnas[$valor][4]);
   		unset($this->columnas[$valor][5]);  
        $this->columnas = array_values($this->columnas);
        Yii::app()->user->setState('arrays_nea', $this->columnas);

        $this->actionDetails();

    }
    public function busqueda($id){
    	
    	$columna=array();
    	$columna=Yii::app()->user->getState('arrays_nea');
    	// foreach ($this->columnas as $col) {
    	for($i=0;$i<count($columna); $i++){
    		
    		if(stristr($columna[$i][0],$id))
    		{
    			return $i;
    			break;
    		}   		

    			
    		
    	}
    	return null;
    }
    public function validador(){
    	$col=Yii::app()->user->getState('arrays_nea');
	    
	    $valor=0;
	      for($x=0;$x<count($col); $x++){	        
	        if(!empty($col[$x][0]) && !empty($col[$x][1]) && !empty($col[$x][2]) && !empty($col[$x][3]) && !empty($col[$x][4]))
	         	$valor=1;
	      	
	      }
	      if($valor==1)
	      	return true;
	      else
	      	return false;	      
	}    

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Nea the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Nea::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Nea $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='nea-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
