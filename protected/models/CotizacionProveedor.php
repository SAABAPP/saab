<?php

/**
 * This is the model class for table "cotizacion_proveedor".
 *
 * The followings are the available columns in table 'cotizacion_proveedor':
 * @property string $CP_total
 * @property integer $IDPROVEEDOR
 * @property integer $IDCOTIZACION
 */
class CotizacionProveedor extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CotizacionProveedor the static model class
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
		return 'cotizacion_proveedor';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CP_total, IDPROVEEDOR, IDCOTIZACION', 'required'),
			array('IDPROVEEDOR, IDCOTIZACION', 'numerical', 'integerOnly'=>true),
			array('CP_total', 'length', 'max'=>18),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('CP_total, IDPROVEEDOR, IDCOTIZACION', 'safe', 'on'=>'search'),
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
			'cotizacion' => array(self::BELONGS_TO, 'Cotizacion', 'IDCOTIZACION'),
			'proveedor' => array(self::BELONGS_TO, 'Proveedor', 'IDPROVEEDOR'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'CP_total' => 'Cp Total',
			'IDPROVEEDOR' => 'Idproveedor',
			'IDCOTIZACION' => 'Idcotizacion',
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

		$criteria->compare('CP_total',$this->CP_total,true);
		$criteria->compare('IDPROVEEDOR',$this->IDPROVEEDOR);
		$criteria->compare('IDCOTIZACION',$this->IDCOTIZACION);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}