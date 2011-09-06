$(document).ready(function() {
	$('#addGameLink, #clearGamesLink').button();// Fancify some links

	$('table').tablesorter();

	/* Standard action for clicking an up arrow
	 * Check what status the arrow is currently at based on class
	 * If it was originally unclicked, set to clicked and popup dialog
	 * asking if they really want to attempt an action
	 *
	 * Slightly sluggish since combining the two into one click handler
	 */
	$('.arrow, .bag').click( function(e){
		var selected, unselected, form_id; //Give us access to classes for certain scenarios
		if( $(this).attr('class').indexOf('arrow') != -1 ){
			selected = 'clicked';
			unselected = 'unclicked';
			form_id = '#GameVote';
		} else if( $(this).attr('class').indexOf('bag') != -1){
			selected = 'owned';
			unselected = 'not_owned';
			form_id = '#GameMoveOwned';
		}
		if( $(this).hasClass(unselected) ){
			$(this).removeClass(unselected);
			$(this).addClass(selected);
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
						$(form_id).val(game_id);
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
			$(this).removeClass(selected);
			$(this).addClass(unselected);
		}
	});
});
