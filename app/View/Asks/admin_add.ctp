<div class="asks form">
<?php echo $this->Form->create('Ask'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Ask'); ?></legend>
	<?php
		echo $this->Form->input('email');
		echo $this->Form->input('content');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Asks'), array('action' => 'index')); ?></li>
	</ul>
</div>
