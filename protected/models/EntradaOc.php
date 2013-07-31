<?php

/**
 * This is the model class for table "entrada_oc".
 *
 * The followings are the available columns in table 'entrada_oc':
 * @property integer $IDENTRADA
 * @property integer $IDORDENCOMPRA
 *
 * The followings are the available model relations:
 * @property OrdenCompra $iDORDENCOMPRA
 * @property Entrada $iDENTRADA
 */
class EntradaOc extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return EntradaOc the static model class
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
		return 'entrada_oc';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('IDENTRADA', 'required'),
			array('IDENTRADA, IDORDENCOMPRA', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('IDENTRADA, IDORDENCOMPRA', 'safe', 'on'=>'search'),
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
			'iDORDENCOMPRA' => array(self::BELONGS_TO, 'OrdenCompra', 'IDORDENCOMPRA'),
			'iDENTRADA' => array(self::BELONGS_TO, 'Entrada', 'IDENTRADA'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IDENTRADA' => 'Identrada',
			'IDORDENCOMPRA' => 'Idordencompra',
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
		$criteria->compare('IDORDENCOMPRA',$this->IDORDENCOMPRA);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}