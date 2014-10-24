<?php

class VentaController extends Controller
{
	private $_ref; //referencia del usuario

	public function actions()
    {
        return array(
            'upload'=>array(
                'class'=>'xupload.actions.XUploadAction',
                'path' =>Yii::app() -> getBasePath() . "/../uploads",
                'publicPath' => Yii::app() -> getBaseUrl() . "/uploads",
            ),
        );
    }
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(			
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','view','create','update','verDetalle', 'ventasUsuario', 'importarCsv','verDetalleMes'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Venta;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if( isset($_POST['Venta']) ){
			$model->attributes=$_POST['Venta'];
			if( isset($model->fecha) )
				$model->fecha = date('Y-m-d', strtotime($model->fecha));

			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$usuarios = Profile::model()->findAll();
		$this->render('create',array(
			'model'=>$model,
			'usuarios'=>$usuarios,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Venta']))
		{
			$model->attributes=$_POST['Venta'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		//Si es administrador puede ver todo
		if( Yii::app()->getModule('user')->esAlgunAdmin() ){
			$dataProvider=new CActiveDataProvider('Venta', array(
				'criteria'=>array(
					'group' => 'id_usuario',
					'select' => 'sum(nuevos_registros) AS nuevos_registrosCount, sum(nuevos_depositantes) AS nuevos_depositantesCount, sum(nuevos_depositantes_deportes) AS nuevos_depositantes_deportesCount, sum(comisiones_debidas) AS comisiones_debidasCount, id_usuario, fecha',
					)
				));
		}else{
			//si es el propietario puede ver las suyas, sino puede ver solo las de sus hijos

			$descendientes = $this->dameMisDescendientes(); //me devuelve un array con los id de los usuarios que son descendientes míos			
			
			//para coger el nombre de la tabla correspondiente al modelo Profile:
			//$tabla = Profile::model()->tableSchema->name;

			$criteria = new CDbCriteria;
			$criteria->group = 'id_usuario';
			$criteria->select = 'sum(nuevos_registros) AS nuevos_registrosCount, sum(nuevos_depositantes) AS nuevos_depositantesCount, sum(nuevos_depositantes_deportes) AS nuevos_depositantes_deportesCount, sum(comisiones_debidas) AS comisiones_debidasCount, id_usuario, fecha';
			//$criteria->condition ='id_usuario ='.Yii::app()->user->id;
			$criteria->addInCondition('id_usuario', $descendientes, 'OR');
			//$criteria2->join = 'INNER JOIN '.$tabla.' pro ON pro.user_id=t.id_usuario';

			$dataProvider=new CActiveDataProvider('Venta',
				array('criteria'=> $criteria
				)
			);

		}
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionVentasUsuario( $id ){
		$id = htmlentities(strip_tags( $id ));

		$descendientes = $this->dameMisDescendientes();
		$criteria = new CDbCriteria;
		$criteria->addInCondition('id_padre', $descendientes, 'OR');
		$profile = Profile::model()->findByPk( $id );

		if( Yii::app()->getModule('user')->esAlgunAdmin() || in_array($profile->user_id,$descendientes) ){

			$criteria2 = new CDbCriteria;
			$criteria2->group = 'MONTH(fecha)';
			$criteria2->select = 'sum(nuevos_registros) AS nuevos_registrosCount, sum(nuevos_depositantes) AS nuevos_depositantesCount, sum(nuevos_depositantes_deportes) AS nuevos_depositantes_deportesCount, sum(comisiones_debidas) AS comisiones_debidasCount, id_usuario, fecha';
			$criteria2->condition ='id_usuario=:id_usuario';
			$criteria2->params = array(':id_usuario'=>$profile->user_id);

			$dataProvider=new CActiveDataProvider('Venta',
				array('criteria'=> $criteria2
				)
			);

			$this->render('ventasusuario',array(
				'dataProvider'=>$dataProvider,
				'profile'=> $profile,
			));
		}else{
			$this->redirect("site/page/nopermitido");
		}
	}

	public function actionVerDetalle( $id ){
		$id = htmlentities(strip_tags( $id ));
		$venta = Venta::model()->findByPk( $id );
		
		//Si es un administrador podrá verlo, si es el propietario o padre del mismo también

		#FALTA COMPROBAR SI ES NIETO

		if( !empty($venta) && (Yii::app()->getModule('user')->esAlgunAdmin() || $venta->usuario->profile->id_padre == Yii::app()->user->id || $venta->usuario->profile->user_id == Yii::app()->user->id) ){
			$this->render( 'detalle', array('model'=>$venta) );
		}else{
			$this->render( 'detalle' );
		}
	}

	public function actionVerDetalleMes( $id, $mes ){		
		if( Yii::app()->getModule('user')->esAlgunAdmin() ){
			$id = htmlentities(strip_tags( $id ));
			$mes = htmlentities(strip_tags( $mes ));

			$profile = Profile::model()->findByPk( $id );

			$criteria = new CDbCriteria;
			$criteria->condition = 'id_usuario=:id_usuario AND MONTH(fecha)=:mes';
			$criteria->params = array(':id_usuario'=>$id, ':mes'=>$mes);

			$dataProvider=new CActiveDataProvider('Venta',
					array('criteria'=> $criteria,
						'pagination'=>false,
					)
				);
			$this->render('detallemes',array(
				'dataProvider'=>$dataProvider,
				'profile'=> $profile,
			));
		}else{
			$this->redirect("site/page/nopermitido");
		}

	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Venta('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Venta']))
			$model->attributes=$_GET['Venta'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionImportarCsv(){
         if( Yii::app()->getModule('user')->esAlgunAdmin() ){
         $model = new Venta;
		 if( isset($_FILES['csv']) ){		
		 $ok = true; 	
		  $model->attributes = $_FILES['csv'];
		  $filelist = CUploadedFile::getInstancesByName('csv');
		  // To validate 
           if( $filelist )
               $model->csv = 1;
               foreach( $filelist as $file ){
                   try{
                   $transaction = Yii::app()->db->beginTransaction();
                   $handle = fopen("$file->tempName", "r");
                   $row = 1;
                   while ( ($data = fgetcsv($handle, 2000, ";")) !== FALSE ) {
                      if($row>1){                       		 
                             $venta = new Venta;
                             //si la referencia no cambia pongo el id de usuario que ya tenía para evitar actividad con la BD
                             if( $this->esMismaReferencia( $data[0] ) ){
                             	$venta->id_usuario = $profile->user_id;
                             }else{
                             	$profile = $this->dameUsuario( $data[0] );                         	
                             	if( empty( $profile) ){
                             		$transaction->commit();
                             		fclose($handle);
                             		Yii::app()->user->setFlash('error', "El usuario de la referencia ".$data[0]." no existe!");
                             		$this->render('importcsvform',array(
		                                  'model'=>$model,
		                             ));
                             		 Yii::app()->end();
                             	}
                             	$venta->id_usuario = $profile->user_id;
                             }
                             $fecha = explode('/',$data[1]);
                             $aux = $fecha[0];
                             $fecha[0]=$fecha[1].'/';
                             $fecha[1]=$aux.'/';
                             $fecha[2];                
                             
                             $fecha = implode($fecha);
                             //relleno el resto de campos de la Venta                             
                             $venta->fecha = date('Y-m-d',strtotime($fecha));
                             $venta->clics = $data[2];
                          	 $venta->nuevos_registros = $data[3];
                             $venta->nuevos_depositantes = $data[4];
                             $venta->nuevos_depositantes_deportes = $data[5];
                             $venta->nuevos_depositantes_casino = $data[6];
                             $venta->nuevos_depositantes_poquer = $data[7];
                             $venta->nuevos_depositantes_juegos = $data[8];
                             $venta->nuevos_depositantes_bingo = $data[9];
                             $venta->valor_depositos = floatval(str_replace(',','.',$data[10]));
                             $venta->numero_depositos = $data[11];
                             $venta->facturacion_deportes = floatval(str_replace(',','.',$data[12]));
                             $venta->numero_apuestas_deportivas = $data[13];
                             $venta->usuarios_activos_deportes = $data[14];
                             $venta->sesiones_casino = $data[15];
                             $venta->nuevos_jugadores_deportes = $data[16];
                             $venta->nuevos_jugadores_casino = $data[17];
                             $venta->nuevos_clientes_poquer = $data[18];
                             $venta->nuevos_clientes_juego = $data[19];
                             $venta->nuevos_jugadores_bingo = $data[20];
                             $venta->beneficios_netos_deportes = floatval(str_replace(',','.',$data[21]));
                             $venta->beneficios_netos_casino = floatval(str_replace(',','.',$data[22]));;
                             $venta->beneficios_netos_poquer = floatval(str_replace(',','.',$data[23]));
                             $venta->beneficios_netos_juegos = floatval(str_replace(',','.',$data[24]));
                             $venta->ingresos_totales_netos = floatval(str_replace(',','.',$data[25]));
                             $venta->ganancias_afiliado_deportes = floatval(str_replace(',','.',$data[26]));
                             $venta->ganancias_afiliado_casino = floatval(str_replace(',','.',$data[27]));
                             $venta->ganancias_afiliado_poquer = floatval(str_replace(',','.',$data[28]));
                             $venta->ganancias_afiliado_juego = floatval(str_replace(',','.',$data[29]));
                             $venta->comisiones_debidas = floatval(str_replace(',','.',$data[30]));
                             //var_dump($venta);
                             if( !$venta->save() ){
                             	$ok = false;
                             }
                       }
                       $row++;
                   }
                   $transaction->commit();
                   fclose($handle);
                   }catch( Exception $error ){
                       print_r($error);
                       $transaction->rollback();
                   }
               }
               if( $ok ){
               		Yii::app()->user->setFlash('success', "Todos los datos se han guardado!");
               }else{
               		Yii::app()->user->setFlash('warning', "No se han podido guardar todos los datos");
               }
		 }
		$this->render('importcsvform',array(
		'model'=>$model,
		));
	}else{
		$this->render('importcsvform');
	}
		 
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Venta the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Venta::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	protected function esMismaReferencia( $referencia ){
		$referencia = strip_tags( $referencia );
		if( !empty($this->_ref) ){
			if( strcmp($this->_ref, $referencia) == 0){
				return true;
			}else{
				$this->_ref = $referencia;
				return false;
			}
		}else{
			$this->_ref = $referencia;
			return false;
		}
	}

	protected function dameUsuario( $referencia ){
		$criteria = new CDbCriteria;
		$criteria->condition = "referencia=:referencia";
		$criteria->params = array(':referencia'=>$referencia);

		return Profile::model()->find( $criteria );
	}


	protected function dameMisDescendientes(){
		//cojo los hijos
		$criteria = new CDbCriteria;
		$criteria->select = 'user_id';
		$criteria->condition = 'id_padre=:id_padre';
		$criteria->params = array(':id_padre' => Yii::app()->user->id);
		$hijos = Profile::model()->findAll( $criteria );			

		$arrayhijos = array();			
		foreach ($hijos as $hijo) {
			array_push($arrayhijos, $hijo->user_id);
		}

		//cojo los nietos
		$criteria3 = new CDbCriteria;
		$criteria3->select = 'user_id';
		$criteria3->addInCondition('id_padre',$arrayhijos, 'OR');
		$nietos = Profile::model()->findAll( $criteria3 );

		array_push($arrayhijos, Yii::app()->user->id);

		foreach ($nietos as $nieto) {
			array_push($arrayhijos, $nieto->user_id);
		}

		return $arrayhijos;
	}
	/**
	 * Performs the AJAX validation.
	 * @param Venta $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='venta-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
