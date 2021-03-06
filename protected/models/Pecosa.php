<?php

/**
 * This is the model class for table "pecosa".
 *
 * The followings are the available columns in table 'pecosa':
 * @property integer $IDPECOSA
 * @property string $PEC_fecha
 * @property string $PEC_referencia
 * @property integer $IDUSUARIO
 * @property integer $IDREQUERIMIENTO
 * @property string $PEC_NroPecosa
 *
 * The followings are the available model relations:
 * @property Usuario $iDUSUARIO
 * @property Requerimiento $iDREQUERIMIENTO
 * @property PecosaBien[] $pecosaBiens
 */
class Pecosa extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Pecosa the static model class
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
		return 'pecosa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('PEC_fecha, PEC_NroPecosa', 'required'),
			array('IDUSUARIO, IDREQUERIMIENTO', 'numerical', 'integerOnly'=>true),
			array('PEC_referencia', 'length', 'max'=>150),
			array('PEC_NroPecosa', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('IDPECOSA, PEC_fecha, PEC_referencia, IDUSUARIO, IDREQUERIMIENTO, PEC_NroPecosa', 'safe', 'on'=>'search'),
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
			'iDUSUARIO' => array(self::BELONGS_TO, 'Usuario', 'IDUSUARIO'),
			'iDREQUERIMIENTO' => array(self::BELONGS_TO, 'Requerimiento', 'IDREQUERIMIENTO'),
			'pecosaBiens' => array(self::HAS_MANY, 'PecosaBien', 'IDPECOSA'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IDPECOSA' => 'ID',
			'PEC_fecha' => 'Fecha',
			'PEC_referencia' => 'Nº Documento Referencia:',
			'IDUSUARIO' => 'Idusuario',
			'IDREQUERIMIENTO' => 'Idrequerimiento',
			'PEC_NroPecosa' => 'Nº PECOSA',
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

		$criteria->compare('IDPECOSA',$this->IDPECOSA);
		$criteria->compare('PEC_fecha',$this->PEC_fecha,true);
		$criteria->compare('PEC_referencia',$this->PEC_referencia,true);
		$criteria->compare('IDUSUARIO',$this->IDUSUARIO);
		$criteria->compare('IDREQUERIMIENTO',$this->IDREQUERIMIENTO);
		$criteria->compare('PEC_NroPecosa',$this->PEC_NroPecosa,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}