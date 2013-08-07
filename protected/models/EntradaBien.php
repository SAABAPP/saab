<?php

/**
 * This is the model class for table "entrada_bien".
 *
 * The followings are the available columns in table 'entrada_bien':
 * @property integer $IDENTRADABIEN
 * @property integer $EBI_cantidad
 * @property string $EBI_precioCompra
 * @property integer $IDBIEN
 * @property integer $IDENTRADA
 *
 * The followings are the available model relations:
 * @property Bien $iDBIEN
 * @property Entrada $iDENTRADA
 * @property Kardex[] $kardexes
 * @property Kardex[] $kardexes1
 */
class EntradaBien extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return EntradaBien the static model class
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
		return 'entrada_bien';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('EBI_cantidad, EBI_precioCompra, IDBIEN, IDENTRADA', 'required'),
			array('EBI_cantidad, IDBIEN, IDENTRADA', 'numerical', 'integerOnly'=>true),
			array('EBI_precioCompra', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('IDENTRADABIEN, EBI_cantidad, EBI_precioCompra, IDBIEN, IDENTRADA', 'safe', 'on'=>'search'),
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
			'iDBIEN' => array(self::BELONGS_TO, 'Bien', 'IDBIEN'),
			'iDENTRADA' => array(self::BELONGS_TO, 'Entrada', 'IDENTRADA'),
			'kardexes' => array(self::HAS_MANY, 'Kardex', 'IDENTRADABIEN'),
			'kardexes1' => array(self::HAS_MANY, 'Kardex', 'IDENTRADA'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IDENTRADABIEN' => 'Identradabien',
			'EBI_cantidad' => 'Ebi Cantidad',
			'EBI_precioCompra' => 'Ebi Precio Compra',
			'IDBIEN' => 'Idbien',
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

		$criteria->compare('IDENTRADABIEN',$this->IDENTRADABIEN);
		$criteria->compare('EBI_cantidad',$this->EBI_cantidad);
		$criteria->compare('EBI_precioCompra',$this->EBI_precioCompra,true);
		$criteria->compare('IDBIEN',$this->IDBIEN);
		$criteria->compare('IDENTRADA',$this->IDENTRADA);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}