<?php echo $events[0]['Event']['name']; ?>
<br>
<?php echo $events[1]['Event']['name']; ?>
<br>
<?php echo $this->Html->link(
  'Add Event',
  array('controller'=>'events','action'=>'add')
);
?>
<br><br>
<?php echo $events[0]['Event']['name']; ?>
を編集する
<?php echo $this->Html->link(
  'Edit',
  array('action' => 'edit', $events[0]['Event']['id'])
);
?>

<br><br>
<?php echo $events[1]['Event']['name']; ?>を削除する
<?php echo $this->Html->Link(
'Delete',
array('action'=>'delete', $events[1]['Event']['id']),
array('confirm'=>'Are you sure??'));
?>
