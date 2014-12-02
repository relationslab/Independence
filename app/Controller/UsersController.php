<?php
class UsersController extends AppController{

//User Modelを使うよ
public $uses = array('User');
//Sessionコンポーネントを使うよ
public $components = array(
  'Session',
  'Auth' => array( //ログイン機能を利用する
    'authenticate' => array(
      'Form' => array(
        'userModel' => 'User',
        'fields' => array('username' => 'mail','password' => 'pass')
      )
    ),
    //ログイン後の移動先
    'loginRedirect' => array('controller' => 'events', 'action' => 'index'),
    //ログアウト後の移動先
//    'logoutRedirect' => array('controller' => 'new_boards', 'action' => 'login'),
    //ログインページのパス
    'loginAction' => array('controller' => 'users', 'action' => 'index'),
    //未ログイン時のメッセージ
    'authError' => 'あなたのお名前とパスワードを入力して下さい。',
  )


  );

//Userページを作るよ
public function index(){

}


public function beforeFilter(){
  $this->Auth->allow('index','signup','login','logout'); //ログインせずにアクセスできるアクションを登録
  $this->set('user',$this->Auth->user()); //ctpで$userを使えるようにする・・・？？
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
public function logout(){
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
