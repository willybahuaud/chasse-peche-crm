function isset ()
{
    // http://kevin.vanzonneveld.net
    // +   original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +   improved by: FremyCompany
    // +   improved by: Onno Marsman
    // +   improved by: Rafał Kukawski
    // *     example 1: isset( undefined, true);
    // *     returns 1: false
    // *     example 2: isset( 'Kevin van Zonneveld' );
    // *     returns 2: true

  var a = arguments,
    l = a.length,
    i = 0,
    undef;

  if (l === 0)
  {
    throw new Error('Empty isset');
  }

  while (i !== l)
  {
    if (a[i] === undef || a[i] === null)
    {
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
	  		client_id: 'cc1adde6d38da9d175c6959e26752262'
		});

		//RECHERCHE...
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

			// console.log(out);

			//PRINT OUTPUT
			$importbox.show();
			$contentbox.html(out);
		});
	});
	
	$('#em-close-area').on('click',function(){
		$importbox.hide();
	});
});