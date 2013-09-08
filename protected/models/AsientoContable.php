<?php

/**
 * This is the model class for table "asiento_contable".
 *
 * The followings are the available columns in table 'asiento_contable':
 * @property string $CODIGOCONTABLE
 * @property string $ACO_descripcion
 *
 * The followings are the available model relations:
 * @property CatalogoAcoCla[] $catalogoAcoClas
 */
class AsientoContable extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AsientoContable the static model class
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
		return 'asiento_contable';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CODIGOCONTABLE, ACO_descripcion', 'required'),
			array('CODIGOCONTABLE', 'length', 'max'=>20),
			array('ACO_descripcion', 'length', 'max'=>150),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('CODIGOCONTABLE, ACO_descripcion', 'safe', 'on'=>'search'),
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
			'catalogoAcoClas' => array(self::HAS_MANY, 'CatalogoAcoCla', 'CODIGOCONTABLE'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'CODIGOCONTABLE' => 'Codigocontable',
			'ACO_descripcion' => 'Descripcion',
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

		$criteria->compare('CODIGOCONTABLE',$this->CODIGOCONTABLE,true);
		$criteria->compare('ACO_descripcion',$this->ACO_descripcion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}