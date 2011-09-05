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
						
					},
					"Cancel": function() {
						$('#vote').dialog('close');
						$(original_arrow).click();
					}
				}
			});
		} else{
			$(this).removeClass('clicked');
			$(this).addClass('unclicked');
		}
	});
});
