<?php

/**
 * This is the model class for table "{{popups}}".
 *
 * The followings are the available columns in table '{{popups}}':
 * @property integer $id
 * @property string $titulo
 * @property string $texto
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property string $fecha
 * @property integer $activado
 */
class Popup extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Popup the static model class
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
		return '{{popups}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('titulo, texto', 'required'),
			array('activado', 'numerical', 'integerOnly'=>true),
			array('titulo', 'length', 'max'=>512),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, titulo, texto, fecha_inicio, fecha_fin, fecha, activado', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'titulo' => 'Titulo',
			'texto' => 'Texto',
			'fecha_inicio' => 'Fecha Inicio',
			'fecha_fin' => 'Fecha Fin',
			'fecha' => 'Fecha',
			'activado' => 'Activado',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('titulo',$this->titulo,true);
		$criteria->compare('texto',$this->texto,true);
		$criteria->compare('fecha_inicio',$this->fecha_inicio,true);
		$criteria->compare('fecha_fin',$this->fecha_fin,true);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('activado',$this->activado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}