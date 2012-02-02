<?php
class VideoPersonnel extends CActiveRecord {
  const OCCUPATION = array('director', 'producer', 'actor', 'cast', 'screen_writer');
  
  public static function model() {
    return parent::model(__CLASS__);
  }

  public function tableName() {
    return 'video_personnel';
  }
  
  public function rules() {
    return array(
      array('video_id, name, occupation', 'required'),
      array('occupation', 'in', 'range' => VideoPersonnel::OCCUPATION)
    );
  }
  
  public function relations() {
    return array(
      'video' => array(self::BELONGS_TO, 'Video', 'video_id')
    );
  }
  
  public function scopes() {
    return array(
      'director' => array('condition' => "occupation = 'director'"),
      'producer' => array('condition' => "occupation = 'producer'"),
      'actor' => array('condition' => "occupation = 'actor'"),
      'cast'  => array('condition' => "occupation = 'cast'"),
      'screen_writer' => array('condition' => "occupation = 'screen_writer'")
    );
  }
}
