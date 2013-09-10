<?php

/**
 * This is the model class for table "detalle_orden_compra".
 *
 * The followings are the available columns in table 'detalle_orden_compra':
 * @property string $DOC_precioUnitario
 * @property string $DOC_marca
 * @property string $DOC_cantidad
 * @property string $DOC_caracteristica
 * @property integer $IDDETOC
 * @property integer $IDORDENCOMPRA
 * @property integer $DOC_bien
 *
 * The followings are the available model relations:
 * @property OrdenCompra $iDORDENCOMPRA
 */
class DetalleOrdenCompra extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DetalleOrdenCompra the static model class
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
		return 'detalle_orden_compra';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('DOC_precioUnitario, IDORDENCOMPRA, DOC_bien', 'required'),
			array('IDORDENCOMPRA, DOC_bien', 'numerical', 'integerOnly'=>true),
			array('DOC_precioUnitario', 'length', 'max'=>12),
			array('DOC_marca', 'length', 'max'=>150),
			array('DOC_cantidad, DOC_caracteristica', 'length', 'max'=>18),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('DOC_precioUnitario, DOC_marca, DOC_cantidad, DOC_caracteristica, IDDETOC, IDORDENCOMPRA, DOC_bien', 'safe', 'on'=>'search'),
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
			'iDORDENCOMPRA' => array(self::BELONGS_TO, 'OrdenCompra', 'IDORDENCOMPRA'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'DOC_precioUnitario' => 'Doc Precio Unitario',
			'DOC_marca' => 'Doc Marca',
			'DOC_cantidad' => 'Doc Cantidad',
			'DOC_caracteristica' => 'Doc Caracteristica',
			'IDDETOC' => 'Iddetoc',
			'IDORDENCOMPRA' => 'Idordencompra',
			'DOC_bien' => 'Doc Bien',
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

		$criteria->compare('DOC_precioUnitario',$this->DOC_precioUnitario,true);
		$criteria->compare('DOC_marca',$this->DOC_marca,true);
		$criteria->compare('DOC_cantidad',$this->DOC_cantidad,true);
		$criteria->compare('DOC_caracteristica',$this->DOC_caracteristica,true);
		$criteria->compare('IDDETOC',$this->IDDETOC);
		$criteria->compare('IDORDENCOMPRA',$this->IDORDENCOMPRA);
		$criteria->compare('DOC_bien',$this->DOC_bien);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}