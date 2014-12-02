<?php debug($event);?>
<?php echo $event['Event']['name']?>
<?php echo $event['Event']['id']?>
<?php echo $event['Event']['place']?>
<?php echo $event['Event']['instructor']?>
<?php echo $event['Event']['date'];?>


<?php echo $this->Form->create('History' , array('url' => 'apply')) ?>
<?php echo $this->Form->hidden('History.event_id', array('value'=>$event['Event']['id'])) ?>
<?php echo $this->Form->end('申込'); ?>
