☆<?php echo $users['name']; ?>さんの申し込んでいるイベント☆
<br>

<?php foreach ($my_events as $my_event): ?> <!-- ここの：はいるものですか？？-->
  <li>
    <?php echo $my_event['History']['event_id']; ?>
  </li>
<?php endforeach; ?>
