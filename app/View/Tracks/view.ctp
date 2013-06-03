<div class="tracks view">
<?php 
	 //$this->Js->alert('Test');
	//$this->Js->get('#lyrics');
	//$alert = $this->Js->alert('Hey there',true);
?>
<h2><?php  echo __('Track'); ?></h2>
	<dl>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($track['Track']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Artist'); ?></dt>
		<dd>
			<?php echo h($track['Track']['artist']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Album'); ?></dt>
		<dd>
			<?php echo h($track['Track']['album']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Year'); ?></dt>
		<dd>
			<?php echo h($track['Track']['year']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tracknumber'); ?></dt>
		<dd>
			<?php echo h($track['Track']['tracknumber']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Genre'); ?></dt>
		<dd>
			<?php echo h($track['Track']['genre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Length'); ?></dt>
		<dd>
			<?php echo h($track['Track']['length']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Path'); ?></dt>
		<dd>
			<?php echo h($track['Track']['path']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lyrics'); ?></dt>
		<dd>
			<div id='lyrics'>
			<?php 
			
			//echo h($track['Track']['path']); ?>
			</div>
			&nbsp;
			
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<!--li><?php //echo $this->Html->link(__('Edit Track'), array('action' => 'edit', $track['Track']['id'])); ?> </li-->
		<li><?php echo $this->Html->link(__('Back to the List'), array('action' => 'index')); ?> </li>
	</ul>
</div>

<?php echo $this->Js->writeBuffer(); ?>
