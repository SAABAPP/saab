<?php

/**
 * This is the model class for table "entrada".
 *
 * The followings are the available columns in table 'entrada':
 * @property integer $IDENTRADA
 * @property string $ENT_fecha
 * @property string $ENT_tipo
 *
 * The followings are the available model relations:
 * @property EntradaBien[] $entradaBiens
 * @property EntradaOc $entradaOc
 * @property Nea $nea
 */
class Entrada extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Entrada the static model class
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
		return 'entrada';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ENT_fecha, ENT_tipo', 'required'),
			array('ENT_tipo', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('IDENTRADA, ENT_fecha, ENT_tipo', 'safe', 'on'=>'search'),
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
			'entradaBiens' => array(self::HAS_MANY, 'EntradaBien', 'IDENTRADA'),
			'entradaOc' => array(self::HAS_ONE, 'EntradaOc', 'IDENTRADA'),
			'nea' => array(self::HAS_ONE, 'Nea', 'IDENTRADA'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IDENTRADA' => 'Nº',
			'ENT_fecha' => 'Fecha',
			'ENT_tipo' => 'Tipo',
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

		$criteria->compare('IDENTRADA',$this->IDENTRADA);
		$criteria->compare('ENT_fecha',$this->ENT_fecha,true);
		$criteria->compare('ENT_tipo',$this->ENT_tipo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}