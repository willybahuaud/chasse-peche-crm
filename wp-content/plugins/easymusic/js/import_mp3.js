jQuery(document).ready(function($) {

	songfield = null, num ='';
	$('.upload_song_button').live('click',function() {
		$('html').addClass('song');
		num = $(this).attr('data-cible');
		songfield = $('.url_song_input[data-input="'+num+'"]').attr('name');
		var id=$("#post_ID").val();
		tb_show('', 'media-upload.php?post_id='+id+'&type=audio&TB_iframe=true');
		return false;
	});

	// user inserts file into post. only run custom if user started process using the above process
	// window.send_to_editor(html) is how wp would normally handle the received data

		window.original_send_to_editor = window.send_to_editor;
		window.send_to_editor = function(html){
	    var fileurl;
		if(songfield!== null){
			fileurl = $(html).filter('a').attr('href');

			$('.url_song_input[data-input="'+num+'"]').val(fileurl);

			tb_remove();

			$('html').removeClass('song');
			songfield = null;
			num = null;
		}else{
			window.original_send_to_editor(html);
		}
	}

});