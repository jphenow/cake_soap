<?php
/* Create simple form with input and
 * add submit button
 *
 * Model: /app/models/game.php
 * Controller: /app/controllers/game_controller.php
 */
echo $this->Form->create();
echo $this->Form->input('title', array('label'=>'Title'));
echo $this->Form->end('Submit');
?>
