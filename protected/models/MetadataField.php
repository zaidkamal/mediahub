<?php
class MetadataField extends CActiveRecord {
  const WIDGETS = array('text', 'textarea', 'radio_button', 'check_box', 'select', 'multi_select', 'file');
  const DATA_TYPES = array('alphanumeric', 'integer', 'decimal', 'year', 'url', 'email');
  
  public static function model() {
    return parent::model(__CLASS__);
  }

  public function tableName() {
    return 'metadata_fields';
  }

  public function rules() {
    return array(
      array('group_id, name, widget', 'required'),
      array('widget', 'in', 'range' => MetadataField::WIDGETS),
      array('data_type', 'required', 'on' => 'textField'),
      array('data_type', 'in', 'range' => MetadataField::DATA_TYPES, 'on' => 'textField')
    );
  }

  public function relations() {
    return array(
      'group' => array(self::BELONG_TO, 'MetadataGroup', 'metadata_group_id'),
      'values' => array(self::HAS_MANY, 'MetadataFieldValue', 'metadata_field_id')
    );
  }
  
  public function has_preset_values() {
    return in_array($this->widget, array('radio_button', 'check_box', 'select', 'multi_select'));
  }
}