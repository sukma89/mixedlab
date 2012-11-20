/**
 * File: main-action.js The main action for JChromeEx, a chrome extension.
 * 
 * Author: James Tang <fwsous@gmail.com> Date: 2010-09-03 Copyright (C) 2010 <a
 * href="http://fwso.cn">James Tang</a>.
 * 
 * 
 * USAGE:
 * 
 * <ul>
 * <li>CTRL+I focus the top input field</li>
 * <li>CTRL+ALT+N open google notebook</li>
 * <li>CTRL+ALT+M open gmail</li>
 * <li>CTRL+ALT+C open google code</li>
 * <li>CTRL+ALT+D open googl dictionary</li>
 * <li>CTRL+ALT+R open google reader</li>
 * </ul>
 * 
 * <p>
 * KEYCODE[ASIC]: CTRL=17,ALT=18,I=73,n=78,M=77,C=67,D=68,R=82,J=74, K=75, H=72,
 * L=76
 * </p>
 */

var jcex_input = null;
var jcex_is_input = false;

var jcex_isalt = false;
var jcex_isctrl = false;

var jcex_search_list = null;
var jcex_sl_index = -1;

// var jcex_page_list = null;
// var jcex_page_index = -1;

$(document).ready(function() {

	window.console.log("JChromeEX Loaded");

	jcex_input = $("input[type='text']:first");

	$("input[type='text']").focus(function() {

		jcex_is_input = true;

	}).blur(function() {

		jcex_is_input = false;

	});

	jcex_search_list = $("h3.r a");
	var jcex_page_list = $("table#nav a.fl");

	if (jcex_search_list.length > 0) {
		jcex_search_list = jcex_search_list.get();
	}

	if (jcex_page_list.length > 0) {

		if (jcex_search_list.length > 0) {

			jcex_search_list = jcex_search_list.concat(jcex_page_list.get());

		} else {

			jcex_search_list = jcex_page_list.get();

		}
	}
	
	// Show dictionary examples
	if ($("#dct-clk-a").length > 0) {
		
		(function (){var b,c=document.getElementById("dct-clk-im"),a=document.getElementById("dct-clk-show"),d=document.getElementById("dct-clk-hide");if(a.style.display=="none"){b="none";a.style.display="inline";d.style.display="none";c.style.backgroundPosition="-91px -74px"}else{b="list-item";a.style.display="none";d.style.display="inline";c.style.backgroundPosition=
		"-105px -74px"}var e=document.getElementById("pr-root"),h=e.getElementsByTagName("li");for(var f=0;f<h.length;++f)if(h[f].className=="dct-ee")h[f].style.display=b})();
		
	}

}).keydown(
		function(event) {

			event.keyCode = parseInt(event.keyCode);

			console.log("KEY: " + event.keyCode + ", jcex_is_input="
					+ jcex_is_input + ", jcex_isctrl=" + jcex_isctrl
					+ ", jcex_isalt=" + jcex_isalt
					+ ", jcex_search_list.length=" + jcex_search_list.length);

			if (event.keyCode == 17) {

				jcex_isctrl = true;

			} else if (event.keyCode == 18) {

				jcex_isalt = true;

			} else if (event.keyCode == 73 && jcex_isctrl) {

				jcex_input.focus();

			} else if ($.inArray(event.keyCode, [ 67, 68, 77, 78, 82 ]) >= 0
					&& jcex_isctrl && jcex_isalt) {
				jcex_isctrl = false;
				jcex_isalt = false;
				
				chrome.extension.sendRequest( {
					code : event.keyCode
				}, function(response) {
					console.log(response);
				});

				window.console.log("[JChromeEX]Try to open " + event.keyCode);

			} else if ($.inArray(event.keyCode, [74, 75]) >= 0
					&& !jcex_is_input && !jcex_isctrl && !jcex_isalt
					&& jcex_search_list.length > 0) {

				if (event.keyCode == 74) {

					jcex_sl_index++;
					if (jcex_sl_index >= jcex_search_list.length) {
						jcex_sl_index = 0;
					}

				} else if (event.keyCode == 75) {

					jcex_sl_index--;
					if (jcex_sl_index < 0) {
						jcex_sl_index = jcex_search_list.length - 1;
					}

				}
				/*
				 * else if (event.keyCode == 72) {
				 * 
				 * jcex_page_index--; if (jcex_page_index < 0) { jcex_page_index =
				 * jcex_page_list.length - 1; } } else if (event.keyCode == 76) {
				 * 
				 * jcex_page_index++; if (jcex_page_index >=
				 * jcex_page_list.length) { jcex_page_index = 0; } }
				 */

				$(jcex_search_list[jcex_sl_index]).focus();
				// $(jcex_page_list[jcex_page_index]).focus();
			}

		}).keyup(function(event) {

	if (parseInt(event.keyCode) == 17) {
		jcex_isctrl = false;
	} else if (parseInt(event.keyCode) == 18) {
		jcex_isalt = false;
	}
});
