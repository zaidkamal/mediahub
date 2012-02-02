<?php
class Video extends CActiveRecord {
  const FORMATS    = array('SD', 'HD', '3D');
  const CONTAINERS = array('mpeg', 'mpg', 'mp4', 'm4v', 'mov', 'avi', 'wmv');
  const SUB_TYPES  = array('Feature', 'Concert');
  const VOD_TYPES  = array('Library', 'New Release');
  const TRANSCODE_STATUS = array('queued', 'in_progress', 'post_progress', 'complete', 'failed', 'canceled');
  
  public static function model() {
    return parent::model(__CLASS__);
  }
  
  public function tableName() {
    return 'videos';
  }
  
  public function rules() {
    return array(
      array('title, container', 'required'),
      array('format',    'in', 'range' => Video::FORMATS),
      array('container', 'in', 'range' => Video::CONTAINERS),
      array('subtype',   'in', 'range' => Video::SUB_TYPES),
      array('vod_type',  'in', 'range' => Video::VOD_TYPES),
      array('physical_release_date', 'required', 'on' => 'new_release')
    );
  }
  
  public function relations() {
    return array(
      'user' => array(self::BELONGS_TO, 'User', 'user_id'),
      'genres' => array(self::MANY_MANY, 'Genre', 'video_genres(video_id, genre_id)'),
      'notifications' => array(self::HAS_MANY, 'Notification', 'video_id'),
      'meta_values' => array(self::HAS_MANY, 'VideoMetadataValue', 'video_id'),
      'personnel' => array(self::HAS_MANY, 'VideoPersonnel', 'video_id'),
      'assets' => array(self::HAS_MANY, 'VideoAsset', 'video_id'),
      'audio_files' => array(self::HAS_MANY, 'AudioFile', 'video_id')
    );
  }
  
  public function create_asset_package() {
    $name = "${this->id}_${this->title}_${this->user->id}_${this->uploaded_at}";
  }
}
