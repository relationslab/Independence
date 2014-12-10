<?php
App::uses('AppModel', 'Model');
class Event extends AppModel
{

public $hasMany = array(
  'History' => array('className' => 'History' , 'foreignKey' => 'event_id')
);

}
