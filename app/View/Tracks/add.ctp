<div class="tracks form">
<?php echo $this->Form->create('Track'); ?>
	<fieldset>
		<legend><?php echo __('Add Track'); ?></legend>
	<?php
		echo $this->Form->input('path');
		echo $this->Form->input('title');
		echo $this->Form->input('artist');
		echo $this->Form->input('album');
		echo $this->Form->input('year');
		echo $this->Form->input('tracknumber');
		echo $this->Form->input('genre');
		echo $this->Form->input('length');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Tracks'), array('action' => 'index')); ?></li>
	</ul>
</div>
