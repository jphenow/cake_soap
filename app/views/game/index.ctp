<table style="width:600px;">
<tr>
	<td>Id</td>
	<td>Title</td>
	<td>Votes</td>
	<td>Status</td>
	<td>IP</td>
	<td>Date</td>
</tr>
<?php foreach ($checkKey as $game):?>
<tr>
	<td><?php echo $game->id; ?></td>
	<td><?php echo $game->title; ?></td>
	<td><?php echo $game->votes;?></td>
	<td><?php echo $game->status;?></td>
	<td><?php echo $game->ip;?></td>
	<td><?php echo $game->votetime;?></td>
</tr>
<?php endforeach?>
</table>
