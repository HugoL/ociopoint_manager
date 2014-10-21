<?php

class VentaController extends Controller
{
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
				'actions'=>array('index','view','create','update','verDetalle', 'ventasUsuario', 'importarCsv'),
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
			$dataProvider=new CActiveDataProvider('Venta');
		}else{
			//si es el propietario puede ver las suyas, sino puede ver solo las de sus hijos

			##FALTA VER LAS VENTAS DE LOS HIJOS		

			//para coger el nombre de la tabla correspondiente al modelo Profile:
			$tabla = Profile::model()->tableSchema->name;

			$dataProvider=new CActiveDataProvider('Venta',
				array('criteria'=>array(
					'join' => 'INNER JOIN '.$tabla.' pro ON pro.user_id=t.id_usuario',
					'condition'=>'id_usuario='.Yii::app()->user->id,
					)
				)
			);
		}
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionVentasUsuario( $id ){
		$id = htmlentities(strip_tags( $id ));
		//Si es administrador puede ver todo

		$criteria = new CDbCriteria;
		$criteria->condition = 'id_padre=:id_padre';
		$criteria->params = array(':id_padre'=>Yii::app()->user->id);
		$profile = Profile::model()->find( $criteria );

		if( Yii::app()->getModule('user')->esAlgunAdmin() || $profile !== null ){
			//si es el propietario puede ver las suyas
			//para coger el nombre de la tabla correspondiente al modelo Profile:
			$dataProvider=new CActiveDataProvider('Venta',
				array('criteria'=>array(
					'condition'=>'id_usuario='.$id,
					)
				)
			);

			$this->render('index',array(
				'dataProvider'=>$dataProvider,
			));
		}else{
			$this->redirect("site/page/nopermitido");
		}
	}

	public function actionVerDetalle( $id ){
		$id = htmlentities(strip_tags( $id ));
		$venta = Venta::model()->findByPk( $id );
		
		//Si es un administrador podrá verlo, si es el propietario o padre del mismo también
		if( !empty($venta) && (Yii::app()->getModule('user')->esAlgunAdmin() || $venta->usuario->profile->id_padre == Yii::app()->user->id || $venta->usuario->profile->user_id == Yii::app()->user->id) ){
			$this->render( 'detalle', array('model'=>$venta) );
		}else{
			$this->render( 'detalle' );
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
         $model=new Venta;
		 if( isset($_FILES['csv']) ){		 	
		  $model->attributes=$_FILES['csv'];
		  $filelist=CUploadedFile::getInstancesByName('csv');
		  // To validate 
		           if( $filelist )
		               $model->csv=1;
		           //if( $model->validate() ){
		               foreach( $filelist as $file ){
		                   try{
		                   $transaction = Yii::app()->db->beginTransaction();
		                   $handle = fopen("$file->tempName", "r");
		                   $row = 1;
		                   while ( ($data = fgetcsv($handle, 1000, ",")) !== FALSE ) {
		                       if($row>1){
		                             $newmodel=new Venta;    
		                             var_dump($data);
		                         		                             
		                             /*$newmodel->name=$data[0];
		                             $newmodel->age=$data[1];
		                             $newmodel->save();*/
		                       }
		                       $row++;               
		                   }
		                   $transaction->commit();
		                   }catch( Exception $error ){
		                       print_r($error);
		                       $transaction->rollback();
		                   }                    
		               }                            
		           //}                        
		 }
		$this->render('importcsvform',array(
		  'model'=>$model,
		 ));
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
