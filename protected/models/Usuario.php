<?php

/**
 * This is the model class for table "usuario".
 *
 * The followings are the available columns in table 'usuario':
 * @property integer $IDUSUARIO
 * @property string $USU_usuario
 * @property string $USU_password
 * @property integer $IDPERSONAL
 *
 * The followings are the available model relations:
 * @property Pecosa[] $pecosas
 * @property Requerimiento[] $requerimientos
 * @property Personal $iDPERSONAL
 */
class Usuario extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Usuario the static model class
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
		return 'usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('USU_usuario, USU_password, IDPERSONAL', 'required'),
			array('IDPERSONAL', 'numerical', 'integerOnly'=>true),
			array('USU_usuario, USU_password', 'length', 'max'=>150),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('IDUSUARIO, USU_usuario, USU_password, IDPERSONAL', 'safe', 'on'=>'search'),
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
			'pecosas' => array(self::HAS_MANY, 'Pecosa', 'IDUSUARIO'),
			'requerimientos' => array(self::HAS_MANY, 'Requerimiento', 'IDUSUARIO'),
			'iDPERSONAL' => array(self::BELONGS_TO, 'Personal', 'IDPERSONAL'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IDUSUARIO' => 'Idusuario',
			'USU_usuario' => 'Usu Usuario',
			'USU_password' => 'Usu Password',
			'IDPERSONAL' => 'Idpersonal',
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

		$criteria->compare('IDUSUARIO',$this->IDUSUARIO);
		$criteria->compare('USU_usuario',$this->USU_usuario,true);
		$criteria->compare('USU_password',$this->USU_password,true);
		$criteria->compare('IDPERSONAL',$this->IDPERSONAL);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function validatePassword($password){
	 return $this->hashPassword($password)===$this->USU_password;
	}
	
	public function hashPassword($password)
	{
	 return md5($password);
	}
}