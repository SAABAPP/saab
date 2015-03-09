<?php
error_reporting(E_ALL ^ E_NOTICE);
class ApiController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    // public $layout='//layouts/column2';
    private $format = 'json';


    private $uri=null;
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
                'actions'=>array('index','admin','create','view','update','list'),
                'expression'=>'Yii::app()->user->checkAccess("administrador")',
                ),
            array('allow', 
                'actions'=>array('buscaCatalogo'),
                'users'=>array('*'),
                ),
            );
    }

    public function uri($i){

        $url=Yii::app()->request->url;

        $uri = explode("/", $url);

        return $uri[$i];
    }


    public function actionIndex()
    {
        $model=ucfirst($this->uri(4));

        $called=$_SERVER['REQUEST_METHOD'];

        switch ($called) {
            case 'GET':
                if ($this->uri(6)) {
                    $this->actionList($model,$this->uri(6)); 
                }else{
                    if ($this->uri(5)) {
                        $this->actionView($model,$this->uri(5));
                    }
                    else{                        
                       $this->actionList($model,null); 
                    }
                    
                }
                
                
                break;

            case 'POST':

                    $requestBody = Yii::app()->request->getRawBody();

                    $parsedRequest = CJSON::decode($requestBody);
                  
                    $this->actionCreate($model,$parsedRequest);
                
                break;
            case 'PUT':

                $requestBody = Yii::app()->request->getRawBody();

                $parsedRequest = CJSON::decode($requestBody);
              
                $this->actionUpdate($model,$this->uri(5),$parsedRequest);
            case 'DELETE':
              
                $this->actionDelete($model,$this->uri(5));
            
            break;
            default:
                break;
        }
    }


    private function actionList($model,$filter)
    {   
        
        // $this->_checkAuth();
        
        $model=ucfirst($this->uri(4));
        $criteria = new CDbCriteria;

        if ($filter!=null) {
            $condition=$this->uri(5);
            if ( preg_match( '/_like/',$condition,$matches)){
                $condition=explode("_like",$condition); 
                $filter=$condition[0]." LIKE '%".$filter."%'";
                $criteria->condition=$filter;
            }else{
                $filter=$condition."='".$filter."'";
                $criteria->condition=$filter;
            }
            
        }
        
        $criteria->limit = 1000;
        $models=  $model::model()->findAll($criteria);


        if(is_null($models)) {
             $this->_sendResponse(200, sprintf('No items where found for model <b>%s</b>', $_GET['model']) );
        } else {
             $rows = array();
             foreach($models as $model){
                $rows[] = $model->attributes;
             }
                 

             $this->_sendResponse(200, CJSON::encode($rows));
        }
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    private function actionView($model,$id)
    {
        // Check if id was submitted via GET
        // if(!isset($_GET['id']))
        //     $this->_sendResponse(500, 'Error: Parameter <b>id</b> is missing' );

        $model = $model::model()->findByPk($id);

        // switch($_GET['model'])
        // {
        //     // Find respective model    
        //     case 'posts': // {{{ 
        //         $model = Post::model()->findByPk($_GET['id']);
        //         break; // }}} 
        //     default: // {{{ 
        //         $this->_sendResponse(501, sprintf('Mode <b>view</b> is not implemented for model <b>%s</b>',$_GET['model']) );
        //         exit; // }}} 
        // }
        if(is_null($model)) {
            $this->_sendResponse(404, 'No Item found with id '.$_GET['id']);
        } else {
            $this->_sendResponse(200, $this->_getObjectEncoded($_GET['model'], $model->attributes));
        }
    }

    // }}} 
    // {{{ actionCreate
    /**
     * Creates a new item
     * 
     * @access public
     * @return void
     */
    private function actionCreate($model,$attributes)
    {
        // $this->_checkAuth();

        $model = new $model();  

        // switch($_GET['model'])
        // {
        //     // Get an instance of the respective model
        //     case 'posts': // {{{ 
        //         $model = new Post;                    
        //         break; // }}} 
        //     default: // {{{ 
        //         $this->_sendResponse(501, sprintf('Mode <b>create</b> is not implemented for model <b>%s</b>',$_GET['model']) );
        //         exit; // }}} 
        // }
        // Try to assign POST values to attributes
        // $_POST=$attributes;

        foreach($attributes as $var=>$value) {
            
            if($model->hasAttribute($var)) {
                $model->$var = $value;
            } else {
                // No, raise an error
                $this->_sendResponse(500, sprintf('Parameter <b>%s</b> is not allowed for model <b>%s</b>', $var, $_GET['model']) );
            }

        }

        // Try to save the model
        if($model->save()) {
            // Saving was OK
            $this->_sendResponse(200, $this->_getObjectEncoded($_GET['model'], $model->attributes) );
        } else {
            // Errors occurred
            $msg = "<h1>Error</h1>";
            $msg .= sprintf("Couldn't create model <b>%s</b>", $_GET['model']);
            $msg .= "<ul>";
            foreach($model->errors as $attribute=>$attr_errors) {
                $msg .= "<li>Attribute: $attribute</li>";
                $msg .= "<ul>";
                foreach($attr_errors as $attr_error) {
                    $msg .= "<li>$attr_error</li>";
                }        
                $msg .= "</ul>";
            }
            $msg .= "</ul>";
            $this->_sendResponse(500, $msg );
        }

        // var_dump($_REQUEST);
    } // }}}     
    // {{{ actionUpdate
    /**
     * Update a single iten
     * 
     * @access public
     * @return void
     */
    private function actionUpdate($model,$id,$put_vars)
    {
        // $this->_checkAuth();

        // Get PUT parameters
        // parse_str(file_get_contents('php://input'), $put_vars);

        $model = $model::model()->findByPk($id);    

        // switch($_GET['model'])
        // {
        //     // Find respective model
        //     case 'posts': // {{{ 
                                
        //         break; // }}} 
        //     default: // {{{ 
        //         $this->_sendResponse(501, sprintf('Error: Mode <b>update</b> is not implemented for model <b>%s</b>',$_GET['model']) );
        //         exit; // }}} 
        // }

        if(is_null($model))
            $this->_sendResponse(400, sprintf("Error: Didn't find any model <b>%s</b> with ID <b>%s</b>.",$_GET['model'], $_GET['id']) );
        
        // Try to assign PUT parameters to attributes
        foreach($put_vars as $var=>$value) {
            // Does model have this attribute?
            if($model->hasAttribute($var)) {
                $model->$var = $value;
            } 
            // else {
            //     // No, raise error
            //     $this->_sendResponse(500, sprintf('Parameter <b>%s</b> is not allowed for model <b>%s</b>', $var, $_GET['model']) );
            // }
        }
        // Try to save the model
        if($model->save()) {
            $this->_sendResponse(200, $this->_getObjectEncoded($_GET['model'], $model->attributes) );
        } else {
            $msg = "<h1>Error</h1>";
            $msg .= sprintf("Couldn't update model <b>%s</b>", $_GET['model']);
            $msg .= "<ul>";
            foreach($model->errors as $attribute=>$attr_errors) {
                $msg .= "<li>Attribute: $attribute</li>";
                $msg .= "<ul>";
                foreach($attr_errors as $attr_error) {
                    $msg .= "<li>$attr_error</li>";
                }        
                $msg .= "</ul>";
            }
            $msg .= "</ul>";
            $this->_sendResponse(500, $msg );
        }
    } // }}} 
    // {{{ actionDelete
    /**
     * Deletes a single item
     * 
     * @access public
     * @return void
     */
    private function actionDelete($model,$id)
    {
        // $this->_checkAuth();

        $model = $model::model()->findByPk($id);   

        // switch($_GET['model'])
        // {
        //     // Load the respective model
        //     case 'posts': // {{{ 
        //         $model = Post::model()->findByPk($_GET['id']);                    
        //         break; // }}} 
        //     default: // {{{ 
        //         $this->_sendResponse(501, sprintf('Error: Mode <b>delete</b> is not implemented for model <b>%s</b>',$_GET['model']) );
        //         exit; // }}} 
        // }
        // Was a model found?
        if(is_null($model)) {
            // No, raise an error
            $this->_sendResponse(400, sprintf("Error: Didn't find any model <b>%s</b> with ID <b>%s</b>.",$_GET['model'], $_GET['id']) );
        }

        // Delete the model
        $num = $model->delete();
        if($num>0)
            echo 1;
        else
            $this->_sendResponse(500, sprintf("Error: Couldn't delete model <b>%s</b> with ID <b>%s</b>.",$_GET['model'], $_GET['id']) );
    }

    /**
     * Lists all models.
     */


    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model=new Bien('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Bien']))
            $model->attributes=$_GET['Bien'];

        $this->render('admin',array(
            'model'=>$model,
        ));
    }

    public function actionBusca($model)
    {
        $q=trim($_GET['term']);

        if (isset($q)) {
            $condicion = new CDbCriteria;
            $condicion->condition = "CAT_descripcion LIKE '%". $q ."%'  order by CAT_descripcion";
            $condicion->limit = 10; 
            $models=  $model::model()->findAll($condicion);


            $rows = array();
            foreach($models as $model)
                $rows[] = $model->attributes;

            $this->_sendResponse(200, CJSON::encode($rows));

            // if (!empty($catalogoBienes)) {
            //     $returnVal = '';
            //     $salida = array();
            //     foreach ($catalogoBienes as $p) {
            //         $salida[] = array(
            //             'label'=>$p->CAT_descripcion,
            //             'idCatalogo' => $p->IDCATALOGO,  
            //             );
            //     }
            //     echo CJSON::encode($salida);
            //     Yii::app()->end();
            // }
        }
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Bien the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model=Bien::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Bien $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='bien-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    private function _sendResponse($status = 200, $body = '', $content_type = 'application/json')
    {
        $status_header = 'HTTP/1.1 ' . $status . ' ' . $this->_getStatusCodeMessage($status);
        // set the status
        header($status_header);
        // set the content type
        header('Content-type: ' . $content_type);

        // pages with body are easy
        if($body != '')
        {
            // send the body
            echo $body;
            exit;
        }
        // we need to create the body if none is passed
        else
        {
            // create some body messages
            $message = '';

            // this is purely optional, but makes the pages a little nicer to read
            // for your users.  Since you won't likely send a lot of different status codes,
            // this also shouldn't be too ponderous to maintain
            switch($status)
            {
                case 401:
                    $message = 'You must be authorized to view this page.';
                    break;
                case 404:
                    $message = 'The requested URL ' . $_SERVER['REQUEST_URI'] . ' was not found.';
                    break;
                case 500:
                    $message = 'The server encountered an error processing your request.';
                    break;
                case 501:
                    $message = 'The requested method is not implemented.';
                    break;
            }

            // servers don't always have a signature turned on (this is an apache directive "ServerSignature On")
            $signature = ($_SERVER['SERVER_SIGNATURE'] == '') ? $_SERVER['SERVER_SOFTWARE'] . ' Server at ' . $_SERVER['SERVER_NAME'] . ' Port ' . $_SERVER['SERVER_PORT'] : $_SERVER['SERVER_SIGNATURE'];

            // this should be templatized in a real-world solution
            $body = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
                        <html>
                            <head>
                                <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
                                <title>' . $status . ' ' . $this->_getStatusCodeMessage($status) . '</title>
                            </head>
                            <body>
                                <h1>' . $this->_getStatusCodeMessage($status) . '</h1>
                                <p>' . $message . '</p>
                                <hr />
                                <address>' . $signature . '</address>
                            </body>
                        </html>';

            echo $body;
            exit;
        }
    } 

    private function _getStatusCodeMessage($status)
    {
        // these could be stored in a .ini file and loaded
        // via parse_ini_file()... however, this will suffice
        // for an example
        $codes = Array(
            100 => 'Continue',
            101 => 'Switching Protocols',
            200 => 'OK',
            201 => 'Created',
            202 => 'Accepted',
            203 => 'Non-Authoritative Information',
            204 => 'No Content',
            205 => 'Reset Content',
            206 => 'Partial Content',
            300 => 'Multiple Choices',
            301 => 'Moved Permanently',
            302 => 'Found',
            303 => 'See Other',
            304 => 'Not Modified',
            305 => 'Use Proxy',
            306 => '(Unused)',
            307 => 'Temporary Redirect',
            400 => 'Bad Request',
            401 => 'Unauthorized',
            402 => 'Payment Required',
            403 => 'Forbidden',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            406 => 'Not Acceptable',
            407 => 'Proxy Authentication Required',
            408 => 'Request Timeout',
            409 => 'Conflict',
            410 => 'Gone',
            411 => 'Length Required',
            412 => 'Precondition Failed',
            413 => 'Request Entity Too Large',
            414 => 'Request-URI Too Long',
            415 => 'Unsupported Media Type',
            416 => 'Requested Range Not Satisfiable',
            417 => 'Expectation Failed',
            500 => 'Internal Server Error',
            501 => 'Not Implemented',
            502 => 'Bad Gateway',
            503 => 'Service Unavailable',
            504 => 'Gateway Timeout',
            505 => 'HTTP Version Not Supported'
        );

        return (isset($codes[$status])) ? $codes[$status] : '';
    }

    private function _getObjectEncoded($model, $array)
    {
        if(isset($_GET['format']))
            $this->format = $_GET['format'];

        if($this->format=='json')
        {
            return CJSON::encode($array);
        }
        elseif($this->format=='xml')
        {
            $result = '<?xml version="1.0">';
            $result .= "\n<$model>\n";
            foreach($array as $key=>$value)
                $result .= "    <$key>".utf8_encode($value)."</$key>\n"; 
            $result .= '</'.$model.'>';
            return $result;
        }
        else
        {
            return;
        }
    }
}
