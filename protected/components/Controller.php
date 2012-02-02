<?php
class Controller extends CController {
	public $layout = '//layouts/column1';
	public $menu = array();
	public $breadcrumbs = array();
	
	public function filters() {
    return array('accessControl');
  }
  public function accessRules() {
    return array(
      array('allow', 'controllers' => array('video'), 'users' => array('@')),
      array('allow', 'controllers' => array('session'), 'users' => array('?')),
      array('deny', 'users' => array('*'))
    );
  }
}
