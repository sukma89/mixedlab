	Date.isLeapYear = function (year) {
		var y = year && year > 0 ? year : (new Date()).getFullYear();
		return (y % 4 == 0) && ( (y % 100 != 0) || (y % 400 == 0) ); 
	}
	
	Date.getMonthDays = function (year, month) {
		
		var day30 = {
			"4": true, 
			"6":true, 
			"9":true, 
			"11":true
		};
		
		if (month == 2) {
			if (Date.isLeapYear(year)) {
				return 29;
			}
			return 28;
		} else if (day30[month] === true) {
			return 30;
		}
		
		return 31;
	}
	
