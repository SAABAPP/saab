<?php

/**
 * This is the model class for table "bien".
 *
 * The followings are the available columns in table 'bien':
 * @property integer $IDBIEN
 * @property integer $BIE_stockActual
 * @property integer $BIE_stockMinimo
 * @property string $BIE_caracteristica
 * @property string $BIE_marca
 * @property integer $IDCATALOGO
 *
 * The followings are the available model relations:
 * @property Catalogo $iDCATALOGO
 * @property EntradaBien[] $entradaBiens
 * @property PecosaBien[] $pecosaBiens
 * @property Requerimiento[] $requerimientos
 */
class Bien extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Bien the static model class
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
		return 'bien';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('BIE_stockActual, BIE_stockMinimo, BIE_caracteristica, BIE_marca, IDCATALOGO', 'required'),
			array('BIE_stockActual, BIE_stockMinimo, IDCATALOGO', 'numerical', 'integerOnly'=>true),
			array('BIE_caracteristica, BIE_marca', 'length', 'max'=>150),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('IDBIEN, BIE_stockActual, BIE_stockMinimo, BIE_caracteristica, BIE_marca, IDCATALOGO', 'safe', 'on'=>'search'),
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
			'iDCATALOGO' => array(self::BELONGS_TO, 'Catalogo', 'IDCATALOGO'),
			'entradaBiens' => array(self::HAS_MANY, 'EntradaBien', 'IDBIEN'),
			'pecosaBiens' => array(self::HAS_MANY, 'PecosaBien', 'IDBIEN'),
			'requerimientos' => array(self::MANY_MANY, 'Requerimiento', 'requerimiento_bien(IDBIEN, IDREQUERIMIENTO)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IDBIEN' => 'Idbien',
			'BIE_stockActual' => 'Stock Actual',
			'BIE_stockMinimo' => 'Stock Minimo',
			'BIE_caracteristica' => 'Características',
			'BIE_marca' => 'Marca',
			'IDCATALOGO' => 'Idcatalogo',
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

		$criteria->compare('IDBIEN',$this->IDBIEN);
		$criteria->compare('BIE_stockActual',$this->BIE_stockActual);
		$criteria->compare('BIE_stockMinimo',$this->BIE_stockMinimo);
		$criteria->compare('BIE_caracteristica',$this->BIE_caracteristica,true);
		$criteria->compare('BIE_marca',$this->BIE_marca,true);
		$criteria->compare('IDCATALOGO',$this->IDCATALOGO);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}