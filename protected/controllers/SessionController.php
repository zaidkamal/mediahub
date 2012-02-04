<?php
class SessionController extends Controller {
  public function filters() {
    return array('accessControl');
  }
  
  public function accessRules() {
    return array(
      array('allow', 'users' => array('*'))
    );
  }
  
  public function actionCreate() {
    if (Yii::app()->request->isPostRequest) {
      $identity = new UserIdentity($_POST['username'], $_POST['password']);
      if ($identity->authenticate()) {
        Yii::app()->user->login($identity);
        $this->redirect(Yii::app()->homeUrl);
      }
    }
    $this->render('create');
  }
  
  public function actionDelete() {
    Yii::app()->user->logout(true);
    $this->redirect(Yii::app()->homeUrl);
  }
}
