<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Edit User'); ?></legend>
	<?php
		echo $this->Form->input('User_Nickname');
		echo $this->Form->input('User_Status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('User.User_ID')), null, __('Are you sure you want to delete # %s?', $this->Form->value('User.User_ID'))); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'admin')); ?></li>
	</ul>
</div>
