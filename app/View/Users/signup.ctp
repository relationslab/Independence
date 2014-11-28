<h1>新規登録画面</h1>

<?php
echo $this->Form->create('User');
echo $this->Form->input('name');
echo $this->Form->input('mail');
echo $this->Form->input('pass');
echo $this->Form->input('passconf');
echo $this->Form->end('登録');
?>

<!-- ラベルの名前をどうやって変えるの？？確認用のPW入力フォームもいるね -->
