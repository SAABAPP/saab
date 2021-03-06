<?php

/**
 * This is the model class for table "pecosa_bien".
 *
 * The followings are the available columns in table 'pecosa_bien':
 * @property integer $IDPECOSABIEN
 * @property integer $PBI_cantidad
 * @property integer $IDPECOSA
 * @property integer $IDBIEN
 * @property double $PBI_precioVenta
 *
 * The followings are the available model relations:
 * @property Kardex[] $kardexes
 * @property Kardex[] $kardexes1
 * @property Pecosa $iDPECOSA
 * @property Bien $iDBIEN
 */
class PecosaBien extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PecosaBien the static model class
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
		return 'pecosa_bien';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('PBI_cantidad, IDPECOSA, IDBIEN', 'required'),
			array('PBI_cantidad, IDPECOSA, IDBIEN', 'numerical', 'integerOnly'=>true),
			array('PBI_precioVenta', 'numerical'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('IDPECOSABIEN, PBI_cantidad, IDPECOSA, IDBIEN, PBI_precioVenta', 'safe', 'on'=>'search'),
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
			'kardexes' => array(self::HAS_MANY, 'Kardex', 'IDPECOSABIEN'),
			'kardexes1' => array(self::HAS_MANY, 'Kardex', 'IDPECOSA'),
			'iDPECOSA' => array(self::BELONGS_TO, 'Pecosa', 'IDPECOSA'),
			'iDBIEN' => array(self::BELONGS_TO, 'Bien', 'IDBIEN'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IDPECOSABIEN' => 'Idpecosabien',
			'PBI_cantidad' => 'Pbi Cantidad',
			'IDPECOSA' => 'Idpecosa',
			'IDBIEN' => 'Idbien',
			'PBI_precioVenta' => 'Pbi Precio Compra',
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

		$criteria->compare('IDPECOSABIEN',$this->IDPECOSABIEN);
		$criteria->compare('PBI_cantidad',$this->PBI_cantidad);
		$criteria->compare('IDPECOSA',$this->IDPECOSA);
		$criteria->compare('IDBIEN',$this->IDBIEN);
		$criteria->compare('PBI_precioVenta',$this->PBI_precioVenta);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}