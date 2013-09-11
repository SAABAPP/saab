<?php

/**
 * This is the model class for table "personal".
 *
 * The followings are the available columns in table 'personal':
 * @property integer $IDPERSONAL
 * @property integer $PER_idResponsable
 * @property string $PER_dni
 * @property string $PER_nombres
 * @property string $PER_paterno
 * @property string $PER_materno
 * @property string $PER_sexo
 * @property string $PER_direccion
 * @property string $PER_telefono
 * @property string $PER_celular
 * @property string $PER_cargo
 * @property integer $PER_estado
 * @property integer $IDAREA
 *
 * The followings are the available model relations:
 * @property Area $iDAREA
 * @property Usuario[] $usuarios
 */
class Personal extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Personal the static model class
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
		return 'personal';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('PER_idResponsable, PER_dni, PER_nombres, PER_paterno, PER_materno, PER_sexo, PER_cargo, PER_estado', 'required'),
			array('PER_idResponsable, PER_estado, IDAREA', 'numerical', 'integerOnly'=>true),
			array('PER_dni', 'length', 'max'=>8),
			array('PER_nombres, PER_paterno, PER_materno, PER_direccion', 'length', 'max'=>150),
			array('PER_sexo', 'length', 'max'=>1),
			array('PER_telefono, PER_celular', 'length', 'max'=>12),
			array('PER_cargo', 'length', 'max'=>60),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('IDPERSONAL, PER_idResponsable, PER_dni, PER_nombres, PER_paterno, PER_materno, PER_sexo, PER_direccion, PER_telefono, PER_celular, PER_cargo, PER_estado, IDAREA', 'safe', 'on'=>'search'),
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
			'iDAREA' => array(self::BELONGS_TO, 'Area', 'IDAREA'),
			'usuarios' => array(self::HAS_MANY, 'Usuario', 'IDPERSONAL'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IDPERSONAL' => 'Id',
			'PER_idResponsable' => 'Responsable',
			'PER_dni' => 'Dni',
			'PER_nombres' => 'Nombres',
			'PER_paterno' => 'Paterno',
			'PER_materno' => 'Materno',
			'PER_sexo' => 'Sexo',
			'PER_direccion' => 'Direccion',
			'PER_telefono' => 'Telefono',
			'PER_celular' => 'Celular',
			'PER_cargo' => 'Cargo',
			'PER_estado' => 'Estado',
			'IDAREA' => 'Id Area',
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

		$criteria->compare('IDPERSONAL',$this->IDPERSONAL);
		$criteria->compare('PER_idResponsable',$this->PER_idResponsable);
		$criteria->compare('PER_dni',$this->PER_dni,true);
		$criteria->compare('PER_nombres',$this->PER_nombres,true);
		$criteria->compare('PER_paterno',$this->PER_paterno,true);
		$criteria->compare('PER_materno',$this->PER_materno,true);
		$criteria->compare('PER_sexo',$this->PER_sexo,true);
		$criteria->compare('PER_direccion',$this->PER_direccion,true);
		$criteria->compare('PER_telefono',$this->PER_telefono,true);
		$criteria->compare('PER_celular',$this->PER_celular,true);
		$criteria->compare('PER_cargo',$this->PER_cargo,true);
		$criteria->compare('PER_estado',$this->PER_estado);
		$criteria->compare('IDAREA',$this->IDAREA);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}