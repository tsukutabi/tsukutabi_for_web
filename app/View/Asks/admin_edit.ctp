<div class="asks form">
<?php echo $this->Form->create('Ask'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Ask'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('email');
		echo $this->Form->input('content');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Ask.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Ask.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Asks'), array('action' => 'index')); ?></li>
	</ul>
</div>
