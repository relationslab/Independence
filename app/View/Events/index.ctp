イベントを新規登録する
<br>
<?php echo $this->Html->link(
  'Add Event',
  array('controller'=>'events','action'=>'add')
);
?>

<br><br>
<div class="container" >
<table class="table table-hover">
<thead>
  <tr>
    <th>イベント名</th>
    <th>イベント名？</th>
    <th>編集</th>
    <th>削除</th>
    </tr>
</thead>

<tbody>
  <?php foreach ($events as $event): ?>
    <tr>
      <td>
        <?php echo $this->Html->link($event['Event']['name'],array('action' => 'detail', $event['Event']['id']));?>
      </td>
      <td>
        <a href="<?php echo $this->Html->url(array('action' => 'detail', $event['Event']['id']));?>">
        <?php echo $event['Event']['name'];?>
        <!-- <img src="">とかを追加できる。全体にリンクをかけれる-->
        </a>
      </td>
      <td>
        <a href="<?php echo $this->Html->url(
        array('action' => 'edit', $event['Event']['id']));?>">
        Edit
        </a>
      </td>
      <td>
        <a href="<?php echo $this->Html->url(
        array('action'=>'delete', $event['Event']['id']),
        array('confirm'=>'Are you sure??'));?>">
        Delete
        </a>
      </td>

    </tr>
  <?php endforeach; ?>

</tbody>
</table>
<div>

<br>

イベントを検索するよ！
<br>
<?php echo $this->Form->create('Event',array('type'=>'Get')); ?>
<?php echo $this->Form->input('Event.instructor',array('label'=>'講師')); ?>
<?php echo $this->Form->input('Event.place',array('label'=>'場所')); ?>
<?php echo $this->Form->end(array('label'=>'検索' , 'class'=>'btn btn-primay')); ?>
<?php debug($users); ?>
