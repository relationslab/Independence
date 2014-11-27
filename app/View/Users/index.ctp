<!-- サインイン＆サインアップ画面 -->
<h1>ログインしてください</h1>
<?php
echo $this->Form->create('User');
echo $this->Form->input('mail');
echo $this->Form->input('pass');
echo $this->Form->end('ログイン');
?>
<form>
<input type="button" onclick="location.href='http://localhost/users/signup'" value="新規登録" />
</form>
