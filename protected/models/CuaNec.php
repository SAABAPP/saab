<?php

/**
 * This is the model class for table "cua_nec".
 *
 * The followings are the available columns in table 'cua_nec':
 * @property integer $IDCUANEC
 * @property string $CNE_anio
 *
 * The followings are the available model relations:
 * @property Requerimiento[] $requerimientos
 */
class CuaNec extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CuaNec the static model class
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
		return 'cua_nec';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CNE_anio', 'required'),
			array('CNE_anio', 'length', 'max'=>4),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('IDCUANEC, CNE_anio', 'safe', 'on'=>'search'),
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
			'requerimientos' => array(self::HAS_MANY, 'Requerimiento', 'IDCUANEC'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IDCUANEC' => 'Idcuanec',
			'CNE_anio' => 'Año',
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

		$criteria->compare('IDCUANEC',$this->IDCUANEC);
		$criteria->compare('CNE_anio',$this->CNE_anio,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}