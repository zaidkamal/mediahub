<?php
class VideoAsset extends CActiveRecord {
  private static $TYPE = array('cover', 'trailer', 'picture', 'interview', 'making_of');
  
  public static function model($className=__CLASS__) {
    return parent::model($className);
  }

  public function tableName() {
    return 'video_assets';
  }
  
  public function rules() {
    return array(
      array('video_id, file_name, type', 'required'),
      array('type', 'in', 'range' => VideoAsset::TYPE)
    );
  }
  
  public function relations() {
    return array(
      'video' => array(self::BELONGS_TO, 'Video', 'video_id')
    );
  }
  
  public function scopes() {
    return array(
      'cover' => array('condition' => "type = 'cover'"),
      'trailer' => array('condition' => "type = 'trailer'"),
      'picture' => array('condition' => "type = 'picture'"),
      'interview' => array('condition' => "type = 'interview'"),
      'making_of' => array('condition' => "type = 'making_of'")
    );
  }
}
