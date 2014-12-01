<?php
App::uses('AppModel','Model');
class User extends AppModel{


  public $validate = array(
    'name' => 'notEmpty',
    'mail' => array(
      array('rule'=>'notEmpty', 'message'=>'メアドは必ず入れてね'),
      array('rule'=>'email' , 'message' =>'メアドフォーマットでいれてね')
    ),
    'new_pass' => array(
      array('rule'=>'notEmpty', 'message'=>'PWは必ず入れてね'),
      array('rule'=>'alphaNumeric' , 'message' =>'英数字でいれてね'),
      array('rule'=>array('between',4,8) , 'message' => '4〜8文字でいれてね')
    ),
    'passconf' => array(
      array('rule'=>'notEmpty', 'message'=>'PWCONFは必ず入れてね'),
      array('rule'=>'alphaNumeric' , 'message' =>'英数字でいれてね'),
//      array('rule'=>array('sameCheck','pass') , 'message' => 'PWが一致しません')
    )

  );

  //同一チェック
  public function sameCheck($value , $field_name){
    $v1 = array_shift($value);
    $v2 = $this->data[$this->name][$field_name];
    return $v1 == $v2;
  }


}
?>
