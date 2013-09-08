<?php

/**
 * This is the model class for table "catalogo_aco_cla".
 *
 * The followings are the available columns in table 'catalogo_aco_cla':
 * @property integer $IDCATALOGO
 * @property string $CODIGOCONTABLE
 * @property string $CODIGOCLASIFICADOR
 *
 * The followings are the available model relations:
 * @property Clasificador $cODIGOCLASIFICADOR
 * @property Catalogo $iDCATALOGO
 * @property AsientoContable $cODIGOCONTABLE
 */
class CatalogoAcoCla extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CatalogoAcoCla the static model class
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
		return 'catalogo_aco_cla';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('IDCATALOGO, CODIGOCONTABLE, CODIGOCLASIFICADOR', 'required'),
			array('IDCATALOGO', 'numerical', 'integerOnly'=>true),
			array('CODIGOCONTABLE, CODIGOCLASIFICADOR', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('IDCATALOGO, CODIGOCONTABLE, CODIGOCLASIFICADOR', 'safe', 'on'=>'search'),
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
			'cODIGOCLASIFICADOR' => array(self::BELONGS_TO, 'Clasificador', 'CODIGOCLASIFICADOR'),
			'iDCATALOGO' => array(self::BELONGS_TO, 'Catalogo', 'IDCATALOGO'),
			'cODIGOCONTABLE' => array(self::BELONGS_TO, 'AsientoContable', 'CODIGOCONTABLE'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IDCATALOGO' => 'Nº Catalogo',
			'CODIGOCONTABLE' => 'Codigoc ontable',
			'CODIGOCLASIFICADOR' => 'Codigo clasificador',
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
		$criteria->compare('CODIGOCONTABLE',$this->CODIGOCONTABLE,true);
		$criteria->compare('CODIGOCLASIFICADOR',$this->CODIGOCLASIFICADOR,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}