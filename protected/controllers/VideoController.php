<?php
class VideoController extends Controller {
  private $_video = null;
  
  public function actionIndex() {
    $user = Yii::app()->user->load();
    $videos = $user->videos();
    $this->render('index', array('videos' => $videos));
  }
  
  public function actionView() {
    $video = $this->loadVideo();
    $this->render('view', array('video' => $video));
  }
  
  public function actionCreate() {
    $video = new Video();
    $this->render('create', array('video' => $video));
  }
  
  public function actionUpdate() {
    
  }
  
  public function actionDelete() {
    
  }
  
  protected function loadVideo() {
    if (is_null($this->_video)) {
      $this->_video = Video::model()->findByAttributes(array('id' => $_REQUEST['id'], 'user_id' => Yii::app()->user->id));
      
      if (is_null($this->_video)) {
        throw new CHttpException(404, 'This video does not exist');
      }
    }
    
    return $this->_video;
  }
}
