<?php
class Notification extends CActiveRecord {
  public static function model($className=__CLASS__) {
    return parent::model($className);
  }

  public function tableName() {
    return 'notifications';
  }

  public function rules() {
    return array(
      array('video_id, error_message', 'required')
    );
  }

  public function relations() {
    return array(
      'video' => array(self::BELONGS_TO, 'Video', 'video_id')
    );
  }
}
