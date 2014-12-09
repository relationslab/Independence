<?php
class UsersController extends AppController{

//User Modelを使うよ
public $uses = array('User');


//Userページを作るよ
public function index(){

}


public function beforeFilter(){
  $this->Auth->allow('index','signup','login','logout'); //ログインせずにアクセスできるアクションを登録
  $this->set('users',$this->Auth->user()); //ctpで$userを使えるように。ユーザー情報を渡してあげる。
}

public function login(){
  if($this->request->is('post')){
    if($this->Auth->login()){ //ログイン成功なら
      return $this->redirect($this->Auth->redirectUrl());  //Auth指定のページに遷移
      debug('ccc');
    }else{
      $this->Session->setFlash(__('ログインに失敗したよ。ユーザー名かPWを確認してね'));
      debug('ddd');
    }
  }
}

//ログアウト
public function logout(){
  $this->redirect($this->Auth->logout());
}



//新規登録
public function signup(){
  if($this->request->is('post')){
    //PWの値をハッシュ化
    $this->request->data['User']['pass'] = $this->Auth->password($this->data['User']['new_pass']);
    $this->request->data['User']['passconf'] = $this->Auth->password($this->data['User']['passconf']);

    //PWが一致するかチェック
    if($this->request->data['User']['pass']  == $this->request->data['User']['passconf'] ){
      $this->User->create();
      if($this->User->save($this->request->data)){
        $this->Session->setFlash(__('新規登録しました'));
        return $this->redirect(array('action'=>'index'));
      }
      $this->request->data['User']['pass'] = '';
      $this->request->data['User']['passconf'] = '';
      $this->Session->setFlash(__('失敗しました'));
    }else{
      $this->request->data['User']['passconf'] = '';
      $this->Session->setFlash(__('PWが一致しません'));
    }
  }
}



}
?>
