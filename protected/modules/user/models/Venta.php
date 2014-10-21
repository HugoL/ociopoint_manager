<?php

/**
 * This is the model class for table "{{ventas}}".
 *
 * The followings are the available columns in table '{{ventas}}':
 * @property integer $id
 * @property string $fecha
 * @property integer $clics
 * @property integer $nuevos_registros
 * @property integer $nuevos_depositantes
 * @property integer $nuevos_depositantes_deportes
 * @property integer $nuevos_depositantes_casino
 * @property integer $nuevos_depositantes_poquer
 * @property integer $nuevos_depositantes_juegos
 * @property integer $nuevos_depositantes_bingo
 * @property integer $valor_depositos
 * @property integer $numero_depositos
 * @property double $facturacion_deportes
 * @property integer $numero_apuestas_deportivas
 * @property integer $usuarios_activos_deportes
 * @property integer $sesiones_casino
 * @property integer $nuevos_jugadores_deportes
 * @property integer $nuevos_jugadores_casino
 * @property integer $nuevos_clientes_poquer
 * @property integer $nuevos_clientes_juego
 * @property integer $nuevos_jugadores_bingo
 * @property double $beneficios_netos_deportes
 * @property double $beneficios_netos_casino
 * @property double $beneficios_netos_poquer
 * @property double $beneficios_netos_juegos
 * @property double $ingresos_totales_netos
 * @property double $ganancias_afiliado_deportes
 * @property double $ganancias_afiliado_casino
 * @property double $ganancias_afiliado_poquer
 * @property double $ganancias_afiliado_juego
 * @property double $comisiones_debidas
 * @property string $fecha_creacion
 * @property string $observaciones
 * @property integer $id_usuario
 *
 * The followings are the available model relations:
 * @property Users $idUsuario
 */
