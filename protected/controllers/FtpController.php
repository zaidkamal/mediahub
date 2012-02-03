<?php
class FtpController extends Controller {
  private $_ftp = null;
  
  public function actionIndex() {
    $ftp_profiles = Yii::app()->user->load()->ftp_profiles;
    $this->render('index', array('ftp_profiles' = $ftp_profiles));
  }
  
  public function actionCreate() {
    
  }
  
  public function actionDelete() {
    $ftp_profile = $this->loadFtp();
    $ftp_profile->delete();
  }
  
  protected function loadFtp() {
    if (is_null($this->_ftp)) {
      $this->_ftp = FtpProfile::model()->findByAttributes(array('id' => $_REQUEST['id'], 'user_id' => Yii::app()->user->id));
      
      if (is_null($this->_ftp)) {
        throw new CHttpException(404, 'This FTP profile does not exist');
      }
    }
    
    return $this->_ftp;
  }
}
