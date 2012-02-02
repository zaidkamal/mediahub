<?php
class MetadataGroup extends CActiveRecord {
  public static function model() {
    return parent::model(__CLASS__);
  }

  public function tableName() {
    return 'metadata_groups';
  }

  public function rules() {
    return array(
      array('user_id, name', 'required')
    );
  }

  public function relations() {
    return array(
      'user' => array(self::BELONG_TO, 'User', 'user_id'),
      'fields' => array(self::HAS_MANY, 'MetadataField', 'metadata_group_id')
    );
  }
}
