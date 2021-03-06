<?php

class PopupController extends Controller
{
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','admin','delete'),
				'users'=>array('@'),
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
		$model=new Popup;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Popup']))
		{
			$model->attributes=$_POST['Popup'];
			if( !empty($popup->fecha_inicio) )
				$popup->fecha_inicio = date('Y-m-d',strtotime($popup->fecha_inicio));
			if( !empty($popup->fecha_fin) )
				$popup->fecha_fin = date('Y-m-d',strtotime($popup->fecha_fin));
			if($model->save()){
				Yii::app()->user->setFlash('popupsuccess','Se ha guardao el popup correctamente');
				$this->redirect(array('popup/update/id/'.$model->id));
			}
		}

		$this->render('create',array(
			'model'=>$model,
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

		if(isset($_POST['Popup'])){
			$model->attributes=$_POST['Popup'];
			if( !empty($_POST['Popup']['fecha_inicio']) )
				$model->fecha_inicio = $_POST['Popup']['fecha_inicio'];
			else
				$model->fecha_inicio = NULL;
			if( !empty($_POST['Popup']['fecha_fin']) )
				$model->fecha_fin = $_POST['Popup']['fecha_fin'];
			else
				$model->fecha_fin = NULL;

			/*if( !empty($popup->fecha_inicio) )
				$popup->fecha_inicio = date('Y-m-d',strtotime($popup->fecha_inicio));
			if( !empty($popup->fecha_fin) )
				$popup->fecha_fin = date('Y-m-d',strtotime($popup->fecha_fin));*/

			if( $model->save() ){
				Yii::app()->user->setFlash('popupsuccess','Se ha guardao el popup correctamente');
				//$this->redirect(array('web/create'));
			}
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
		if( Yii::app()->getModule('user')->esAlgunAdmin() )
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
		$dataProvider=new CActiveDataProvider('Popup');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Popup('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Popup']) && Yii::app()->getModule('user')->esAlgunAdmin() )
			$model->attributes=$_GET['Popup'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Popup the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Popup::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Popup $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='popup-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
