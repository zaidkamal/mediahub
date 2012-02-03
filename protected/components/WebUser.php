<?php
class WebUser extends CWebUser {
  private $_object=null;
  
  public function load() {
    if (is_null($this->_object)) {
      $this->_object = User::model()->findByPk(Yii::app()->user->id);
    }
    return $this->_object;
  }
}
