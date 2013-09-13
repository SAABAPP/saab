<?php

/**
 * This is the model class for table "orden_compra".
 *
 * The followings are the available columns in table 'orden_compra':
 * @property integer $IDORDENCOMPRA
 * @property integer $IDREQUERIMIENTO
 * @property string $TIPO
 *
 * The followings are the available model relations:
 * @property DetalleOrdenCompra[] $detalleOrdenCompras
 * @property EntradaOc[] $entradaOcs
 * @property Requerimiento $iDREQUERIMIENTO
 */
class OrdenCompra extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return OrdenCompra the static model class
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
		return 'orden_compra';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('IDREQUERIMIENTO, TIPO', 'required'),
			array('IDREQUERIMIENTO', 'numerical', 'integerOnly'=>true),
			array('TIPO', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('IDORDENCOMPRA, IDREQUERIMIENTO, TIPO', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'detalleOrdenCompras' => array(self::HAS_MANY, 'DetalleOrdenCompra', 'IDORDENCOMPRA'),
			'entradaOcs' => array(self::HAS_MANY, 'EntradaOc', 'IDORDENCOMPRA'),
			'iDREQUERIMIENTO' => array(self::BELONGS_TO, 'Requerimiento', 'IDREQUERIMIENTO'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IDORDENCOMPRA' => 'N° de Orden',
			'IDREQUERIMIENTO' => 'N° de Requerimiento',
			'TIPO' => 'Tipo',
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

		$criteria->compare('IDORDENCOMPRA',$this->IDORDENCOMPRA);
		$criteria->compare('IDREQUERIMIENTO',$this->IDREQUERIMIENTO);
		$criteria->compare('TIPO',$this->TIPO,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}