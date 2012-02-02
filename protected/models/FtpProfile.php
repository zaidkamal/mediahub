<?php
class FtpProfile extends CActiveRecord {
  public static function model($className=__CLASS__) {
    return parent::model($className);
  }

  public function tableName() {
    return 'ftp_profiles';
  }

  public function rules() {
    return array(
      array('user_id, name, server, port, username, password, type', 'required'),
      array('port', 'numerical', 'integerOnly' => true),
      array('type', 'in', 'range' => array('admin', 'main_client', 'sub_client')),
      array('public, active', 'boolean'),
      array('public, active', 'default', false)
    );
  }

  public function relations() {
    return array(
      'user' => array(self::BELONGS_TO, 'User', 'user_id')
    );
  }

  public function scopes() {
    return array(
      'active' => array('condition' => 'active'),
      'public' => array('condition' => 'public'),
      'admin' => array('condition' => "type = 'admin'"),
      'main_client' => array('condition' => "type = 'main_client'"),
      'sub_client' => array('condition' => "type = 'sub_client'")
    );
  }
}
