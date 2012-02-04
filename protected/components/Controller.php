<?php
class Controller extends CController {
  public $layout = '//layouts/column1';
  
  public function filters() {
    return array('accessControl');
  }
  
  public function accessRules() {
    return array(
      array('deny', 'users' => array('?'))
    );
  }
}
