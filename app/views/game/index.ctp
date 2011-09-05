<? echo $javascript->link('global'); ?>
<div id="addGameLink">
	<?php echo $this->Html->link('Add Game', array('controller'=>'Game', 'action'=>'add'));?>
	<?php echo $this->Html->link('Clear Games', array('controller'=>'Game', 'action'=>'clear'));?>
</div>
Owned!
<table>
	<tr>
		<th>Title</th>
	</tr>
	<?php foreach ($owned as $game):?>
	<tr>
		<td><?php echo $game->title; ?></td>
	</tr>
	<?php endforeach?>
	</table>
	<br />
	Wanted!
	<table>
	<tr>
		<th>Votes</th>
		<th>Title</th>
	</tr>
	<?php foreach ($wanted as $game):?>
	<tr>
		<td><div class="arrow unclicked"></div> <?php echo $game->votes;?></td>
		<td><?php echo $game->title; ?></td>
	</tr>
	<?php endforeach?>
</table>
<div id="vote">Are you sure you want to use your <b>one</b> vote of the day?</div>
