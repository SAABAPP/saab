<?php

/**
 * This is the model class for table "variables".
 *
 * The followings are the available columns in table 'variables':
 * @property integer $IDVARIABLE
 * @property string $VAR_descripcion
 * @property string $VAR_valor
 */
class Variables extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Variables the static model class
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
		return 'variables';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('VAR_descripcion, VAR_valor', 'required'),
			array('VAR_descripcion', 'length', 'max'=>150),
			array('VAR_valor', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('IDVARIABLE, VAR_descripcion, VAR_valor', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IDVARIABLE' => 'Nº variable',
			'VAR_descripcion' => 'Descripcion',
			'VAR_valor' => 'Valor',
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

		$criteria->compare('IDVARIABLE',$this->IDVARIABLE);
		$criteria->compare('VAR_descripcion',$this->VAR_descripcion,true);
		$criteria->compare('VAR_valor',$this->VAR_valor,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}