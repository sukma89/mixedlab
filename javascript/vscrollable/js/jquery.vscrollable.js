/**
 * jQuery VScrollable Plugin
 * 
 * 
 * Date: 2010-03-20
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
	
	
	$.fn.vscrollable = function (options) {
		
		if (!options || !options.itemHeight) {
			return this;
		}
		
		
		return this.each(function () {
			var _this = $(this);
			var inner = _this.find(".vscrollInner");
			var pageCount = _this.find(".vpageCount");
			var pages = _this.find("ul").size();
			var currentPage = parseInt(Math.abs(parseInt(inner.css("top"))) / options.itemHeight) + 1;
			
			pageCount.text(currentPage + "/" + pages);
			$.debug("Pages: " + pages + ", current page: " + currentPage);
			
			_this.find(".vpageNav").each(function () {
				
				var vnav = $(this);
				
				vnav.text("");
				
				if (vnav.hasClass("vprevPage")) {
					vnav.click(function () {
						
						var to = parseInt(inner.css("top")) + options.itemHeight;
						
						if (to > 0) {
							inner.css("top", - options.itemHeight * pages);
							to = - options.itemHeight * (pages -1);
						}
						
						pageCount.text( (parseInt(Math.abs(to/options.itemHeight)) + 1) + "/" + pages);
						
						inner.animate({"top" : to});
						
					});
				} else {
					
					vnav.click(function (){
						
						var to = parseInt(inner.css("top")) - options.itemHeight;
						
						if (Math.abs(to) >= (options.itemHeight * pages)) {
							inner.css("top", options.itemHeight);
							to = 0;
						}
						
						pageCount.text( (parseInt(Math.abs(to/options.itemHeight)) + 1) + "/" + pages);
						
						inner.animate({"top" : to});
						
					});
				}
				
			});
			
			
			
		});
		
	};
	
}) (jQuery);