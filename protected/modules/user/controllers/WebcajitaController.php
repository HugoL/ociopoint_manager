<?php

class WebcajitaController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';

	const NUM_CAJITAS_PER = 12;
	const NUM_CAJITAS_IPAD = 48;
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','crear','editar'),
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
		$model=new Webcajita;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Webcajita']))
		{
			$model->attributes=$_POST['Webcajita'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionCrear( $id_web ){
		$model=new Webcajita;
		$imagenes = array();
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if( Yii::app()->getModule('user')->esAlgunAdmin() ){			
			$web = Web::model()->findByPk($id_web);			

			
			if( $web->tipo == 0 ){ //pagina Web Personalizada
				for( $i = 0; $i < 12; $i++ )
					$cajitas[$i] = Webcajita::model();
				
			}else{ //pagina iPad
				for( $i = 0; $i < 48; $i++ )
					$cajitas[$i] = Webcajita::model();
			}
			

			if( isset($_POST['Webcajita']) ){
				$posicion = 1;
				$cuantos = 0;
				foreach ($_POST['Webcajita'] as $j=>$model){
		        	$models[] = Webcajita::model(); 
		        }
				foreach ($_POST['Webcajita'] as $j=>$model){	        	
		            if ( isset($_POST['Webcajita'][$j]) ) {     
		            			            	      	
		                if( isset($model->id) ){
		                	$models[$j] = $this->loadModel($model[$j]->id);
		                	$models[$j]->attributes=$model;
		                	$models[$j]->isNewRecord = false;
		                }else{
		                	$models[$j] = new Webcajita; // if you had static model only
		                	$models[$j]->attributes=$model;
		                	$models[$j]->posicion = $posicion;
		                	$posicion++; 
		                	$models[$j]->id_web = $web->id;
		                }
		                

	                	if( !$models[$j]->save() ){
	                		$todook = false;
	                	}else{
	                		$cuantos++;
	                	}
		            }
		        }		        
		        //$cajitas = Webcajita::model()->findAll('id_web = '.$web->id);
				$this->redirect(array('editar','id_web'=>$web->id));
			}else{
				//cargo los datos por defecto para crear la plantilla
				$ruta = Yii::app()->baseUrl.'/images/web_per/';
				$imagenes[0] = array('titulo' => '888poker.es','ruta' => $ruta.'888poker.gif');
				$imagenes[1] = array('titulo' => 'bet365.es','ruta' =>$ruta.'bet365.gif');
				$imagenes[2] = array('titulo' => 'sportium.es','ruta' =>$ruta.'sportium.gif');
				$imagenes[3] = array('titulo' => 'williamhill.es','ruta' =>$ruta.'williamhill.gif');
				$imagenes[4] = array('titulo' => 'bwin.es','ruta' =>$ruta.'bwin.jpg');
				$imagenes[5] = array('titulo' => 'luckia.es','ruta' =>$ruta.'luckia.gif');
				$imagenes[6] = array('titulo' => 'williamhill.es','ruta' =>$ruta.'williamhill_casino.gif');
				$imagenes[7] = array('titulo' => 'ukash, recargas, ...','ruta' =>$ruta.'ukash.jpg');
				$imagenes[8] = array('titulo' => 'betfair.es','ruta' =>$ruta.'betfair.gif');
				$imagenes[9] = array('titulo' => 'paf.es','ruta' =>$ruta.'paf.gif');
				$imagenes[10] = array('titulo' => 'sportium.es','ruta' =>$ruta.'sportium.gif');
				$imagenes[11] = array('titulo' => 'bet365.es','ruta' =>$ruta.'bet365_casino.gif');				
			}			
		}

		$this->render('crear',array(
			'web'=>$web,
			'cajitas'=>$cajitas,
			'imagenes'=>$imagenes,
		));
	}

	public function actionEditar( $id_web ){
		if( Yii::app()->getModule('user')->esAlgunAdmin() ){
			$web = Web::model()->findByPk($id_web);
			$cajitas = Webcajita::model()->findAll('id_web = '.$web->id);

			if( isset($_POST['Webcajita']) ){
				$posicion = 1;
				$cuantos = 0;
				foreach ($cajitas as $j=>$model){
		        	$models[] = $model; 
		        }
				foreach ($_POST['Webcajita'] as $j=>$model){	        	
		            if ( isset($_POST['Webcajita'][$j]) ) {     
		            			            	      	
		                //$models[$j] = $this->loadModel(); // if you had static model only
		                $models[$j]->attributes=$model;
		                $model[$j]->isNewRecord = false;
	                	if( !$models[$j]->update(false) ){
	                		$todook = false;	                
	                	}else{
	                		$cuantos++;
	                	}
		            }
		        }
			}
			$cajitas = Webcajita::model()->findAll('id_web = '.$web->id);
		}
		$this->render('editar', array(
			'web' => $web,
			'cajitas' => $cajitas,
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

		if(isset($_POST['Webcajita']))
		{
			$model->attributes=$_POST['Webcajita'];
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
		$dataProvider=new CActiveDataProvider('Webcajita');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Webcajita('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Webcajita']))
			$model->attributes=$_GET['Webcajita'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Webcajita the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Webcajita::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Webcajita $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='webcajita-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
