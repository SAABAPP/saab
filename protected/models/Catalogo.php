<?php

/**
 * This is the model class for table "catalogo".
 *
 * The followings are the available columns in table 'catalogo':
 * @property integer $IDCATALOGO
 * @property string $CAT_descripcion
 * @property string $CAT_codigo
 * @property string $CAT_unidad
 *
 * The followings are the available model relations:
 * @property Bien[] $biens
 * @property CatalogoAcoCla[] $catalogoAcoClas
 * @property Servicio[] $servicios
 */
class Catalogo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Catalogo the static model class
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
		return 'catalogo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CAT_descripcion, CAT_codigo, CAT_unidad', 'required'),
			array('CAT_descripcion', 'length', 'max'=>150),
			array('CAT_codigo', 'length', 'max'=>20),
			array('CAT_unidad', 'length', 'max'=>25),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('IDCATALOGO, CAT_descripcion, CAT_codigo, CAT_unidad', 'safe', 'on'=>'search'),
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
			'biens' => array(self::HAS_MANY, 'Bien', 'IDCATALOGO'),
			'catalogoAcoClas' => array(self::HAS_MANY, 'CatalogoAcoCla', 'IDCATALOGO'),
			'servicios' => array(self::HAS_MANY, 'Servicio', 'IDCATALOGO'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IDCATALOGO' => 'Idcatalogo',
			'CAT_descripcion' => 'Bien',
			'CAT_codigo' => 'Código',
			'CAT_unidad' => 'Unidad',
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

		$criteria->compare('IDCATALOGO',$this->IDCATALOGO);
		$criteria->compare('CAT_descripcion',$this->CAT_descripcion,true);
		$criteria->compare('CAT_codigo',$this->CAT_codigo,true);
		$criteria->compare('CAT_unidad',$this->CAT_unidad,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}