<?php

class WebController extends Controller
{
	private $_model;
	
	public $layout = '//layouts/column1';	

	public function actionIndex( $id )
	{
		Yii::app()->theme = 'Frontend';

		/*if( !isset($id) )
			throw new CHttpException(404,'La página solicitada no está disponible.');*/

		$id = strip_tags($id);
		$criteria = new CDbCriteria;
		$criteria->compare('referencia',$id);
		$profile = Profile::model()->find($criteria);
	
		$this->loadConfiguracion($profile->user_id);

		$criteria2 = new CDbCriteria;
		$criteria2->condition = 'id_web = :id_web';
		$criteria2->params = array(':id_web' => $this->_model->id);
		$cajitas = Webcajita::model()->findAll($criteria2);

		$this->render('index',array('model'=>$this->_model, 'cajitas' => $cajitas));
	}

	public function loadConfiguracion( $id=null ){
		if( $this->_model===null ){
			if( $id!==null || isset($_GET['id']) )
				$this->_model=Web::model()->find($id!==null ? 'id_usuario ='. $id : 'id_usuario = '.$_GET['id']);
			if( $this->_model===null )
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}