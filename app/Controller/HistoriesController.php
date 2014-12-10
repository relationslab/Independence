<?php
class HistoriesController extends AppController{
  //このモデルを使うよ
  public $uses = array('History' , 'Event' , 'User');

  public function beforeFilter(){
    //$this->Auth->allow('XXXXX'); //ログインせずにアクセス可能なアクション
    $this->set('users',$this->Auth->user()); //ctpで$userを使えるように。ユーザー情報を渡してあげる。
  }

  public function index(){
    $conditions['user_id'] = $this->Auth->user('id');
    $my_events = $this->History->find('all' , array('conditions' => $conditions)) ;
    $this->set('my_events' , $my_events); //Viewから参照できるようにsetが必要ということ？？無いとダメなのかしら。
    debug($my_events);
  }
}

?>
