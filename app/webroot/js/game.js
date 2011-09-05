$(document).ready(function() {
	$('.arrow').click( function(e){
		if( $(this).hasClass('unclicked') ){
			$(this).removeClass('unclicked');
			$(this).addClass('clicked');
			var original_arrow = $(this);
			$('#ays').dialog({
				modal: true,
				resizable: false,
				title: "Confirm",
				show: 'drop',
				hide: 'drop',
				buttons: {
					"Submit": function() {
						var game_id = $(original_arrow).siblings(".game_id").html();
						$('#GameVote').val(game_id);
						$('form#GameIndexForm').submit();
					},
					"Cancel": function() {
						$('#ays').dialog('close');
						$(original_arrow).click();
					}
				},
			});
		} else{
			$(this).removeClass('clicked');
			$(this).addClass('unclicked');
		}
	});
	$('.bag').click( function(e){
		if( $(this).hasClass('not_owned') ){
			$(this).removeClass('not_owned');
			$(this).addClass('owned');
			var original_clicked = $(this);
			$('#ays').dialog({
				modal: true,
				resizable: false,
				title: "Confirm",
				show: 'drop',
				hide: 'drop',
				buttons: {
					"Submit": function() {
						var game_id = $(original_clicked).siblings(".game_id").html();
						$('#GameMoveOwned').val(game_id);
						$('form#GameIndexForm').submit();
					},
					"Cancel": function() {
						$('#ays').dialog('close');
						$(original_clicked).click();
					}
				},
			});
		} else{
			$(this).removeClass('owned');
			$(this).addClass('not_owned');
		}
	});
});
