<?php

class UserController extends Controller
{
	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return CMap::mergeArray(parent::filters(),array(
			'accessControl', // perform access control for CRUD operations
		));
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
				'actions'=>array('index','view', 'listarHijos', 'verUsuario'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}	

	/**
	 * Displays a particular model.
	 */
	public function actionView()
	{
		$model = $this->loadModel();
		$this->render('view',array(
			'model'=>$model,
		));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('User', array(
			'criteria'=>array(
		        'condition'=>'status>'.User::STATUS_BANNED,
		    ),
				
			'pagination'=>array(
				'pageSize'=>Yii::app()->controller->module->user_page_size,
			),
		));

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionListarHijos( $pag = null){
		if( !Yii::app()->getModule('user')->esAlgunAdmin() ){
			$descendientes = $this->dameMisDescendientes();
			$criteria = new CDbCriteria;
			$criteria->addInCondition('id_padre',$descendientes,'OR');
		}else{
			$criteria = new CDbCriteria;
		}
		if( !empty($pag) ){
			//calcular el offset y el limit correspondientes a la página
		}
		$hijos = Profile::model()->findAll( $criteria );	
		$roles = Rol::model()->findAll();	

		$this->render( 'hijos',array('hijos'=>$hijos, 'roles'=>$roles) );
	}

	public function actionVerUsuario( $id ){
		$id = strip_tags( $id );

		if( !empty($id) && $id != 0 ){
			$user = User::model()->findbyPk( $id );
			$rol = Rol::model()->findbyPk($user->profile->rol);
			$this->render('verUsuario', array('user'=>$user, 'rol'=>$rol));
		}else{
			$this->redirect(CHttpRequest::getUrlReferrer());
		}	
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 */
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
				$this->_model=User::model()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}


	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the primary key value. Defaults to null, meaning using the 'id' GET variable
	 */
	public function loadUser($id=null)
	{
		if($this->_model===null)
		{
			if($id!==null || isset($_GET['id']))
				$this->_model=User::model()->findbyPk($id!==null ? $id : $_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
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
}
