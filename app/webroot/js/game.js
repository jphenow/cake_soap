$(document).ready(function() {
	/* Standard action for clicking an up arrow
	 * Check what status the arrow is currently at based on class
	 * If it was originally unclicked, set to clicked and popup dialog
	 * asking if they really want to attempt an action
	 */
	$('.arrow').click( function(e){
		if( $(this).hasClass('unclicked') ){
			$(this).removeClass('unclicked');
			$(this).addClass('clicked');
			var original_clicked = $(this); // Need for deeper interaction later
			$('#ays').dialog({
				modal: true,
				resizable: false,
				title: "Confirm",
				show: 'drop',
				hide: 'drop',
				buttons: {
					"Submit": function() {
						// Set to game_id contents, a hidden class
						var game_id = $(original_clicked).siblings(".game_id").html();
						$('#GameVote').val(game_id);
						$('form#GameIndexForm').submit();
					},
					"Cancel": function() {
						$('#ays').dialog('close');
						// perform a fake click to set to button back to original state
						$(original_clicked).click();
					}
				},
			});
		} else{ // For the fake click above
			$(this).removeClass('clicked');
			$(this).addClass('unclicked');
		}
	});
	/* Same as arrow check with some tweaks to check the status
	 * of bag and submit accordingly. 
	 * TODO combine the two into one, more manageable method
	 */
	$('.bag').click( function(e){
		if( $(this).hasClass('not_owned') ){
			$(this).removeClass('not_owned');
			$(this).addClass('owned');
			var original_clicked = $(this); // Need for deeper interaction later
			$('#ays').dialog({
				modal: true,
				resizable: false,
				title: "Confirm",
				show: 'drop',
				hide: 'drop',
				buttons: {
					"Submit": function() {
						// Set to game_id contents, a hidden class
						var game_id = $(original_clicked).siblings(".game_id").html();
						$('#GameMoveOwned').val(game_id);
						$('form#GameIndexForm').submit();
					},
					"Cancel": function() {
						$('#ays').dialog('close');
						// perform a fake click to set to button back to original state
						$(original_clicked).click();
					}
				},
			});
		} else{// For the fake click above
			$(this).removeClass('owned');
			$(this).addClass('not_owned');
		}
	});
});
