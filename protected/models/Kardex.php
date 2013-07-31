<?php

/**
 * This is the model class for table "kardex".
 *
 * The followings are the available columns in table 'kardex':
 * @property integer $IDKARDEX
 * @property string $KAR_fechaMovimiento
 * @property string $KAR_detalle
 * @property integer $IDENTRADABIEN
 * @property integer $IDENTRADA
 * @property integer $IDPECOSABIEN
 * @property integer $IDPECOSA
 *
 * The followings are the available model relations:
 * @property PecosaBien $iDPECOSABIEN
 * @property PecosaBien $iDPECOSA
 * @property EntradaBien $iDENTRADABIEN
 * @property EntradaBien $iDENTRADA
 */
class Kardex extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Kardex the static model class
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
		return 'kardex';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('IDENTRADABIEN, IDENTRADA, IDPECOSABIEN, IDPECOSA', 'required'),
			array('IDENTRADABIEN, IDENTRADA, IDPECOSABIEN, IDPECOSA', 'numerical', 'integerOnly'=>true),
			array('KAR_detalle', 'length', 'max'=>150),
			array('KAR_fechaMovimiento', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('IDKARDEX, KAR_fechaMovimiento, KAR_detalle, IDENTRADABIEN, IDENTRADA, IDPECOSABIEN, IDPECOSA', 'safe', 'on'=>'search'),
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
			'iDPECOSABIEN' => array(self::BELONGS_TO, 'PecosaBien', 'IDPECOSABIEN'),
			'iDPECOSA' => array(self::BELONGS_TO, 'PecosaBien', 'IDPECOSA'),
			'iDENTRADABIEN' => array(self::BELONGS_TO, 'EntradaBien', 'IDENTRADABIEN'),
			'iDENTRADA' => array(self::BELONGS_TO, 'EntradaBien', 'IDENTRADA'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IDKARDEX' => 'Idkardex',
			'KAR_fechaMovimiento' => 'Kar Fecha Movimiento',
			'KAR_detalle' => 'Kar Detalle',
			'IDENTRADABIEN' => 'Identradabien',
			'IDENTRADA' => 'Identrada',
			'IDPECOSABIEN' => 'Idpecosabien',
			'IDPECOSA' => 'Idpecosa',
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

		$criteria->compare('IDKARDEX',$this->IDKARDEX);
		$criteria->compare('KAR_fechaMovimiento',$this->KAR_fechaMovimiento,true);
		$criteria->compare('KAR_detalle',$this->KAR_detalle,true);
		$criteria->compare('IDENTRADABIEN',$this->IDENTRADABIEN);
		$criteria->compare('IDENTRADA',$this->IDENTRADA);
		$criteria->compare('IDPECOSABIEN',$this->IDPECOSABIEN);
		$criteria->compare('IDPECOSA',$this->IDPECOSA);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}