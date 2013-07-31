<?php

/**
 * This is the model class for table "detalle_nea".
 *
 * The followings are the available columns in table 'detalle_nea':
 * @property integer $IDDETNEA
 * @property string $DNE_tipoBien
 * @property string $DNE_monto
 * @property integer $IDENTRADA
 *
 * The followings are the available model relations:
 * @property Nea $iDENTRADA
 */
class DetalleNea extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DetalleNea the static model class
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
		return 'detalle_nea';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('DNE_tipoBien, DNE_monto, IDENTRADA', 'required'),
			array('IDENTRADA', 'numerical', 'integerOnly'=>true),
			array('DNE_tipoBien', 'length', 'max'=>150),
			array('DNE_monto', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('IDDETNEA, DNE_tipoBien, DNE_monto, IDENTRADA', 'safe', 'on'=>'search'),
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
			'iDENTRADA' => array(self::BELONGS_TO, 'Nea', 'IDENTRADA'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IDDETNEA' => 'Iddetnea',
			'DNE_tipoBien' => 'Dne Tipo Bien',
			'DNE_monto' => 'Dne Monto',
			'IDENTRADA' => 'Identrada',
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

		$criteria->compare('IDDETNEA',$this->IDDETNEA);
		$criteria->compare('DNE_tipoBien',$this->DNE_tipoBien,true);
		$criteria->compare('DNE_monto',$this->DNE_monto,true);
		$criteria->compare('IDENTRADA',$this->IDENTRADA);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}