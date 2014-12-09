<?php
App::uses('AppModel', 'Model');
class History extends AppModel
{

//同じユーザーが同じセミナーに申し込んでないかチェック
  public function apply($user_id , $event_id){
    if($event_id == null)
    {
      return 'イベントIDがないよ';
    }
    $count = $this->find('count' , array(
      'conditions' => array('History.user_id' => $user_id , 'History.event_id' => $event_id)
    ));
    if($count !== 0){
      return '申込済だよ';
    }
    App::import('Model', 'Event');
    $Event = new Event;
    if(!$Event->find('count', array('conditions' => array('Event.id' => $event_id)))){
      return '存在しないイベントだよ';
    }
    if(!$this->save(array('user_id' => $user_id , 'event_id' => $event_id))){
      return '失敗しました。なぜか。';
    }
    return '申込完了';
  }


/*  //申込済のセミナーを取得する
  public function history($user_id){
    public $my_history = 'History';
    public $belongsTo = array(
      'Event' => array('className' => 'Event' , 'foreignKey' => 'event_id')
    )
  }
*/

}
