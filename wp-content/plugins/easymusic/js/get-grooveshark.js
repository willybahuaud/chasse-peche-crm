jQuery(document).ready(function($){
	var $importbox = $('#em-import-box');
	var $contentbox = $('#em-import-content');

	$(document).on('click','#search-to-grooveshark',function(e){
		e.preventDefault();
		var searchQuery = $('#em-search-gs').val();
		var typeOfSearch = $('.search-type-gs:checked').val();
		// var searchType = $('.search-type:checked').val();
		$.ajax({
			url: ajaxurl,
			data:{
				action: 'retrieveSongFromGrooveshark',
				query: searchQuery,
				typeofsearch: typeOfSearch
			},
			type:'POST',
			success:function(data){
				console.log(data);
				var obj = jQuery.parseJSON(data);
				var out = new String;
				for(var i = 0; i < obj.length; i++){
					out += '<div id="output-search" class="output-search">';
						out += '<input type="radio" name="song-to-insert" id="song' + obj[i].SongID + '" value="' + obj[i].SongID + '" class="insert-checkbox">';
						out += '<label class="song-to-insert clb" for="song' + obj[i].SongID + '">';
							if( ! isset( obj[i].CoverArtFilename ) ) obj[i].CoverArtFilename = emsc['defaultImg'];
							else obj[i].CoverArtFilename = 'http://images.gs-cdn.net/static/albums/120_' + obj[i].CoverArtFilename;
							out += '<img src="' + obj[i].CoverArtFilename + '" class="insert-img">';
							out += '<div class="insert-name">' + obj[i].SongName + '</div>';
						out += '</label>';
					out += '</div>';

				}
				// console.log(out);
				$importbox.show();
				$contentbox.html(out);


			}
		});
	});
	
	$('#em-close-area').on('click',function(){
		$importbox.hide();
	});
});