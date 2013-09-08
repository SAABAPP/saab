<?php

/**
 * This is the model class for table "clasificador".
 *
 * The followings are the available columns in table 'clasificador':
 * @property string $CODIGOCLASIFICADOR
 * @property string $CLA_descripcion
 *
 * The followings are the available model relations:
 * @property CatalogoAcoCla[] $catalogoAcoClas
 */
class Clasificador extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Clasificador the static model class
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
		return 'clasificador';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CODIGOCLASIFICADOR, CLA_descripcion', 'required'),
			array('CODIGOCLASIFICADOR', 'length', 'max'=>20),
			array('CLA_descripcion', 'length', 'max'=>150),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('CODIGOCLASIFICADOR, CLA_descripcion', 'safe', 'on'=>'search'),
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
			'catalogoAcoClas' => array(self::HAS_MANY, 'CatalogoAcoCla', 'CODIGOCLASIFICADOR'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'CODIGOCLASIFICADOR' => 'Nº clasificador',
			'CLA_descripcion' => 'Descripcion',
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

		$criteria->compare('CODIGOCLASIFICADOR',$this->CODIGOCLASIFICADOR,true);
		$criteria->compare('CLA_descripcion',$this->CLA_descripcion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}