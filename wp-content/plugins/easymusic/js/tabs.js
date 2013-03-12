jQuery(document).ready(function($) {
	$('#em-import-tabs').tabs({
		active: 0,
		beforeActivate: function( event, ui ) {
			$(ui.oldTab).removeClass('tabs');
			$(ui.newTab).addClass('tabs');
		}
	});
	
	//hover states on the static widgets
	$('#dialog_link, ul#icons li').hover(
	function() { $(this).addClass('ui-state-hover'); },
	function() { $(this).removeClass('ui-state-hover'); }
	);
});