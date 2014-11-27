イベントを新規登録する
<br>
<?php echo $this->Html->link(
  'Add Event',
  array('controller'=>'events','action'=>'add')
);
?>

<br><br>
<ul>
<?php foreach ($events as $event): ?>
<li>

<?php echo $this->Html->link($event['Event']['name'],array('action' => 'detail', $event['Event']['id']));?>

<a href="<?php echo $this->Html->url(array('action' => 'detail', $event['Event']['id']));?>">
  <?php echo $event['Event']['name'];?>
  <!-- <img src="">とかを追加できる。全体にリンクをかけれる-->
</a>

<a href="<?php echo $this->Html->url(
array('action' => 'edit', $event['Event']['id']));?>">
Edit
</a>

<a href="<?php echo $this->Html->url(
array('action'=>'delete', $event['Event']['id']),
array('confirm'=>'Are you sure??'));?>">
Delete
</a>

</li>
<?php endforeach; ?>
<br>

イベントを検索するよ！
<br>
<?php echo $this->Form->create('Event',array('type'=>'Get')); ?> 
<?php echo $this->Form->input('Event.instructor',array('label'=>'講師')); ?>
<?php echo $this->Form->input('Event.place',array('label'=>'場所')); ?>
<?php echo $this->Form->end('検索'); ?>
