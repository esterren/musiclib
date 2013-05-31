<div class="tracks form">
<?php echo $this->Form->create('Track'); ?>
	<fieldset>
		<legend><?php echo __('Edit Track'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('path');
		echo $this->Form->input('title');
		echo $this->Form->input('artist');
		echo $this->Form->input('album');
		echo $this->Form->input('year');
		echo $this->Form->input('tracknumber');
		echo $this->Form->input('genre');
		echo $this->Form->input('duration');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Track.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Track.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Tracks'), array('action' => 'index')); ?></li>
	</ul>
</div>
