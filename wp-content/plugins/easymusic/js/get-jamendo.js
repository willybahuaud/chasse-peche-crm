jQuery(document).ready(function($){
	$(document).on('click','#search-to-jamendo',function(e){
		e.preventDefault();
		var searchQuery = escape($('#em-search').val());
		var searchType = $('.search-type:checked').val();
		$.ajax({
			url:'http://api.jamendo.com/get2/id+name/' + searchType + '/jsonpretty/?searchquery=' + searchQuery,
			type:'POST',
			success:function(data){
				// console.log(data);
				var obj = new Array;
				for(var i = 0; i < data.length; i++){
					obj.push('<a href="#">' + data[i].name + '</a>');
				}
				console.log(obj);
			}
		});
	});
});