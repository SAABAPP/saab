<?php

/**
 * This is the model class for table "requerimiento_bien".
 *
 * The followings are the available columns in table 'requerimiento_bien':
 * @property integer $RBI_cantidad
 * @property integer $IDREQUERIMIENTO
 * @property integer $IDBIEN
 * @property integer $RBI_cantidadComprar
 */
class RequerimientoBien extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return RequerimientoBien the static model class
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
		return 'requerimiento_bien';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('RBI_cantidad, IDREQUERIMIENTO, IDBIEN', 'required'),
			array('RBI_cantidad, IDREQUERIMIENTO, IDBIEN, RBI_cantidadComprar', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('RBI_cantidad, IDREQUERIMIENTO, IDBIEN, RBI_cantidadComprar', 'safe', 'on'=>'search'),
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
			'bien' => array(self::BELONGS_TO, 'Bien', 'IDBIEN'),
			'requerimiento' => array(self::BELONGS_TO, 'Requerimiento', 'IDREQUERIMIENTO'),
		);
	}
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'RBI_cantidad' => 'Cantidad',
			'IDREQUERIMIENTO' => 'Id requerimiento',
			'IDBIEN' => 'Id bien',
			'RBI_cantidadComprar' => 'Cantidad a Comprar',
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

		$criteria->compare('RBI_cantidad',$this->RBI_cantidad);
		$criteria->compare('IDREQUERIMIENTO',$this->IDREQUERIMIENTO);
		$criteria->compare('IDBIEN',$this->IDBIEN);
		// $criteria->compare('RBI_cantidadComprar',$this->RBI_cantidadComprar);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}