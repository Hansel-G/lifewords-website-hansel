

<div class="change picture form">
<?php echo $this->Form->create('User', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Change Picture'); ?></legend>
        
	<?php
		echo $this->Form->input('User_ID');
		echo $this->Form->input('User_Nickname');
		echo $this->Form->input('User_Profile_Photo', array('type' => 'file'));
		
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>