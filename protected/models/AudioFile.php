<?php
class AudioFile extends CActiveRecord {
  const MIXES = array('tv_mix', 'cinema_mix', 'music_&_effects', 'ambiance_only');
  const TYPES = array('mono', 'stereo', 'surround_5.1', 'surround_6.1', 'surround_7.1');
  const CHANNELS = array('l', 'r', 'l/r', 'lfe', 'c', 'ls', 'rs', 'cs', 'side_l', 'side_r', 'multi_channel', 'none');
  
  public static function model($className=__CLASS__) {
    return parent::model($className);
  }

  public function tableName() {
    return 'audio_files';
  }

  public function rules() {
    return array(
      array('video_id, language_track, mix, type', 'required'),
      array('channel', 'in', 'range' => array('l/r'), 'on' => 'stereo'),
      array('channel', 'in', 'range' => array('l', 'r', 'lfe', 'c', 'ls', 'rs'), 'on' => 'surround_5.1'),
      array('channel', 'in', 'range' => array('l', 'r', 'lfe', 'c', 'ls', 'rs', 'cs'), 'on' => 'surround_6.1'),
      array('channel', 'in', 'range' => array('l', 'r', 'lfe', 'c', 'ls', 'rs', 'side_l', 'side_r'), 'on' => 'surround_7.1')
    );
  }

  public function relations() {
    return array(
      'video' => array(self::BELONGS_TO, 'Video', 'video_id')
    );
  }
}
