
/*
多余部分用省略号来代替，
15年8月2号做
*/


(function($) {
	$.fn.ellipsis = function(maxCharCount) {
		return $(this).each(function(){
			var el = $(this);
			//var originalText = el.html();
            var originalTextLength = el.html().length;
            var max = maxCharCount;
            var tempNode = $(this.cloneNode(true));            

            if(originalTextLength > max){
            	var text = originalText.substr(0, trimLocation);
	            tempNode.html(text + "&hellip;");
            }

		});
	});

})(jQuery); 