class Venta extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{ventas}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fecha, id_usuario', 'required'),
			array('clics, nuevos_registros, nuevos_depositantes, nuevos_depositantes_deportes, nuevos_depositantes_casino, nuevos_depositantes_poquer, nuevos_depositantes_juegos, nuevos_depositantes_bingo, valor_depositos, numero_depositos, numero_apuestas_deportivas, usuarios_activos_deportes, sesiones_casino, nuevos_jugadores_deportes, nuevos_jugadores_casino, nuevos_clientes_poquer, nuevos_clientes_juego, nuevos_jugadores_bingo, id_usuario', 'numerical', 'integerOnly'=>true),
			array('facturacion_deportes, beneficios_netos_deportes, beneficios_netos_casino, beneficios_netos_poquer, beneficios_netos_juegos, ingresos_totales_netos, ganancias_afiliado_deportes, ganancias_afiliado_casino, ganancias_afiliado_poquer, ganancias_afiliado_juego, comisiones_debidas', 'numerical'),
			array('observaciones', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, fecha, clics, nuevos_registros, nuevos_depositantes, nuevos_depositantes_deportes, nuevos_depositantes_casino, nuevos_depositantes_poquer, nuevos_depositantes_juegos, nuevos_depositantes_bingo, valor_depositos, numero_depositos, facturacion_deportes, numero_apuestas_deportivas, usuarios_activos_deportes, sesiones_casino, nuevos_jugadores_deportes, nuevos_jugadores_casino, nuevos_clientes_poquer, nuevos_clientes_juego, nuevos_jugadores_bingo, beneficios_netos_deportes, beneficios_netos_casino, beneficios_netos_poquer, beneficios_netos_juegos, ingresos_totales_netos, ganancias_afiliado_deportes, ganancias_afiliado_casino, ganancias_afiliado_poquer, ganancias_afiliado_juego, comisiones_debidas, fecha_creacion, observaciones, id_usuario', 'safe', 'on'=>'search'),
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
			'usuario' => array(self::BELONGS_TO, 'User', 'id_usuario'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'fecha' => 'Fecha',
			'clics' => 'Clics',
			'nuevos_registros' => 'Nuevos Registros',
			'nuevos_depositantes' => 'Nuevos Depositantes',
			'nuevos_depositantes_deportes' => 'Nuevos Depositantes Deportes',
			'nuevos_depositantes_casino' => 'Nuevos Depositantes Casino',
			'nuevos_depositantes_poquer' => 'Nuevos Depositantes Poquer',
			'nuevos_depositantes_juegos' => 'Nuevos Depositantes Juegos',
			'nuevos_depositantes_bingo' => 'Nuevos Depositantes Bingo',
			'valor_depositos' => 'Valor Depositos',
			'numero_depositos' => 'Numero Depositos',
			'facturacion_deportes' => 'Facturacion Deportes',
			'numero_apuestas_deportivas' => 'Numero Apuestas Deportivas',
			'usuarios_activos_deportes' => 'Usuarios Activos Deportes',
			'sesiones_casino' => 'Sesiones Casino',
			'nuevos_jugadores_deportes' => 'Nuevos Jugadores Deportes',
			'nuevos_jugadores_casino' => 'Nuevos Jugadores Casino',
			'nuevos_clientes_poquer' => 'Nuevos Clientes Poquer',
			'nuevos_clientes_juego' => 'Nuevos Clientes Juego',
			'nuevos_jugadores_bingo' => 'Nuevos Jugadores Bingo',
			'beneficios_netos_deportes' => 'Beneficios Netos Deportes',
			'beneficios_netos_casino' => 'Beneficios Netos Casino',
			'beneficios_netos_poquer' => 'Beneficios Netos Poquer',
			'beneficios_netos_juegos' => 'Beneficios Netos Juegos',
			'ingresos_totales_netos' => 'Ingresos Totales Netos',
			'ganancias_afiliado_deportes' => 'Ganancias Afiliado Deportes',
			'ganancias_afiliado_casino' => 'Ganancias Afiliado Casino',
			'ganancias_afiliado_poquer' => 'Ganancias Afiliado Poquer',
			'ganancias_afiliado_juego' => 'Ganancias Afiliado Juego',
			'comisiones_debidas' => 'Comisiones Debidas',
			'fecha_creacion' => 'Fecha Creacion',
			'observaciones' => 'Observaciones',
			'id_usuario' => 'Usuario',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('clics',$this->clics);
		$criteria->compare('nuevos_registros',$this->nuevos_registros);
		$criteria->compare('nuevos_depositantes',$this->nuevos_depositantes);
		$criteria->compare('nuevos_depositantes_deportes',$this->nuevos_depositantes_deportes);
		$criteria->compare('nuevos_depositantes_casino',$this->nuevos_depositantes_casino);
		$criteria->compare('nuevos_depositantes_poquer',$this->nuevos_depositantes_poquer);
		$criteria->compare('nuevos_depositantes_juegos',$this->nuevos_depositantes_juegos);
		$criteria->compare('nuevos_depositantes_bingo',$this->nuevos_depositantes_bingo);
		$criteria->compare('valor_depositos',$this->valor_depositos);
		$criteria->compare('numero_depositos',$this->numero_depositos);
		$criteria->compare('facturacion_deportes',$this->facturacion_deportes);
		$criteria->compare('numero_apuestas_deportivas',$this->numero_apuestas_deportivas);
		$criteria->compare('usuarios_activos_deportes',$this->usuarios_activos_deportes);
		$criteria->compare('sesiones_casino',$this->sesiones_casino);
		$criteria->compare('nuevos_jugadores_deportes',$this->nuevos_jugadores_deportes);
		$criteria->compare('nuevos_jugadores_casino',$this->nuevos_jugadores_casino);
		$criteria->compare('nuevos_clientes_poquer',$this->nuevos_clientes_poquer);
		$criteria->compare('nuevos_clientes_juego',$this->nuevos_clientes_juego);
		$criteria->compare('nuevos_jugadores_bingo',$this->nuevos_jugadores_bingo);
		$criteria->compare('beneficios_netos_deportes',$this->beneficios_netos_deportes);
		$criteria->compare('beneficios_netos_casino',$this->beneficios_netos_casino);
		$criteria->compare('beneficios_netos_poquer',$this->beneficios_netos_poquer);
		$criteria->compare('beneficios_netos_juegos',$this->beneficios_netos_juegos);
		$criteria->compare('ingresos_totales_netos',$this->ingresos_totales_netos);
		$criteria->compare('ganancias_afiliado_deportes',$this->ganancias_afiliado_deportes);
		$criteria->compare('ganancias_afiliado_casino',$this->ganancias_afiliado_casino);
		$criteria->compare('ganancias_afiliado_poquer',$this->ganancias_afiliado_poquer);
		$criteria->compare('ganancias_afiliado_juego',$this->ganancias_afiliado_juego);
		$criteria->compare('comisiones_debidas',$this->comisiones_debidas);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);
		$criteria->compare('observaciones',$this->observaciones,true);
		$criteria->compare('id_usuario',$this->id_usuario);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Venta the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
