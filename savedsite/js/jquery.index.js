$(document).ready(function() {
	//when hover over the div with class = photo,
	//find the caption and change its css top property value from
	//its original value -270px to 0
    $('.photo').hover(function() {
      $(this)
        .find('.caption')
        .stop()
        .animate({ top: '0px' }, { duration: 1600, easing: 'easeOutBounce' });
    }, function() {
	//on mouseout, put the original value back in
      $(this)
        .find('.caption')
        .stop()
        .animate({ top: '-270px' }, { duration: 1600, easing: 'easeOutBack' });
    });

});