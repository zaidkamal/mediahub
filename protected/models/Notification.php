<?php
class Notification extends CActiveRecord {
  public static function model() {
    return parent::model(__CLASS__);
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
      'video' => array(self::BELONG_TO, 'Video', 'video_id')
    );
  }
}
