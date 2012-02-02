<?php
class Genre extends CActiveRecord {
  public static function model() {
    return parent::model(__CLASS__);
  }

  public function tableName() {
    return 'genres';
  }

  public function rules() {
    return array(
      array('name', 'required')
    );
  }

  public function relations() {
    return array(
      'parent' => array(self::BELONGS_TO, 'Genre', 'parent_id'),
      'children' => array(self::HAS_MANY, 'Genre', 'parent_id'),
      'videos' => array(self::MANY_MANY, 'Video', 'video_genres(genre_id, video_id)')
    );
  }
  
  public function scopes() {
    return array(
      'primary' => array('condition' => 'parent is null'),
      'secondary' => array('condition' => 'parent is not null')
    );
  }
}
