<?php echo $this->Form->create('Contact'); ?>
<fieldset>
	<legend><?php echo __d('Contact', 'Contact us');?></legend>
	<?php 
	echo $this->Session->flash();
	echo $this->Form->input('name', array('label' =>  __d('Contact', 'Name')));
	echo $this->Form->input('email', array('label' => __d('Contact', 'Email')));
	echo $this->Form->input('subject', array('label' =>  __d('Contact', 'Subject')));
	echo $this->Form->input('message', array('label' =>  __d('Contact', 'Message'), 'type' => 'textarea'));
	?>
</fieldset>
<?php echo $this->Form->end(__d('Contact', 'Send')); ?>