<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bootstrap 101 Template</title>
	<!-- bootstrapの読み込み！！ -->
	<?php echo $this->Html->css('bootstrap.min'); ?>
	<?php echo $this->Html->css('original'); ?>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Project name</a>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="#">Home</a></li>
					<li><a href="#about">About</a></li>
					<li><a href="#contact">Contact</a></li>
					<li>
						<?php if($users):?>
							こんにちは<?php echo $users['name'];?>さん
						<?php endif; ?>
					</li>
					<li>
						<?php if($users):?>
							<a href = <?php echo $this->Html->url(array('controller'=>'users' , 'action'=>'logout')); ?>>ログアウト</a>
						<?php endif; ?>
					</li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>
	<?php echo $this->Session->flash(); ?>

	<?php echo $this->fetch('content'); ?>

	<!-- jQuery読み混んでるよ -->
	<script src="http://code.jquery.com/jquery.js"></script>
	<!-- bootstrapのjsファイルを読み込んでるよ -->
	<?php echo $this->Html->script('bootstrap.min');?>
</body>
</html>
