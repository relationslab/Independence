<!-- サインイン＆サインアップ画面 -->
<h1>ログインしてください</h1>
<?php echo $this->Session->flash('Auth'); ?>
<?php echo $this->Form->create('User',array('url' => 'login')) ?>
<?php echo $this->Form->input('User.mail') ?> 
<?php echo $this->Form->input('User.pass') ?>
<?php echo $this->Form->end('ログイン') ?>
<form>
<input type="button" onclick="location.href='http://localhost/users/signup'" value="新規登録" />
</form>
