$(document).ready(function() {
	$('.arrow').click( function(e){
		if( $(this).hasClass('unclicked') ){
			$(this).removeClass('unclicked');
			$(this).addClass('clicked');
			var original_arrow = $(this);
			$('#vote').dialog({
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
						$('#vote').dialog('close');
						$(original_arrow).click();
					}
				},
				close: function() {
					$('#vote').dialog('close');
					$(original_arrow).click();
				}

			});
		} else{
			$(this).removeClass('clicked');
			$(this).addClass('unclicked');
		}
	});
});
