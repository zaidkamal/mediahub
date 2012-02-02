<?php
class MetadataFieldValue extends CActiveRecord {
  public static function model() {
    return parent::model(__CLASS__);
  }

  public function tableName() {
    return 'metadata_field_values';
  }

  public function rules() {
    return array(
      array('metadata_field_id, value', 'required')
    );
  }

  public function relations() {
    return array(
      'field' => array(self::BELONG_TO, 'Metadatafield', 'metadata_field_id')
    );
  }
}
