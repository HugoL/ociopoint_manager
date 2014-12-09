<?php

/**
 * This is the model class for table "{{webcajitas}}".
 *
 * The followings are the available columns in table '{{webcajitas}}':
 * @property integer $id
 * @property string $url
 * @property integer $posicion
 * @property integer $titulo
 * @property string $imagen
 * @property integer $tamano
 * @property integer $id_categoria
 * @property integer $id_web
 *
 * The followings are the available model relations:
 * @property Categoriaswebs $idCategoria
 * @property Webs $idWeb
 */
class Webcajita extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Webcajita the static model class
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
		return '{{webcajitas}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('url, posicion, titulo, imagen, id_categoria, id_web', 'required'),
			array('posicion, tamano, id_categoria, id_web', 'numerical', 'integerOnly'=>true),
			array('titulo', 'length', 'max'=>256),
			array('url', 'length', 'max'=>800),
			array('imagen', 'length', 'max'=>512),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, url, posicion, titulo, imagen, tamano, id_categoria, id_web', 'safe', 'on'=>'search'),
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
			'categoria' => array(self::BELONGS_TO, 'Categoriaweb', 'id_categoria'),
			'web' => array(self::BELONGS_TO, 'Web', 'id_web'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'url' => 'Url',
			'posicion' => 'Posición',
			'titulo' => 'Título',
			'imagen' => 'Imagen',
			'tamano' => 'Tamaño',
			'id_categoria' => 'Categoría',
			'id_web' => 'Web',
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
		$criteria->compare('url',$this->url,true);
		$criteria->compare('posicion',$this->posicion);
		$criteria->compare('titulo',$this->titulo);
		$criteria->compare('imagen',$this->imagen,true);
		$criteria->compare('tamano',$this->tamano);
		$criteria->compare('id_categoria',$this->id_categoria);
		$criteria->compare('id_web',$this->id_web);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}