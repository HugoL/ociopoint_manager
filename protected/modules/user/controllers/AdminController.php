<?php

class AdminController extends Controller
{
	public $defaultAction = 'admin';
	public $layout='//layouts/column2';
	
	private $_model;

	/**
	 * @return array action filters
	 */
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
				'actions'=>array('admin','delete','create','update','view', 'probarEmail'),
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
			$model->attributes=$_POST['User'];
			if( empty($model->username) ){
				$username = explode('@', $model->email);
				$model->username = $username[0];
				$model->password = $username[0];
			}
				 
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

				//FICHERO PDF
				$pdf = CUploadedFile::getInstancesByName('pdf');
				if( !is_dir(Yii::getPathOfAlias('webroot').'/uploads/pdf/') ){
   					mkdir(Yii::getPathOfAlias('webroot').'/uploads/pdf/');
   					chmod(Yii::getPathOfAlias('webroot').'/uploads/pdf/', 0755);
				}
				if(isset($pdf)){
					foreach ($pdf as $key => $fichero) { 
						if ( $fichero->saveAs(Yii::getPathOfAlias('webroot').'/uploads/pdf/'.$fichero->name) )
								$profile->pdf = $fichero->name;
					}
					
				}
				if($model->validate()&&$profile->validate()) {
					$model->password=Yii::app()->controller->module->encrypting($model->password);
					if($model->save()) {
						$profile->user_id=$model->id;
						$profile->save();
					}
					//Envío un email al admin con los datos del usuario
					$to = Yii::app()->params['email'];
					$cco= Yii::app()->params['email'];	
					$from = Yii::app()->params['email'];		
					$subject = 'Nuevo usuario registrado';		
					$message = 'Se ha registrado un nuevo usuario en ociopoint. Para que pueda acceder a la plataforma se debe activar accediendo como administrador.';	
					if( !empty($profile->pdf) ){
						$rutapdf = Yii::getPathOfAlias('webroot').'/uploads/pdf/'.$profile->pdf;
						$this->mailsend($to,$cco,$from,$subject,$message,$rutapdf);				
					}
					$this->mailsend($to,$cco,$from,$subject,$message);
					
					$this->redirect(array('view','id'=>$model->id));
					
				} else $profile->validate();
			}else{
				Yii::app()->user->setFlash('warning',"No puedes crear un usuario con un rol igual o superior al tuyo");
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
		//si no es administrador no podrá actualizar los datos
		if( Yii::app()->getModule('user')->esAlgunAdmin() ){
			$this->performAjaxValidation(array($model,$profile));
			if(isset($_POST['User'])){
				$model->attributes=$_POST['User'];
				$profile->attributes=$_POST['Profile'];
				$profile->rol = htmlentities(strip_tags($_POST['Profile']['rol']));
				$profile->comision = htmlentities(strip_tags($_POST['Profile']['comision']));
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
				}else $profile->validate();
			}
			//Solo le paso la lista de los roles que puede elegir el usuario (aquellos cuyo id sea inferior al suyo)
		}else{
			$this->redirect(Yii::app()->request->baseUrl.'/site/page/nopermitido');
			Yii::app()->end;
		}
		$mirol = Yii::app()->getModule('user')->user()->profile->rol;
		$criteria = new CDbCriteria();
		$criteria->condition = 'id >:id';
		$criteria->params = array(':id'=>$mirol);
		$rollist = Rol::model()->findAll( $criteria );
		$this->render('update',array(
			'model'=>$model,
			'profile'=>$profile,
			'rollist'=>$rollist,
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

	private function mailsend($to,$cco,$from,$subject,$message,$rutapdf=null){

        $mail=Yii::app()->Smtpmail;
        $mail->SetFrom($from, 'Ociopoint');
        $mail->Subject = $subject;
        $mail->AddAddress($to, Yii::app()->params['email']);
        $mail->AddBCC($cco);
        if( !empty($rutapdf) )
        	$message = $message." Se ha subido un documento PDF que podrás ver en la plataforma";
        $mail->MsgHTML($message);

        if(!$mail->Send()) {
            return false;
        }else{
            return true;
        }
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