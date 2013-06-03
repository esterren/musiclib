<div class="tracks index">
	<h2><?php echo __('Tracks'); ?></h2>
	    
	
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('artist'); ?></th>
			<th><?php echo $this->Paginator->sort('album'); ?></th>
			<th><?php echo $this->Paginator->sort('year'); ?></th>
			<th><?php echo $this->Paginator->sort('tacknumber'); ?></th>
			<th><?php echo $this->Paginator->sort('genre'); ?></th>
			<th><?php echo $this->Paginator->sort('length'); ?></th>
	</tr>
	<?php foreach ($tracks as $track): ?>
	<tr>
		<td><?php echo $this->Html->link(__($track['Track']['title']), array('action' => 'view', $track['Track']['id'])); ?>&nbsp;</td>
		<td><?php echo h($track['Track']['artist']); ?>&nbsp;</td>
		<td><?php echo h($track['Track']['album']); ?>&nbsp;</td>
		<td><?php echo h($track['Track']['year']); ?>&nbsp;</td>
		<td><?php echo h($track['Track']['tracknumber']); ?>&nbsp;</td>
		<td><?php echo h($track['Track']['genre']); ?>&nbsp;</td>
		<td><?php echo h($track['Track']['length']); ?>&nbsp;</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<!--li><?php //echo $this->Html->link(__('Edit Track'), array('action' => 'edit', $track['Track']['id'])); ?> </li-->
		<li><?php echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout', 'full_base' => true)); ?> </li>
	</ul>
	<br/>
	<hr/>
	<div>
			<fieldset>
				<h3><?php echo __('Search'); ?></h3>
			<?php
				echo $this->Form->create('Track', array('url' => array_merge(array('action' => 'index'), $this->params['pass'])
					));
				echo $this->Form->input('title', array('div' => false, 'empty' => true)); // empty creates blank option.
				echo $this->Form->input('artist', array('div' => false, 'empty' => true));
				echo $this->Form->input('album', array('div' => false, 'empty' => true));
				echo $this->Form->input('genre', array('div' => false, 'empty' => true));
				//echo $this->Form->input('pr_status', array('label' => 'Status', 'options' => $statuses));
				//echo $this->Form->submit(__('Search', true), array('div' => false));
				//echo $this->Form->end();
				?>
			</fieldset>
			<?php
			//echo $this->Form->button('Reset', array('type'=>'reset'));
			//echo $this->Form->submit(__('Search', true), array('div' => true, 'type'=>'reset'));
			//echo $this->Form->submit(__('Search', true), array('div' => true));
			//echo $this->Form->end();
			
			echo $this->Form->end(__('Search')); 
			?>
			<br/>
			<?php
			echo $this->Html->link('Reset', '/tracks/index', array('class' => 'submit'));
			
			?>
        </div>
</div>
