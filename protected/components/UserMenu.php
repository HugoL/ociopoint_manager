<?php
Yii::import('zii.widgets.CPortlet');
 
class UserMenu extends CPortlet
{
	public $titulo;
	public $referencia;
	public $url;

    public function init()
    {
        parent::init();
    }
 
    protected function renderContent()
    {
          $this->render('userMenu',array('titulo'=>$this->titulo,'referencia'=>$this->referencia,'url'=>$this->url));
    }
}
?>