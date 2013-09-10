<?php

/**
 * This is the model class for table "requerimiento_servicio".
 *
 * The followings are the available columns in table 'requerimiento_servicio':
 * @property string $RSE_detalle
 * @property integer $IDREQUERIMIENTO
 * @property integer $IDSERVICIO
 */
class RequerimientoServicio extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return RequerimientoServicio the static model class
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
		return 'requerimiento_servicio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('IDREQUERIMIENTO, IDSERVICIO', 'required'),
			array('IDREQUERIMIENTO, IDSERVICIO', 'numerical', 'integerOnly'=>true),
			array('RSE_detalle', 'length', 'max'=>150),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('RSE_detalle, IDREQUERIMIENTO, IDSERVICIO', 'safe', 'on'=>'search'),
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
			'servicio' => array(self::BELONGS_TO, 'Servicio', 'IDSERVICIO'),
			'requerimiento' => array(self::BELONGS_TO, 'Requerimiento', 'IDREQUERIMIENTO'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'RSE_detalle' => 'Rse Detalle',
			'IDREQUERIMIENTO' => 'Idrequerimiento',
			'IDSERVICIO' => 'Idservicio',
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

		$criteria->compare('RSE_detalle',$this->RSE_detalle,true);
		$criteria->compare('IDREQUERIMIENTO',$this->IDREQUERIMIENTO);
		$criteria->compare('IDSERVICIO',$this->IDSERVICIO);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}