<div class="tracks view">
<?php 
	 //$this->Js->alert('Test');
	//$this->Js->get('#lyrics');
	//$alert = $this->Js->alert('Hey there',true);
	echo $this->Html->script('getLyrics');
	echo $this->Html->script('resizeCover');
?>
<h2><?php  echo __('Track'); ?></h2>
	<div style="float:right; width: 35%;">
			<div id="cover_div" style="display:inline-block;">
				<?php echo $track['Track']['cover']; ?>
			</div>
	</div>
	<div style="float: left; width: 60%;">		
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
			<div id="throbber" style="display: none;"><img src="<?php echo $this->webroot; ?>img/throbber.gif"/></div>
			<div id='lyrics'>
			<?php 
			
			//echo h($track['Track']['path']); ?>
			</div>
			&nbsp;
			
		</dd>
		<!--dt><?php //echo __('Cover'); ?></dt>
		<dd>

			&nbsp;
		</dd-->
	</dl>
	</div>
</div>
<?php 

echo $this->Html->scriptStart(array('inline'=>true));
echo "resizeCover();";
echo "getLyrics('".$track['Track']['artist']."','".$track['Track']['title']."');";

echo $this->Html->scriptEnd();


?>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<!--li><?php //echo $this->Html->link(__('Edit Track'), array('action' => 'edit', $track['Track']['id'])); ?> </li-->
		<li><?php echo $this->Html->link(__('Back to the List'), array('action' => 'index')); ?> </li>
	</ul>
</div>

<?php echo $this->Js->writeBuffer(); ?>
