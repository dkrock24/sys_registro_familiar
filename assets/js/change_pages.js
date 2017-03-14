$( document ).ready(function() {
	$("a#submenu").click(function(){
		var pages = $(this).attr('href');
		
		var data = pages.substr(1);
		var titulo = $(this).text();
		//var titulo = $("#titulo_sub").val();
		

		$(".titulo_submenu").html("<span>"+titulo+"</span>");

		$(".pages").load("pages/"+data);

	});
})
	
