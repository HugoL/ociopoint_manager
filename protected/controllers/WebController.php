<?php

class WebController extends Controller
{
	private $_model;
	
	public $layout = '//layouts/column1';	

	public function actionIndex( $id ){
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

		$popup = PopUp::model()->find();
		
		if( (!empty($popup->fecha_inicio) && strtotime($popup->fecha_inicio) > strtotime(date('Y-m-d'))) || (!empty($popup->fecha_fin) && strtotime($popup->fecha_fin) < strtotime(date('Y-m-d'))) ){
			$popup = "";
		}

		$this->render('index',array('model'=>$this->_model, 'cajitas' => $cajitas, 'profile'=>$profile, 'popup'=>$popup));
	}

	public function actionChat( $id ){
		Yii::app()->theme = 'Frontend';
		$model = new ChatPost;
		
		if( isset($_POST['ChatPost']) ){
			$model->attributes = $_POST['ChatPost']['post_identity'];
			Yii::app()->session['nick'] = $_POST['ChatPost']['post_identity'];
		}

		$id = strip_tags($id);
		$criteria = new CDbCriteria;
		$criteria->compare('referencia',$id);
		$profile = Profile::model()->find($criteria);
		
		$web = $this->loadConfiguracion($profile->user_id);

		if( !isset(Yii::app()->session['nick']) ){
			$this->render( 'setnick',array('model'=>$model, 'web'=>$web, 'profile' => $profile));
			//Yii::app()->session['nick'] = "Anonimo"+Yii::app()->format->formatDateTime(time()) + rand(0,100);
		}else{						
			$this->render('chat',array('nick'=>Yii::app()->session['nick'], 'web'=>$web,'profile'=>$profile));
		}
		
	}

	public function actionSalir( $id ){
		unset(Yii::app()->session['nick'] );
		$this->redirect(array('web/index/id/'.$id));
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