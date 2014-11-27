<?php
class UsersController extends AppController{

//User Modelを使うよ
public $uses = array('User');
//Sessionコンポーネントを使うよ
public $components = array('Session');

//Userページを作るよ
public function index(){

}

//新規登録
public function signup(){
  if($this->request->is('post')){
    $this->User->create();
    if($this->User->save($this->request->data)){
      $this->Session->setFlash(__('新規登録しました'));
      return $this->redirect(array('action'=>'index'));
    }
    $this->Session->setFlash(__('失敗しました'));
  }
}



}
?>
