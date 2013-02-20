function isset () {
  var a = arguments,
    l = a.length,
    i = 0,
    undef;
  if (l === 0) {
    throw new Error('Empty isset');
  }
  while (i !== l) {
    if (a[i] === undef || a[i] === null) {
      return false;
    }
    i++;
  }
  return true;
}

jQuery(document).ready(function($){
	//INITIALIZATION DE LA FENETRE CACHE
	var $importbox = $('#em-import-box');
	var $contentbox = $('#em-import-content');

	//ÉVENEMENT AU CLICK SUR LE BOUTON DE RECHERCHE
	$(document).on('click','#search-to-soundcloud',function(e){
		e.preventDefault();
		var searchQuery = escape($('#em-search').val());
		var searchType = $('.search-type:checked').val();
		var out = new String;

		//INIT DE SC
		SC.initialize({
	  		client_id: emsc['apikey']
		});

		//RECHERCHE...
		if( searchType == 'track' ) {
			// -> SONGS
			SC.get('/tracks', { q: searchQuery}, function(tracks) {
				// console.log(tracks);
				//PREPARE OUTPUT
				out += '<div id="output-search" class="output-search">';

				//EXPLODE DE L'OBJET RETOURNÉ
				for(var i=0;i<tracks.length;i++) {
					out += '<label class="song-to-insert clb">';
						out += '<input type="radio" name="song-to-insert" value="' + tracks[i].id + '" class="insert-checkbox">';
						if( ! isset( tracks[i].artwork_url ) ) tracks[i].artwork_url = emsc['defaultImg'];
						out += '<img src="' + tracks[i].artwork_url + '" class="insert-img">';
						out += '<div class="insert-name">' + tracks[i].title + '</div>';
					out += '</label>';
				}
				out += '</div>';

				//PRINT OUTPUT
				$importbox.show();
				$contentbox.html(out);
			});
		} else if( searchType == 'user') {
			// -> USERS'S SONGS
			SC.get('/users', { q: searchQuery}, function(users) {
				// console.log(tracks);
				//PREPARE OUTPUT
				// console.log(users);
				out += '<div id="output-search" class="output-search">';

				//EXPLODE DE L'OBJET RETOURNÉ
				for(var i=0;i<users.length;i++) {
					SC.get('/users/' + users[i].id + '/tracks',{limit: 1},function(tracks) {
						// console.log(tracks);
						for(var j=0;j<tracks.length;j++) {
							out += '<label class="song-to-insert clb">';
								out += '<input type="radio" name="song-to-insert" value="' + tracks[j].id + '" class="insert-checkbox">';
								if( ! isset( tracks[j].artwork_url ) ) tracks[j].artwork_url = emsc['defaultImg'];
								out += '<img src="' + tracks[j].artwork_url + '" class="insert-img">';
								out += '<div class="insert-name">' + tracks[j].title + '</div>';
							out += '</label>';

							if(i == users.length && j == tracks.length) {
								//PRINT OUTPUT
								out += '</div>';
								$importbox.show();
								$contentbox.html(out);
							}
						}
					});
				}
			});
		}
	});
	
	$('#em-close-area').on('click',function(){
		$importbox.hide();
	});
});