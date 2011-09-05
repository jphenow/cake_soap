<div id="addGameLink">
	<?php echo $this->Html->link('Add Game', array('controller'=>'Game', 'action'=>'add'));?>
	<?php echo $this->Html->link('Clear Games', array('controller'=>'Game', 'action'=>'clear'));?>
</div>

<div id="owned_table">
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
</div>

<div id="wanted_table">
Wanted!
<table>
	<tr>
		<th id="voteTH">Votes</th>
		<th>Title</th>
	</tr>
	<?php foreach ($wanted as $game):?>
	<tr>
		<td><div class="arrow unclicked"></div>
			<div class="bag not_owned"></div>
			<?php echo $game->votes;?>
			<div class="game_id"><?php echo $game->id; ?></div>
		</td>
		<td><?php echo $game->title; ?></td>
	</tr>
	<?php endforeach?>
</table>
</div>
<div id="ays">Are you sure you want to use your <b>one</b> action of the day?</div>
<?php
// Quick little way to allow posting our votes or game moves
echo $this->Form->create();
echo $this->Form->hidden('vote');
echo $this->Form->hidden('moveOwned');
echo $this->Form->end();
?>
