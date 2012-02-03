<?php
class MetaGroupController extends Controller {
  private $_group = null;
  
  public function actionIndex() {
    $groups = Yii::app()->user->load()->meta_groups;
    $this->render('index', array('groups' => $groups));
  }
  
  public function actionView() {
    $group  = $this->loadGroup();
    $fields = $group->fields();
    $this->render('view', array('group' => $group, 'fields' => $fields));
  }
  
  public function actionCreate() {
    $group = new MetaDataGroup();
    
    if (Yii::app()->request->isPostRequest) {
      $group->name = $_POST['name'];
      $group->user_id = Yii::app()->user->id;
      
      if ($group->save()) {
        
      } else {
        
      }
    }
    
    $this->render('create', array('group' => $group));
  }
  
  public function actionUpdate() {
    $group = $this->loadGroup();
    
    if (Yii::app()->request->isPostRequest) {
      $group->name = $_POST['name'];
      if ($group->save()) {
        
      } else {
        
      }
    }
    
    $this->render('update', array('group' => $group));
  }
  
  public function actionDelete() {
    $group = $this->loadGroup();
    $group->delete();
  }
  
  protected function loadGroup() {
    if (is_null($this->_group)) {
      $this->_group = MetaDataGroup::model()->findByAttributes(array('id' => $_REQUEST['id'], 'user_id' => Yii::app()->user->id));
      
      if (is_null($this->_group)) {
        throw new CHttpException(404, 'This metadata group does not exist');
      }
    }
    
    return $this->_group;
  }
}