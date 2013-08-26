<?php

/**
 * This is the model class for table "requerimiento".
 *
 * The followings are the available columns in table 'requerimiento':
 * @property integer $IDREQUERIMIENTO
 * @property string $REQ_estado
 * @property string $REQ_fecha
 * @property integer $REQ_presupuesto
 * @property integer $IDUSUARIO
 * @property integer $CODMETA
 * @property integer $IDCUANEC
 *
 * The followings are the available model relations:
 * @property OrdenCompra[] $ordenCompras
 * @property Pecosa[] $pecosas
 * @property CuaNec $iDCUANEC
 * @property Usuario $iDUSUARIO
 * @property Meta $cODMETA
 * @property Bien[] $biens
 * @property Servicio[] $servicios
 */
class Requerimiento extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Requerimiento the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'requerimiento';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('REQ_estado, REQ_fecha, IDUSUARIO, CODMETA', 'required'),
			array('REQ_presupuesto, IDUSUARIO, CODMETA, IDCUANEC', 'numerical', 'integerOnly'=>true),
			array('REQ_estado', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('IDREQUERIMIENTO, REQ_estado, REQ_fecha, REQ_presupuesto, IDUSUARIO, CODMETA, IDCUANEC', 'safe', 'on'=>'search'),
		);
	}
	public function validacion(){
		$this->addError('Debe ingresar algun bien');
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'ordenCompras' => array(self::HAS_MANY, 'OrdenCompra', 'IDREQUERIMIENTO'),
			'pecosas' => array(self::HAS_MANY, 'Pecosa', 'IDREQUERIMIENTO'),
			'iDCUANEC' => array(self::BELONGS_TO, 'CuaNec', 'IDCUANEC'),
			'iDUSUARIO' => array(self::BELONGS_TO, 'Usuario', 'IDUSUARIO'),
			'cODMETA' => array(self::BELONGS_TO, 'Meta', 'CODMETA'),
			'biens' => array(self::MANY_MANY, 'Bien', 'requerimiento_bien(IDREQUERIMIENTO, IDBIEN)'),
			'servicios' => array(self::MANY_MANY, 'Servicio', 'requerimiento_servicio(IDREQUERIMIENTO, IDSERVICIO)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IDREQUERIMIENTO' => 'Nº',
			'REQ_estado' => 'Estado',
			'REQ_fecha' => 'Fecha',
			'REQ_presupuesto' => 'Presupuesto',
			'IDUSUARIO' => 'Idusuario',
			'CODMETA' => 'Meta',
			'IDCUANEC' => 'Cuadro Necesidades',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('IDREQUERIMIENTO',$this->IDREQUERIMIENTO);
		$criteria->compare('REQ_estado',$this->REQ_estado,true);
		$criteria->compare('REQ_fecha',$this->REQ_fecha,true);
		$criteria->compare('REQ_presupuesto',$this->REQ_presupuesto);
		$criteria->compare('IDUSUARIO',$this->IDUSUARIO);
		$criteria->compare('CODMETA',$this->CODMETA);
		$criteria->compare('IDCUANEC',$this->IDCUANEC);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
			    'defaultOrder'=>'IDREQUERIMIENTO DESC',
			  )
		));
	}
	public function crearTexto(){
		return "<form><input type=\"text\" value=\"\"></form>";
		// ".$data->RBI_cantidad."
	}
}