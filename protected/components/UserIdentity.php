<?php
class UserIdentity extends CUserIdentity {
  public function authenticate() {
    $user = User::model()->findByAttributes(array('username' => $this->username));
    
    if (is_null($user)) {
      $this->errorCode = self::ERROR_USERNAME_INVALID;
    } else {
      if (sha1($user->password_salt.$this->password.Yii::app()->params['pepper']) == $user->password_hash) {
        $this->errorCode = self::ERROR_NONE;
      } else {
        $this->_id = $user->id;
        $this->errorCode = self::ERROR_PASSWORD_INVALID;
      }
    }
    
    return !$this->errorCode;
	}
}
