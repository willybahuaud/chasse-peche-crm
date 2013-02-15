jQuery(document.ready(function($){

	$.getScript("http://connect.soundcloud.com/sdk.js", function(data, textStatus, jqxhr) {

		SC.initialize({
		  client_id: 'YOUR_CLIENT_ID'
		});

		 // stream track id 293
		SC.stream("/tracks/293", function(sound){
		  sound.play();
		});

	});

))}