<?php

/**
 * This is the model class for table "meta".
 *
 * The followings are the available columns in table 'meta':
 * @property integer $CODMETA
 * @property string $MET_descripcion
 *
 * The followings are the available model relations:
 * @property Requerimiento[] $requerimientos
 */
class Meta extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Meta the static model class
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
		return 'meta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CODMETA, MET_descripcion', 'required'),
			array('CODMETA', 'numerical', 'integerOnly'=>true),
			array('MET_descripcion', 'length', 'max'=>150),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('CODMETA, MET_descripcion', 'safe', 'on'=>'search'),
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
			'requerimientos' => array(self::HAS_MANY, 'Requerimiento', 'CODMETA'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'CODMETA' => 'Codmeta',
			'MET_descripcion' => 'Met Descripcion',
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

		$criteria->compare('CODMETA',$this->CODMETA);
		$criteria->compare('MET_descripcion',$this->MET_descripcion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}