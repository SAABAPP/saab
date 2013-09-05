<?php

/**
 * This is the model class for table "nea".
 *
 * The followings are the available columns in table 'nea':
 * @property string $NEA_referencia
 * @property string $NEA_procedencia
 * @property integer $IDENTRADA
 *
 * The followings are the available model relations:
 * @property DetalleNea[] $detalleNeas
 * @property Entrada $iDENTRADA
 */
class Nea extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Nea the static model class
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
		return 'nea';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NEA_procedencia, IDENTRADA, NEA_referencia', 'required'),
			array('IDENTRADA', 'numerical', 'integerOnly'=>true),
			array('NEA_referencia, NEA_procedencia', 'length', 'max'=>150),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('NEA_referencia, NEA_procedencia, IDENTRADA', 'safe', 'on'=>'search'),
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
			'detalleNeas' => array(self::HAS_MANY, 'DetalleNea', 'IDENTRADA'),
			'iDENTRADA' => array(self::BELONGS_TO, 'Entrada', 'IDENTRADA'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'NEA_referencia' => 'Referencia',
			'NEA_procedencia' => 'Procedencia',
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

		$criteria->compare('NEA_referencia',$this->NEA_referencia,true);
		$criteria->compare('NEA_procedencia',$this->NEA_procedencia,true);
		$criteria->compare('IDENTRADA',$this->IDENTRADA);

		$criteria->order = 'IDENTRADA DESC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}