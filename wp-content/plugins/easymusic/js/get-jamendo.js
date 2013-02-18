jQuery(document).ready(function($){
	var $importbox = $('#em-import-box');
	var $contentbox = $('#em-import-content');

	$(document).on('click','#search-to-jamendo',function(e){
		e.preventDefault();
		var searchQuery = escape($('#em-search').val());
		var searchType = $('.search-type:checked').val();
		$.ajax({
			url:'http://api.jamendo.com/get2/id+name+image/' + searchType + '/jsonpretty/?searchquery=' + searchQuery,
			type:'POST',
			success:function(data){
				// console.log(data);
				var obj = new Array;
				for(var i = 0; i < data.length; i++){
					obj.push('<a href="#"><img src="' + data[i].image + '">' + data[i].name + '</a><br>');
				}
				console.log(obj);
				$importbox.show();
				$contentbox.append(obj);


			}
		});
	});
	
	$('#em-close-area').on('click',function(){
		$importbox.hide();
	});
});