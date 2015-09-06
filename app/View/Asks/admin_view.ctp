<div class="asks view">
<h2><?php echo __('Ask'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($ask['Ask']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($ask['Ask']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Content'); ?></dt>
		<dd>
			<?php echo h($ask['Ask']['content']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($ask['Ask']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($ask['Ask']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ask'), array('action' => 'edit', $ask['Ask']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Ask'), array('action' => 'delete', $ask['Ask']['id']), array(), __('Are you sure you want to delete # %s?', $ask['Ask']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Asks'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ask'), array('action' => 'add')); ?> </li>
	</ul>
</div>
