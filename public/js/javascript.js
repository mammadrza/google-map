

$('.links li').hover(function() {
	$(this).css({
		transform: 'translateX(10px)',
		transition: '1s all ease'
	});
}, function() {
	$(this).css({
		transform: 'translateX(0px)',
		transition: '1s all ease'
	});
});
$('.social ul li').hover(function() {
	$(this).children('a').css({
		color: '#4a6d9d',
	});
	$(this).css({
		transform: 'translateY(-10px)',
		transition: '300ms all ease'
	});
}, function() {
	$(this).children('a').css({
		color: '#707070'
	});
	$(this).css({
		transform: 'translateY(0)',
		transition: '300ms all ease'
	});
});
