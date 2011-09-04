<style type="text/css" media="screen">
table{
	width: 200px;
	height: auto;
	border: 1px solid #d0d0d0;
	margin: 10px 10px;
}
</style>
<div id="addGameLink">
	<?php echo $this->Html->link('Add Game', array('controller'=>'Game', 'action'=>'add'));?>
</div>
<div class="arrow"></div>
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
		<th>Title</th>
		<th>Votes</th>
	</tr>
	<?php foreach ($wanted as $game):?>
	<tr>
		<td><?php echo $game->title; ?></td>
		<td><?php echo $game->votes;?></td>
	</tr>
	<?php endforeach?>
</table>
