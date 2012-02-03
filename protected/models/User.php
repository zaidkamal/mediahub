<?php
class User extends CActiveRecord {
  private static $ROLES = array('admin', 'main_client', 'sub_client');
  public $password;
  
  public static function model($className=__CLASS__) {
    return parent::model($className);
  }

  public function tableName() {
    return 'users';
  }

  public function rules() {
    return array(
      array('role, username, password_salt, password_hash, title, first_name, last_name, email, phone, currency, company_name, company_address_1, company_address_2, company_phone, company_website, created_by', 'required'),
      array('username', 'length', 'min' => 6),
      array('username', 'unique'),
      array('role', 'in', 'range' => User::ROLES),
      array('email', 'email'),
      array('company_website', 'url')
    );
  }

  public function relations() {
    return array(
      'main_client' => array(self::BELONGS_TO, 'User', 'parent_client_id'),
      'sub_clients' => array(self::HAS_MANY, 'User', 'parent_client_id'),
      'videos' => array(self::HAS_MANY, 'Video', 'user_id'),
      'ftp_profiles' => array(self::HAS_MANY, 'FtpProfile', 'user_id'),
      'meta_groups' => array(self::HAS_MANY, 'MetadataGroup', 'user_id', 'with' => 'fields, fields.values')
    );
  }

  public function scopes() {
    return array(
      'active' => array('condition' => 'active')
    );
  }
  
  protected function beforeSave() {
    if (!empty($this->password)) {
      $allowed_characters = 'abcdefghijklmnopqrstuvwxyz0123456789-_@$&';
      $this->password_salt = '';
      for ($i = 0; $i < 16; $i++) {
        $this->password_salt .= $allowed_characters[rand(0, strlen($allowed_characters) -1)];
      }
      $this->password_hash = sha1($this->password_salt . $this->password . Yii::app()->params['pepper']);
    }
  }
}
