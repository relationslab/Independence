<?php
App::uses('AppModel', 'Model');
class History extends AppModel
{

//同じユーザーが同じセミナーに申し込んでないかチェック
  public function apply($user_id , $event_id){
    $count = $this->find('count' , array(
      'conditions' => array('History.user_id' => $user_id , 'History.event_id' => $event_id)
    ));
    if($count !== 0){
      return false;
    }
   return $this->save(array('user_id' => $user_id , 'event_id' => $event_id));
  }

}
