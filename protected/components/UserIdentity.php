<?php
class UserIdentity extends CUserIdentity {
  private $_id;
  public function getId() {
    return $this->_id;
  }
  
  public function authenticate() {
    $user = User::model()->findByAttributes(array('username' => $this->username));
    
    if (is_null($user)) {
      $this->errorCode = self::ERROR_USERNAME_INVALID;
    } else {
      if (md5($user->password_salt.$this->password.Yii::app()->params['pepper']) == $user->password_hash) {
        $this->errorCode = self::ERROR_NONE;
        $this->_id = $user->id;
      } else {
        $this->errorCode = self::ERROR_PASSWORD_INVALID;
      }
    }
    return !$this->errorCode;
	}
}
