<?php $this->setLayoutVar('title', '友達検索') ?>

<h2>友達検索</h2>

<h3>フォロー中</h3>

<?php if(count($followings) > 0): ?>
<ul>
	<?php foreach ($followings as $following): ?>
	<li>
		<a href="<?php echo $base_url; ?>/user/<?php echo $this->escape($following['user_name']); ?>" >
			<?php echo $this->escape($following['user_name']); ?>
		</a>
	</li>
	<?php endforeach; ?>
</ul>
<?php endif; ?>

<h3>友達を検索する</h3>

<form action="<?php echo $base_url; ?>/friend/search" method="get">
	<?php if(isset($errors) && count($errors) >0 ): ?>
	<?php echo $this->render('errors', array('errors' => $errors)); ?>
	<?php endif; ?>
	<textarea name="param" rows="2" cols="60"><?php echo $this->escape($param); ?></textarea>

	<p>
		<input type="submit" value="検索" />
	</p>
</form>

<?php if(count($users) > 0): ?>
<ul>
	<?php foreach ($users as $user): ?>
	<li>
		<a href="<?php echo $base_url; ?>/user/<?php echo $this->escape($user['user_name']); ?>" >
			<?php echo $this->escape($user['user_name']); ?>
		</a>
	</li>
	<?php endforeach; ?>
</ul>
<?php endif; ?>