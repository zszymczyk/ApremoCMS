<?php 
	use \helpers\form,
		\core\error;
?>

<h1> login </h1>

<?php echo Error::display($error); ?>

<?php echo Form::open(array('method' => 'post')); ?>
<p> Username: <?php echo Form::input(array('name' => 'username')); ?></p>
<p> Password: <?php echo Form::input(array('name' => 'password', 'type' => 'password')); ?></p>
<p> <?php echo Form::input(array('name' => 'submit', 'type' => 'submit', 'value' => 'Submit')); ?></p>
<?php echo Form::close(); ?>