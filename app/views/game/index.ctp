<div id="owned_table">
<h2>Owned!</h2>
<table class="tablesorter">
	<thead>
	<tr>
		<th>Title</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($owned as $game):?>
	<tr>
		<td><?php echo $game->title; ?></td>
	</tr>
	<?php endforeach?>
	</tbody>
</table>
</div>

<div id="wanted_table">
<h2>Wanted!</h2>
<table class="tablesorter">
	<thead>
	<tr>
		<th id="voteTH">Votes</th>
		<th>Title</th>
	</tr>
	</thead>
	<tbody>
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
	</tbody>
</table>
<div id="addGameLink">
	<?php echo $this->Html->link('Add Game', array('controller'=>'Game', 'action'=>'add'));?>
</div>
<div id="clearGamesLink">
	<?php echo $this->Html->link('Clear Games', array('controller'=>'Game', 'action'=>'clear'));?>
</div>
</div>
<div id="ays">Are you sure you want to use your <b>one</b> action of the day?</div>
<?php
// Quick little way to allow posting our votes or game moves
echo $this->Form->create();
echo $this->Form->hidden('vote');
echo $this->Form->hidden('moveOwned');
echo $this->Form->end();
?>
