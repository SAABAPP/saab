<?php

/**
 * This is the model class for table "proveedor".
 *
 * The followings are the available columns in table 'proveedor':
 * @property integer $IDPROVEEDOR
 * @property string $PRO_razonSocial
 * @property string $PRO_ruc
 * @property string $PRO_rubro
 * @property string $PRO_ciudad
 * @property string $PRO_telefono
 * @property string $PRO_fax
 * @property string $PRO_direccion
 * @property string $PRO_banco
 * @property string $PRO_cci
 * @property string $PRO_contacto
 * @property string $PRO_celular
 *
 * The followings are the available model relations:
 * @property Cotizacion[] $cotizacions
 */
class Proveedor extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Proveedor the static model class
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
		return 'proveedor';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('PRO_razonSocial, PRO_ruc, PRO_contacto', 'required'),
			array('PRO_razonSocial, PRO_rubro, PRO_ciudad, PRO_direccion, PRO_banco, PRO_contacto', 'length', 'max'=>150),
			array('PRO_ruc', 'length', 'max'=>11),
			array('PRO_telefono, PRO_fax', 'length', 'max'=>12),
			array('PRO_cci, PRO_celular', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('IDPROVEEDOR, PRO_razonSocial, PRO_ruc, PRO_rubro, PRO_ciudad, PRO_telefono, PRO_fax, PRO_direccion, PRO_banco, PRO_cci, PRO_contacto, PRO_celular', 'safe', 'on'=>'search'),
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
			'cotizacions' => array(self::HAS_MANY, 'Cotizacion', 'IDPROVEEDOR'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IDPROVEEDOR' => 'Nº',
			'PRO_razonSocial' => 'Razon Social',
			'PRO_ruc' => 'Ruc',
			'PRO_rubro' => 'Rubro',
			'PRO_ciudad' => 'Ciudad',
			'PRO_telefono' => 'Telefono',
			'PRO_fax' => 'Fax',
			'PRO_direccion' => 'Direccion',
			'PRO_banco' => 'Banco',
			'PRO_cci' => 'Cci',
			'PRO_contacto' => 'Contacto',
			'PRO_celular' => 'Celular',
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

		$criteria->compare('IDPROVEEDOR',$this->IDPROVEEDOR);
		$criteria->compare('PRO_razonSocial',$this->PRO_razonSocial,true);
		$criteria->compare('PRO_ruc',$this->PRO_ruc,true);
		$criteria->compare('PRO_rubro',$this->PRO_rubro,true);
		$criteria->compare('PRO_ciudad',$this->PRO_ciudad,true);
		$criteria->compare('PRO_telefono',$this->PRO_telefono,true);
		$criteria->compare('PRO_fax',$this->PRO_fax,true);
		$criteria->compare('PRO_direccion',$this->PRO_direccion,true);
		$criteria->compare('PRO_banco',$this->PRO_banco,true);
		$criteria->compare('PRO_cci',$this->PRO_cci,true);
		$criteria->compare('PRO_contacto',$this->PRO_contacto,true);
		$criteria->compare('PRO_celular',$this->PRO_celular,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}