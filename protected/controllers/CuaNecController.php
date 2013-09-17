<?php

class CuaNecController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
	public $columnas=array();
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
				'actions'=>array('index','admin','create','view','servicio','view_servicio'),
				'expression'=>'Yii::app()->user->checkAccess("usuario")',
			),
			array('allow',
				'actions'=>array('index','admin','create','view','servicio','view_servicio'),
				'expression'=>'Yii::app()->user->checkAccess("almacen")',
			),
			array('allow',
				'actions'=>array('index','admin','create','view','servicio','view_servicio','cerrar'),
				'expression'=>'Yii::app()->user->checkAccess("abastecimiento")',
			),
			array('allow',
				'actions'=>array('index','admin','create','view','servicio','view_servicio','cerrar'),
				'expression'=>'Yii::app()->user->checkAccess("administrador")',
			),
			array('allow', 
				'actions'=>array('buscaClasificador','buscaBien','buscaServicio','buscaMeta','addItem','addServicio','details','aumentarItem','disminuirItem','removeItem','removeItemServicio','idCatalogo'),
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
		$model=$this->loadModel($id);
		if($model->TIPO=='b'){
			$requerimiento_bien = new RequerimientoBien();		
	        $requerimiento_bien->unsetAttributes();
	        $requerimiento_bien->IDREQUERIMIENTO = $id;  
	        $dataProvider = $requerimiento_bien->search();	
		}
		else{
			$requerimiento_servicio = new RequerimientoServicio();		
	        $requerimiento_servicio->unsetAttributes();
	        $requerimiento_servicio->IDREQUERIMIENTO = $id;  
	        $dataProvider = $requerimiento_servicio->search();
		}
		
        $usuario=Usuario::model()->findByAttributes(array('USU_usuario' => Yii::app()->user->getName()));
        
        if(isset($_POST['Requerimiento']))
		{
			$model->attributes=$_POST['Requerimiento'];
			$transaction=Yii::app()->db->beginTransaction();//transacciones
			if($model->save()){
				if($model->TIPO=='b'){
					$compra=Yii::app()->user->getState('comprar');
					$idcompra=Yii::app()->user->getState('idcomprar');
					$i=0;
					
					

					foreach($compra as $value){
								++$i;
								$bienes = new RequerimientoBien();
								$bienes=RequerimientoBien::model()->findByAttributes(array('IDBIEN' =>$idcompra[$i],'IDREQUERIMIENTO'=>$id ));
								$bienes->RBI_cantidadComprar=$value;			        	
					        	//$bienes->IDBIEN=$idcompra[$i];
					        	
					        	if (!$bienes->save()) {
					        		$transaction->rollBack();
					        		Yii::app()->user->setFlash('error', '<strong>Oh Nooo!</strong> No se pueden guardar lo items');
		                            //throw new Exception("Error al guardar items");
		                        }				        

					}

					
					Yii::app()->user->setState('comprar',null);
					Yii::app()->user->setState('idcomprar',0);
					
				}
				$transaction->commit();
				$this->redirect(array('admin'));
			}
				
		}
        
        if ($model->IDUSUARIO == $usuario->IDUSUARIO || Yii::app()->user->checkAccess("administrador") || Yii::app()->user->checkAccess("abastecimiento")) {
        	if(isset($_GET['imprimir'])){
				$this->layout='//layouts/pdf'; 
			}
        	$this->render('view',array(
        		'model'=>$model,
        		'dataProvider'=>$dataProvider,
        		));
        }else{
        	throw new CHttpException(403,'Usted no se encuentra autorizado para acceder a requerimientos que no son suyos. Por que lo hace?');
        }
	}



	public function actionCreate()
	{
		
		if(Variables::model()->findByPk(5)->VAR_valor=='0')
			throw new CHttpException(403,'Aun no se ha autorizó el cuadro de necesidades!!');
		$model=new Requerimiento;
		$idusuario = Yii::app()->user->getState('idusuario');
  		$usuario= new Usuario;
 		$usuario = Usuario::model()->findByPk($idusuario);
 		$clasificador=new Clasificador('search');

 		$col=Yii::app()->user->getState('arrays');
 		
 		$clasificador->unsetAttributes();
 		$catalogo=new Catalogo;
 		$catalogo->unsetAttributes();

 		$meta=new Meta;
 		$meta->unsetAttributes();

 		
		if($this->validador()){
			if(isset($_POST['Requerimiento']))
			{
				$model->attributes=$_POST['Requerimiento'];
				$model->IDCUANEC=Variables::model()->findByPk('6')->VAR_valor;
				//$transaction=Yii::app()->db->beginTransaction();//transacciones
				if($model->save()){

				      for($x=0;$x<count($col); $x++){
				        $requerimiento_bien= new RequerimientoBien; 
				        if(!empty($col[$x][1])){
				        	$requerimiento_bien->IDREQUERIMIENTO=$model->IDREQUERIMIENTO;
				        	$requerimiento_bien->IDBIEN=$col[$x][0];
				        	$requerimiento_bien->RBI_cantidad=$col[$x][1];
				        	if (!$requerimiento_bien->save()) {
				        		// $transaction->rollBack();
	                            Yii::app()->user->setFlash('error', '<strong>Oh Nooo!</strong> No se pueden guardar lo items');
	                        }
	                        else{
	                        	// $transaction->commit();
	                        		
	                        }
	                        
				        }

				      }
				    
				    Yii::app()->user->setState('arrays',null);
					$this->redirect(array('view','id'=>$model->IDREQUERIMIENTO));
					
				}

			}
			else
				$transaction->rollBack();
		}
		else{
			
			// Yii::app()->user->setFlash('info', '<strong>Heyy!</strong> ');
			Yii::app()->user->setFlash('warning', '<strong>Atencion!</strong> debe ingresar algun bien');
			// Yii::app()->user->setFlash('error', '<strong>Oh Nooo!</strong> No se pueden guardar lo items');
		}




		$this->render('create',array(
			'model'=>$model,
			'usuario'=>$usuario,
			'clasificador'=>$clasificador,
			'catalogo'=>$catalogo,
			'meta'=>$meta,
		));
	}
	public function actionServicio()
	{

		if(Variables::model()->findByPk(5)->VAR_valor=='0')
			throw new CHttpException(403,'Aun no se ha autorizó el cuadro de necesidades!!');
		$model=new Requerimiento;
		$idusuario = Yii::app()->user->getState('idusuario');
  		$usuario= new Usuario;
 		$usuario = Usuario::model()->findByPk($idusuario);
 		$clasificador=	new Clasificador('search');

 		$col=Yii::app()->user->getState('arrays');
 		
 		$clasificador->unsetAttributes();
 		$catalogo=new Catalogo;
 		$catalogo->unsetAttributes();

 		$meta=new Meta;
 		$meta->unsetAttributes();

 		/*  

			$requerimiento_bien= array(modelo);


 		*/
        // $clasificador = new Clasificador;
        // $clasificador= Clasificador::model()->findAll();
		// Uncomment the following line if AJAX validation is needed
		//$this->performAjaxValidation($model);
		if($this->validador()){
			if(isset($_POST['Requerimiento']))
			{
				$model->attributes=$_POST['Requerimiento'];
				$model->IDCUANEC=Variables::model()->findByPk('6')->VAR_valor;
				// $transaction=Yii::app()->db->beginTransaction();//transacciones
				if($model->save()){


				      for($x=0;$x<count($col); $x++){
				        $requerimiento_servicio= new RequerimientoServicio; 
				        if(!empty($col[$x][1])){
				        	$requerimiento_servicio->IDREQUERIMIENTO=$model->IDREQUERIMIENTO;
				        	$requerimiento_servicio->IDSERVICIO=$col[$x][0];
				        	$requerimiento_servicio->RSE_detalle=$col[$x][2];
				        	if (!$requerimiento_servicio->save()) {
				        		// $transaction->rollBack();
	                            Yii::app()->user->setFlash('error', '<strong>Oh Nooo!</strong> No se pueden guardar lo items');
	                        }
	                        else{
	                        	// $transaction->commit();
	                        		
	                        }
	                        
				        }

				      }
				    
				    Yii::app()->user->setState('arrays',null);
					$this->redirect(array('view','id'=>$model->IDREQUERIMIENTO));
					
				}

			}
		}
		else{
			
			// Yii::app()->user->setFlash('info', '<strong>Heyy!</strong> ');
			Yii::app()->user->setFlash('warning', '<strong>Atencion!</strong> debe ingresar algun servicio');
			// Yii::app()->user->setFlash('error', '<strong>Oh Nooo!</strong> No se pueden guardar lo items');
		}




		$this->render('servicio',array(
			'model'=>$model,
			'usuario'=>$usuario,
			'clasificador'=>$clasificador,
			'catalogo'=>$catalogo,
			'meta'=>$meta,
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
    public function actionIdCatalogo(){
    	$idcat= $_POST['idclasificador'];
    	Yii::app()->user->setState('idclasificador', $idcat);
    }

    public function actionBuscaBien() {

       //$q = $_GET['busca_clasificador'];
    	$q=trim($_GET['term']);
    	//echo 'funciona el valor es:'.$_GET['term'];
       //$q='LA';

    	if (isset($q)) {
    		$condicion = new CDbCriteria;
           // condition to find your data, using q as the parameter field
    		$condicion->condition = "IDCATALOGO>=4898 AND length(CAT_codigo)>=12  AND CAT_descripcion LIKE '%". $q ."%' order by CAT_descripcion";
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
    public function actionBuscaServicio() {

       //$q = $_GET['busca_clasificador'];
    	$q=trim($_GET['term']);
    	//echo 'funciona el valor es:'.$_GET['term'];
       //$q='LA';

    	if (isset($q)) {
    		$condicion = new CDbCriteria;
           // condition to find your data, using q as the parameter field
    		$condicion->condition = "IDCATALOGO<4898 AND length(CAT_codigo)=12  AND CAT_descripcion LIKE '%". $q ."%' order by CAT_descripcion";
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
                     'id' => Servicio::model()->findByAttributes(array('IDCATALOGO'=>$c->IDCATALOGO))->IDSERVICIO, // return value from autocomplete
                       );
           	}
           	echo CJSON::encode($salida);
           	Yii::app()->end();
           }
       }
   	}
   	public function actionBuscaMeta() {

       //$q = $_GET['busca_clasificador'];
       $q=trim($_GET['term']);

       //$q='LA';

       if (isset($q)) {
           $criteria = new CDbCriteria;
           // condition to find your data, using q as the parameter field
           $criteria->condition = "MET_descripcion LIKE '%". $q ."%'";
           //$criteria->order = 'CLA_descripcion'; // correct order-by field
           $criteria->limit = 10; // probably a good idea to limit the results
           // with trailing wildcard only; probably a good idea for large volumes of data
           //$criteria->params = array(':q' => trim($q) . '%'); 
           $meta= Meta::model()->findAll($criteria);

           if (!empty($meta)) {
               $returnVal = '';
               $out = array();
               foreach ($meta as $m) {
                   $out[] = array(
                      // expression to give the string for the autoComplete drop-down
                       'label' => $m->MET_descripcion,  
                       'value' => $m->MET_descripcion,
                       'id' => $m->CODMETA, // return value from autocomplete
                   );
                }
              echo CJSON::encode($out);
              Yii::app()->end();
            }
        }
    }
   
   
    public function actionAddItem() {

        try {
        	
        	$idbien= $_POST['idbien'];
            $rbi_cantidad= $_POST['rbi_cantidad'];
            $descripcion= $_POST['descripcion'];
           
            
			$i=Yii::app()->user->getState('site_id'); //obtiene el valor de una variable global
          	
          if($i==0){
          	
          	$this->columnas[$i][0]=$idbien;
            $this->columnas[$i][1]=$rbi_cantidad;
            $this->columnas[$i][2]=$descripcion;
            Yii::app()->user->setState('arrays', $this->columnas);
            ++$i;
           	Yii::app()->user->setState('site_id', $i);
          }else{

          	$pos=$this->busqueda($idbien);
          	$this->columnas=Yii::app()->user->getState('arrays');
          	if($pos!=null){
 				$this->columnas[$pos][0]=$idbien;
           		$this->columnas[$pos][1]=$rbi_cantidad;
            	$this->columnas[$pos][2]=$descripcion;         		
          	}
          	else{
          		$this->columnas[$i][0]=$idbien;
           		$this->columnas[$i][1]=$rbi_cantidad;
            	$this->columnas[$i][2]=$descripcion;
            	++$i;
           		Yii::app()->user->setState('site_id', $i);
          	}
          	
          	
            Yii::app()->user->setState('arrays', $this->columnas);
          }


            // envia valor a una varible global
            
            //setState()
            $this->actionDetails();
            
            //echo 'valor uno:'.$this->columnas[0][0].'valor ahora:'.$this->columnas[1][0].'  variable '.$i;
            

            
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    public function actionAddServicio() {

        try {
        	
        	$idservicio= $_POST['idservicio'];
            $caracteristica= $_POST['caracteristica'];
            $descripcion= $_POST['descripcion'];           


        	
			$i=Yii::app()->user->getState('site_id'); //obtiene el valor de una variable global
          	
          if($i==0){
          	
          	$this->columnas[$i][0]=$idservicio;
            $this->columnas[$i][1]=$descripcion;
            $this->columnas[$i][2]=$caracteristica;
           
            ++$i;
           	Yii::app()->user->setState('site_id', $i);	// envia valor a una varible global

          }else{

         	$pos=$this->busqueda($idservicio);
          	$this->columnas=Yii::app()->user->getState('arrays');
          	if($pos!=null){
	          	$this->columnas[$pos][0]=$idservicio;
	            $this->columnas[$pos][1]=$descripcion;
	            $this->columnas[$pos][2]=$caracteristica;        		
          	}
          	else{
	          	$this->columnas[$i][0]=$idservicio;
	            $this->columnas[$i][1]=$descripcion;
	            $this->columnas[$i][2]=$caracteristica;
            	++$i;
           		Yii::app()->user->setState('site_id', $i);
           	}
            
            
            
          }

            Yii::app()->user->setState('arrays', $this->columnas);
            //setState()
            $this->renderPartial('_services'); 
            

            
        } catch (Exception $ex) {
            throw $ex;
        }
    }    
    public function actionDetails() {
        
        $this->renderPartial('_details');
    }

    public function busqueda($id){
    	
    	$columna=array();
    	$columna=Yii::app()->user->getState('arrays');
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
    	$col=Yii::app()->user->getState('arrays');
	    $valor=0;
	      for($x=0;$x<count($col); $x++){	        
	        if(!empty($col[$x][0]) && !empty($col[$x][1]) && !empty($col[$x][2]))
	         	$valor=1;
	      	
	      }
	      if($valor==1)
	      	return true;
	      else
	      	return false;

	}

    public function actionAumentarItem() {

    	$id= $_POST['idbien'];
    	$this->columnas=Yii::app()->user->getState('arrays');
    	$valor=-1;
    	
    	$valor=$this->busqueda($id);
        
        ++$this->columnas[$valor][1];
        Yii::app()->user->setState('arrays', $this->columnas);
		//echo $valor.' bien:'.$id.' valor:'.$this->columnas[$valor][0];
        $this->actionDetails();
    }
    public function actionDisminuirItem() {

        $id= $_POST['idbien'];
    	$valor=-1;    	
        $valor=$this->busqueda($id);
        $this->columnas=Yii::app()->user->getState('arrays');
        if($this->columnas[$valor][1]<=1){
         	$this->columnas[$valor][0]=0;
        	unset($this->columnas[$valor][1]);
       		unset($this->columnas[$valor][2]);       	
        }
        else{
        	--$this->columnas[$valor][1];
        }
        
        Yii::app()->user->setState('arrays', $this->columnas);

        $this->actionDetails();
    }

    public function actionRemoveItem() {

    	$id= $_POST['idbien'];
    	$valor=-1;
        $valor=$this->busqueda($id);
        $this->columnas=Yii::app()->user->getState('arrays');
        $this->columnas[$valor][0]=0;
        unset($this->columnas[$valor][1]);
        unset($this->columnas[$valor][2]);
        $this->columnas = array_values($this->columnas);
        Yii::app()->user->setState('arrays', $this->columnas);

        $this->actionDetails();

    }

    public function actionRemoveItemServicio() {

    	$id= $_POST['idbien'];
    	$valor=-1;
        $valor=$this->busqueda($id);
        $this->columnas=Yii::app()->user->getState('arrays');
        $this->columnas[$valor][0]=0;
        unset($this->columnas[$valor][1]);
        unset($this->columnas[$valor][2]);
        $this->columnas = array_values($this->columnas);
        Yii::app()->user->setState('arrays', $this->columnas);
       
        $this->renderPartial('_services');

    } 

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */


	public function actionCerrar()
	{
		$variables=new Variables;
		$variables=Variables::model()->findByPk('5');
		$variables->VAR_valor='0';
		
		if($variables->save())
			$this->redirect(array('index'));
		

		
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

		if(isset($_POST['CuaNec']))
		{
			$model->attributes=$_POST['CuaNec'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->IDCUANEC));
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

		
		if(!Yii::app()->user->checkAccess("abastecimiento") && !Yii::app()->user->checkAccess("administrador")){
			$this->redirect(array('admin'));
		}
		
		$model=new CuaNec;


		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CuaNec']))
		{
			$variables=new Variables;
			$variables=Variables::model()->findByPk('5');
			$variables->VAR_valor='1';						
			if($variables->save()){
				$model->attributes=$_POST['CuaNec'];
				if($model->save()){
					$actual=Variables::model()->findByPk('6');
					$actual->VAR_valor=$model->IDCUANEC;
					$actual->save();
					$this->redirect(array('index'));
				}
					
			}


		}

		$this->render('index',array(
			'model'=>$model,
		));


	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{

		Yii::app()->user->setState('site_id', 0);
		Yii::app()->user->setState('arrays',null);
		$model=new Requerimiento('search');
		$model->unsetAttributes();  // clear any default values
		//para la accion admin, solo le cree esto, si el idusuario es diferente del admin, los filtro; sino que se muestren todos
		if (!Yii::app()->user->checkAccess("abastecimiento") && !Yii::app()->user->checkAccess("administrador")) {
			$model->IDUSUARIO = Yii::app()->user->getState('idusuario');
		}
		$model->REQ_estado='Necesitado';
		if(isset($_GET['Requerimiento']))
			$model->attributes=$_GET['Requerimiento'];
		
		if(Variables::model()->findByPk(5)->VAR_valor=='0' && (Yii::app()->user->checkAccess("usuario") || Yii::app()->user->checkAccess("almacen")) )
			throw new CHttpException(403,'Aun no se ha autorizó el cuadro de necesidades!!');

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
		if(isset($_POST['ajax']) && $_POST['ajax']==='cua-nec-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
