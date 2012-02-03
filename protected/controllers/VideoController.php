<?php
class VideoController extends Controller {
  public function actionIndex() {
    $user = Yii::app()->user->load();
    $videos = $user->videos();
    $this->render('index', array('videos' => $videos));
  }
  
  public function actionView() {
    
  }
  
  public function actionUpdate() {
    
  }
  
  public function actionDelete() {
    
  }
}
