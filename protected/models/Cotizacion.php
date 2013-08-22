<?php

/**
 * This is the model class for table "cotizacion".
 *
 * The followings are the available columns in table 'cotizacion':
 * @property integer $IDCOTIZACION
 * @property string $COT_total
 * @property integer $COT_buenaPro
 * @property integer $IDREQUERIMIENTO
 * @property integer $IDPROVEEDOR
 *
 * The followings are the available model relations:
 * @property Proveedor $iDPROVEEDOR
 * @property Requerimiento $iDREQUERIMIENTO
 */
class Cotizacion extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Cotizacion the static model class
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
		return 'cotizacion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('COT_total, COT_buenaPro, IDREQUERIMIENTO, IDPROVEEDOR', 'required'),
			array('COT_buenaPro, IDREQUERIMIENTO, IDPROVEEDOR', 'numerical', 'integerOnly'=>true),
			array('COT_total', 'length', 'max'=>18),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('IDCOTIZACION, COT_total, COT_buenaPro, IDREQUERIMIENTO, IDPROVEEDOR', 'safe', 'on'=>'search'),
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
			'iDPROVEEDOR' => array(self::BELONGS_TO, 'Proveedor', 'IDPROVEEDOR'),
			'iDREQUERIMIENTO' => array(self::BELONGS_TO, 'Requerimiento', 'IDREQUERIMIENTO'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IDCOTIZACION' => 'Idcotizacion',
			'COT_total' => 'Monto Total',
			'COT_buenaPro' => 'Buena Pro',
			'IDREQUERIMIENTO' => 'Idrequerimiento',
			'IDPROVEEDOR' => 'Idproveedor',
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

		$criteria->compare('IDCOTIZACION',$this->IDCOTIZACION);
		$criteria->compare('COT_total',$this->COT_total,true);
		$criteria->compare('COT_buenaPro',$this->COT_buenaPro);
		$criteria->compare('IDREQUERIMIENTO',$this->IDREQUERIMIENTO);
		$criteria->compare('IDPROVEEDOR',$this->IDPROVEEDOR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}