$('.panel_hover').hover({
	function () {
		$('.main_title').prepend($("<p>テスト</p>"))
		.append('somewhere')
		.after('aaaaaa')
		.before('content');
	},
	function () {
		$(this).find("span:last").remove();
	}
});

jQuery(function($) {
	var NavDistanse= $('#navi'),
	 NavOffset=NavDistanse.offset();
	$(window).scroll(function () {
	if($(window).scrollTop() > NavOffset.top) {
		NavDistanse.addClass('fixed');
		NavDistanse.addClass('bgcolor')
	}else{
		NavDistanse.removeClass('fixed');
	}
	});
});



// console.log("NavOffset');
