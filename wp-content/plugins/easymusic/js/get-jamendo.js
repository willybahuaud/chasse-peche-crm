jQuery(document).ready(function($){
	$(document).on('click','#search-to-jamendo',function(e){
		e.preventDefault();
		var searchQuery = escape($('#em-search').val());
		var searchType = $('.search-type:checked').val();
		$.ajax({
			url:'http://api.jamendo.com/get2/id+name/' + searchType + '/jsonpretty/?searchquery=' + searchQuery,
			type:'POST',
			success:function(data){
				console.log(data);
				// console.log(data[0].name);
			}
		});
	});
});