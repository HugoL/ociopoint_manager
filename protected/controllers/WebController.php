<?php

class WebController extends Controller
{
	private $_model;
	
	public $layout = '//layouts/column1';	

	public function actionIndex()
	{
		Yii::app()->theme = 'Frontend';
		$this->render('index');
	}

	public function loadConfiguracion( $id=null ){
		if( $this->_model===null ){
			if( $id!==null || isset($_GET['id']) )
				$this->_model=Web::model()->findbyPk($id!==null ? $id : $_GET['id']);
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