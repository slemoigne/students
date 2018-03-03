<div class="students form">
	<?php echo $this->Form->create('Student'); ?>
		<fieldset>
			<legend><?php echo __('Add Student'); ?></legend>
			<?php
				echo $this->Form->input('last_name');
				echo $this->Form->input('first_name');
				echo $this->Form->input('birth_date', array(
					'dateFormat' => 'DMY',
					'minYear' => date('Y') - 110,
					'maxYear' => date('Y') - 3,
				));
			?>
		</fieldset>
	<?php echo $this->Form->end(__('Submit')); ?>
</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Students'), array('action' => 'index')); ?></li>
	</ul>
</div>