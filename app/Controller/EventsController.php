<?php
class EventsController extends AppController
{
  //EventというModelを使うよ
  public $uses = array('Event');
  public $components = array('Session');
  //Eventの一覧ページをつくる
  public function index()
    {
        $events = $this->Event->find('all');  //Eventモデルを使って全部のEventを取ってくる
        $this->set('events', $events);  //取ってきたイベントをViewに渡す
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

  //イベントの検索
  public function search($name = null){
    if(!$name){
      throw new NotFoundException(__('イベント名は必ずいれてね'));
    }
    $name = $this->request->data['Event']['name'];
    $data = $this->Event->find('all',
    array('conditions' => array('name like' => '%'.$name.'%')));
    $this->set('datas',$data);

  }


}
