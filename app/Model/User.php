<?php
App::uses('AppModel','Model');
class User extends AppModel{
  public $validate = array(
    'name' => 'notEmpty',
    'mail' => array(
      'v1'=>array('rule'=>'notEmpty', 'message'=>'メアドは必ず入れてね'),
      'v2'=>array('rule'=>'mail' , 'message' =>'メアドフォーマットでいれてね')
    ),
  //  'pass' => array(
  //    array('rule'=>'notEmpty', 'message'=>'PWは必ず入れてね'),
  //    array('rule'=>'alphaNumeric' , 'message' =>'英数字でいれてね')
  //  )
  );
}
?>
