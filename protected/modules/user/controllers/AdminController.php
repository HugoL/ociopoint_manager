<?php

class AdminController extends Controller
{
	public $defaultAction = 'admin';
	public $layout='//layouts/column2';
	
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
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','create','update','view'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new User('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['User']))
            $model->attributes=$_GET['User'];

        $this->render('index',array(
            'model'=>$model,
        ));
		/*$dataProvider=new CActiveDataProvider('User', array(
			'pagination'=>array(
				'pageSize'=>Yii::app()->controller->module->user_page_size,
			),
		));

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));//*/
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
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new User;
		$profile=new Profile;
		$this->performAjaxValidation(array($model,$profile));
		$mirol = Yii::app()->getModule('user')->user()->profile->rol;
		if( isset($_POST['User']) ){			
			//Yii::trace(CVarDumper::dumpAsString($_POST['User']));
			$model->attributes=$_POST['User'];
			$model->activkey=Yii::app()->controller->module->encrypting(microtime().$model->password);
			$profile->attributes=$_POST['Profile'];
			$profile->rol = strip_tags($_POST['Profile']['rol']);		
			$profile->user_id=0;
			$model->superuser = 0; //no se pueden crear superusuarios
			if( !Yii::app()->getModule('user')->esAlgunAdmin() ){
				$model->status = 0; //Solo los administradores pueden crear usuarios activos
			}
			if( $mirol < $profile->rol ){ //No se puede crear un usuario de rol igual o superior
				//Asigno el padre del usuario, que es el que lo ha creado
				$profile->id_padre = Yii::app()->user->id;
				if($model->validate()&&$profile->validate()) {
					$model->password=Yii::app()->controller->module->encrypting($model->password);				
					if($model->save()) {
						$profile->user_id=$model->id;
						$profile->save();
					}
					$this->redirect(array('view','id'=>$model->id));
				} else $profile->validate();
			}else{
				Yii::app()->user->setFlash('warning',"No puedes crear un usuario con un rol igual o superior al tuyo");
				echo "<h1>".$profile->rol.", ".$mirol."</h1>";
				$this->redirect(Yii::app()->baseUrl.'/user/admin/create');
			}
		}

		//Solo le paso la lista de los roles que puede elegir el usuario (aquellos cuyo id sea inferior al suyo)
		$criteria = new CDbCriteria();
		$criteria->condition = 'id >:id';
		$criteria->params = array(':id'=>$mirol);
		$rollist = Rol::model()->findAll( $criteria );

		$this->render('create',array(
			'model'=>$model,
			'profile'=>$profile,
			'rollist'=>$rollist,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpdate()
	{
		$model=$this->loadModel();
		$profile=$model->profile;
		$this->performAjaxValidation(array($model,$profile));
		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			$profile->attributes=$_POST['Profile'];
			
			if($model->validate()&&$profile->validate()) {
				$old_password = User::model()->notsafe()->findByPk($model->id);
				if ($old_password->password!=$model->password) {
					$model->password=Yii::app()->controller->module->encrypting($model->password);
					$model->activkey=Yii::app()->controller->module->encrypting(microtime().$model->password);
				}
				$model->superuser = 0; //no se pueden crear superusuarios
				if( !Yii::app()->getModule('user')->esAlgunAdmin() ){
					$model->status = 0; //Solo los administradores pueden crear usuarios activos
				}
				$model->save();
				$profile->save();
				$this->redirect(array('view','id'=>$model->id));
			} else $profile->validate();
		}

		$this->render('update',array(
			'model'=>$model,
			'profile'=>$profile,
		));
	}


	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 */
	public function actionDelete()
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$model = $this->loadModel();
			$profile = Profile::model()->findByPk($model->id);
			$profile->delete();
			$model->delete();
			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_POST['ajax']))
				$this->redirect(array('/user/admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	private function filtroCreate( $rolCreado ){

	}
	
	/**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($validate)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
        {
            echo CActiveForm::validate($validate);
            Yii::app()->end();
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
				$this->_model=User::model()->notsafe()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}

	/* Used to debug variables*/
	protected function Debug($var){
		$bt = debug_backtrace();
		$dump = new CVarDumper();
		$debug = '<div style="display:block;background-color:gold;border-radius:10px;border:solid 1px brown;padding:10px;z-index:10000;"><pre>';
		$debug .= '<h4>function: '.$bt[1]['function'].'() line('.$bt[0]['line'].')'.'</h4>';
		$debug .=  $dump->dumpAsString($var);
		$debug .= "</pre></div>\n";
		Yii::app()->params['debugContent'] .=$debug;
	}
	
}