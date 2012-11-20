/**
 * jQuery Scrollable Plugin
 * 
 * 
 * Date: 2010-03-21
 * 
 * @author James Tang (iFutureTech.com)
 * @version 1.0.0
 */



(function ($) {
	
	$._debug = true;
	
	$.debug = function (msg) {
		if (!$._debug) {
			return;
		}
		
		if (window.console) {
			window.console.log(msg);
		} else {
			alert(msg);
		}
	}
	
	
	$.fn.scrollable = function (options) {
		
		
		return this.each(function () {
			var _this = $(this);
			
			$.debug("Scroll Content: " + _this.find(".scrollContent").width());
			
			var diffWidth = 0;
			
			var contentListWidth = 0;
			
			var contentList = _this.find(".scrollContent ul");
			
			if (options && options.diffWidth) {
				diffWidth = options.diffWidth;
			} else {
				diffWidth = _this.find(".scrollContent").first().width();
			}
			
			if (options && options.contentListWidth) {
				contentListWidth = options.contentListWidth;
			} else {
				contentListWidth = contentList.find("li").size() * contentList.find("li").first().outerWidth(true);
			}
			
			contentList.css({"left": 0, "width" : contentListWidth});
			
			var pages = Math.ceil(contentListWidth / diffWidth);
			
			var currentPage = 1;
			
			var lastPageLeft = - (pages - 1) * diffWidth;
			
			var pageCount = _this.find(".pageCount");
			
			pageCount.text(currentPage + "/" + pages);
			
			$.debug("diffWidth: " + diffWidth + ", contentListWidth:" + contentListWidth);
			
			_this.find(".pageNav").text("").click(function () {
				
				if ($(this).hasClass("prevPage")) {
					
					var to  = parseInt(contentList.css("left")) + diffWidth;
					$.debug("Right To: " + to);
					if (to > 0) {
						contentList.css("left", -contentListWidth);
						to = lastPageLeft;
					}
					
					currentPage = parseInt(Math.abs(to) / diffWidth) + 1;
					pageCount.text(currentPage + "/" + pages);
					
					contentList.animate({"left" : to});
					
				} else {
					
					var to  = parseInt(contentList.css("left")) - diffWidth;
					
					if (Math.abs(to) >= contentListWidth) {
						contentList.css("left", diffWidth);
						to = 0;
					}
					
					currentPage = parseInt(Math.abs(to) / diffWidth) + 1;
					pageCount.text(currentPage + "/" + pages)
					$.debug("Left To: " + to);
					contentList.animate({"left" : to});
					
				}
				
			});
			
			
		});
		
	};
	
}) (jQuery);