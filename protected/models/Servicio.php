<?php

/**
 * This is the model class for table "servicio".
 *
 * The followings are the available columns in table 'servicio':
 * @property integer $IDSERVICIO
 * @property string $SER_descripcion
 * @property integer $IDCATALOGO
 *
 * The followings are the available model relations:
 * @property Requerimiento[] $requerimientos
 * @property Catalogo $iDCATALOGO
 */
class Servicio extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Servicio the static model class
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
		return 'servicio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('SER_descripcion, IDCATALOGO', 'required'),
			array('IDCATALOGO', 'numerical', 'integerOnly'=>true),
			array('SER_descripcion', 'length', 'max'=>150),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('IDSERVICIO, SER_descripcion, IDCATALOGO', 'safe', 'on'=>'search'),
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
			'requerimientos' => array(self::MANY_MANY, 'Requerimiento', 'requerimiento_servicio(IDSERVICIO, IDREQUERIMIENTO)'),
			'iDCATALOGO' => array(self::BELONGS_TO, 'Catalogo', 'IDCATALOGO'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IDSERVICIO' => 'Idservicio',
			'SER_descripcion' => 'Ser Descripcion',
			'IDCATALOGO' => 'Idcatalogo',
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

		$criteria->compare('IDSERVICIO',$this->IDSERVICIO);
		$criteria->compare('SER_descripcion',$this->SER_descripcion,true);
		$criteria->compare('IDCATALOGO',$this->IDCATALOGO);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}