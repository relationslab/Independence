<?php
class EventsController extends AppController
{
  //EventというModelを使うよ
  public $uses = array('Event' , 'History');


  public function beforeFilter(){
    $this->Auth->allow('index','detail'); //ログインせずにアクセスできるアクションを登録
  }

  //Eventの一覧ページをつくる
  public function index()

    {
      $conditions = array();
      if(array_key_exists('place',$this->request->query) && isset($this->request->query['place'])){
        $conditions['place like'] = '%'.$this->request->query['place'].'%';
      }
      if(array_key_exists('instructor',$this->request->query) && isset($this->request->query['instructor'])){
        $conditions['instructor like'] = '%'.$this->request->query['instructor'].'%';
      }
      $events = $this->Event->find('all',array('conditions' => $conditions));
      $this->set('events', $events);
    }

  //イベントの追加
  public function add()
  {
    if($this->request->is('post')){
      $this->Event->create();
      if($this->Event->save($this->request->data)){
        $this->Session->setFlash(__('保存したよ'));
        return $this->redirect(array('action'=>'index'));
      }
      $this->Session->setFlash(__('保存できなかったよ'));
    }
  }

  //イベントの編集
  public function edit($id = null){ //$idがなかったらnull入れるよ
    if(!$id){
      throw new NotFoundException(__('Invalidだよ')); //__は多言語化するときに便利
    }
    $event = $this->Event->findById($id);
    if(!$event){
      throw new NotFoundException(__('Invalidだよ'));
    }
    if($this->request->is(array('event','put'))){
      $this->Event->id=$id;
      if($this->Event->save($this->request->data)){
        $this->Session->setFlash(__('更新したよ'));
        return $this->redirect(array('action'=>'index')); //=>は配列の時しか使わない　actionというkeyに'index'を代入する
      }
      $this->Session->setFlash(__('ダメでした'));
    }
    if(!$this->request->data){
      $this->request->data=$event;
    }
  }

  //イベントの削除
  public function delete($id = null){
    //if ($this->request->is('get')){
    //  throw new MethodNotAllowedException();
    //}
    if ($this->Event->delete($id)){
      $this->Session->setFlash(__('%s消したよ',h($id)));
      return $this->redirect(array('action'=>'index'));
    }
  }

  //イベントの詳細
  public function detail($id = null){
    if(!$id){
      throw new NotFoundException(__('Invalidだよ')); //__は多言語化するときに便利
    }
    $event = $this->Event->findById($id);
    if(!$event){
      throw new NotFoundException(__('Invalidだよ'));
    }
    $this->set('event',$event);
  }

  //イベント申込
  public function apply(){
    debug($this->request->data);
    $result =  $this->History->apply($this->Auth->user('id') , $this->request->data['History']['event_id']);
    debug($result);
    if(!$result){
      $this->Session->setFlash(__('既に申し込み済だよ'));
    }else{
      $this->Session->setFlash(__('申し込んだよ!!!!'));
    }
  }

  //この場所でいいのか？？
  public function logout(){
    $this->redirect($this->Auth->logout());
  }


}
