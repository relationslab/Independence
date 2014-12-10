☆<?php echo $users['name']; ?>さんの申し込んでいるイベント☆
<br>

<?php foreach ($my_events as $my_event): ?>
  <li>
    <?php echo $my_event['History']['event_id']; ?>
    <?php echo $my_event['Event']['name']; ?>
  </li>
<?php endforeach; ?>
