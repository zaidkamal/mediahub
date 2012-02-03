<?php
class VideoMetadataValue extends CActiveRecord {
  public static function model($className=__CLASS__) {
    return parent::model($className);
  }

  public function tableName() {
    return 'video_metadata_values';
  }

  public function rules() {
    return array(
      array('video_id, metadata_field_id', 'required')
      array('value', 'url', 'on' => 'urlField'),
      array('value', 'email', 'on' => 'emailField'),
      array('value', 'numerical', 'integerOnly' => true, 'on' => 'yearField'),
      array('value', 'numerical', 'integerOnly' => true, 'on' => 'integerField'),
      array('value', 'numerical', 'integerOnly' => false, 'on' => 'decimalField'),
      array('value', 'match', 'pattern' => '/\w+/i', 'on' => 'alphanumericField')
    );
  }

  public function relations() {
    return array(
      'video' => array(self::BELONGS_TO, 'Video', 'video_id'),
      'meta_field' => array(self::BELONGS_TO, 'MetadataField', 'metadata_field_id'),
      'meta_field_value' => array(self::BELONGS_TO, 'MetadataFieldValue', 'metadata_field_value_id')
    );
  }
  
  public function beforeValidate() {
    if ($this->meta_field->widget == 'text') {
      $this->scenario = $this->meta_field->data_type.'Field';
    }
    
    if ($this->meta_field->has_preset_values()) {
      $allowed_values = array();
      foreach ($this->meta_field->values as $preset_value) {
        $allowed_values[] = $preset_value->id;
      }
      
      if (!in_array($this->metadata_field_value_id, $allowed_values)) {
        $this->addError($this->metadata_field_id, 'Value not allowed');
      }
    }
  }
}
