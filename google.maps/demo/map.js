/**
 * Author: James Tang<james@fwso.cn>
 * Date: 2010-09-25
 * (C) 2010 fwso.cn. All Rights Reserved.
 */

/**
 * JMap namespace
 * @param JSON opt, settings for JMap, 
 * 			{	
 *				id: string, //required, domID, 
 * 				lat: number, //default latitude
 *				lng: number, //default longitude
 *				addr: string, //default address to search
 *				zoom: number,
 *				type: google.maps.MapTypeId....
 *			}
 * 				
 */
function JMap (opt) {
	
	//default settings
	this.settings = opt;
	
	//The map object
	this.map = null;
	
	//The marker handler
	this.marker = null;
	
	//Current Position: LatLng
	this.position = null;
	
	this.mapBox = null;
	
	this.address = "";
	
	this.zoom = (this.settings.zoom ? this.settings.zoom : 4);
	
	//http://code.google.com/apis/maps/documentation/javascript/reference.html#MapTypeId
	//ROADMAP, HYBRID, SATELLITE, TERRAIN
	this.type = (this.settings.type ? this.settings.type : google.maps.MapTypeId.ROADMAP);
	
	this.infoWindow = null;
	
	this.infoNode = null;
	
	this.geocoder = null;
	
	this.circle = null;
	
	this._init();
}

JMap.logOn = true;

JMap.log = function (_msg, _alert) {
	if (JMap.logOn === true) {
		if (window.console && window.console.log) {
			window.console.log(_msg);
		} else if (_alert === true) {
			alert(_msg);
		}
	}
};

JMap.prototype._init = function () {
	
	var _this = this;
	
	this.mapBox = document.getElementById(this.settings.id);
	
	if (!this.mapBox) {
		JMap.log("Element " + this.settings.id + " does not exists: Failed to initialize map.", true);
	} else {
		//(32.959, 107.957) is the default position
		var lat = (this.settings.lat ? this.settings.lat : 32.959);
		var lng = (this.settings.lng ? this.settings.lng : 107.957);
		
		this.position = new google.maps.LatLng(lat, lng);
		
		this.map = new google.maps.Map(this.mapBox, {
			center:_this.position,
			zoom: _this.zoom,
			mapTypeId: _this.type
		});
		
		this.marker = new google.maps.Marker({
			position: _this.position,
			map: _this.map,
			draggable: true
		});
		
		this.geocoder = new google.maps.Geocoder();
		
		var _infoBox = document.createElement("div");
		_infoBox.setAttribute("id", "mapPositionInfo");
		
		this.infoNode = document.createElement("div");
		this.infoNode.setAttribute("id", "mapPositionInfoText");
		
		//this.infoNode.appendChild(document.createTextNode("Hello#" + this.address));
		this.infoNode.innerHTML = this.address;
		
		var _doSaveBox = document.createElement("div");
		_doSaveBox.setAttribute("id", "mapSavePosition");
		
		var _doSaveBt = document.createElement("input");
		_doSaveBt.setAttribute("type", "button");
		_doSaveBt.setAttribute("id", "mapSavePositionBt");
		_doSaveBt.setAttribute("value", "保存该地址");
		
		$(_doSaveBt).click(function () {
			JMap.log("_doSaveBt: " + _this.position.lat() + ", " + _this.position.lng() + ", " + _this.address, true);
		});
		
		_doSaveBox.appendChild(_doSaveBt);
		_infoBox.appendChild(this.infoNode);
		_infoBox.appendChild(_doSaveBox);
		
		//this.infoWindow = new google.maps.InfoWindow({"content":'<div id="mapPositionInfo">You are here</div>'});
		this.infoWindow = new google.maps.InfoWindow({"content":_infoBox});
		
		this.updateAddress();
		
		google.maps.event.addListener(this.map, "zoom_changed", function () {
			JMap.log(_this.settings.id + "#zoom: " + _this.map.getZoom());
		});
		
		google.maps.event.addListener(this.map, "center_changed", function () {
			
		});
		
		google.maps.event.addListener(this.marker, "dragend", function () {
			_this.position = _this.marker.getPosition();
			_this.setCenter();
			_this.rezoom();
			_this.updateInfo();
			_this.updateAddress();
			JMap.log(_this.settings.id + "#position: " + _this.position.lat() + ", " + _this.position.lng());
		});
		
		google.maps.event.addListener(this.marker, "click", function () {
			_this.infoWindow.open(_this.map, _this.marker);
		});
		
		if (this.settings.lat || this.settings.lng) {
			this.rezoom(10);
		}
		
	}
};

JMap.prototype.drawCircle = function (_r) {
	
	if (!this.circle) {
		var _this = this;
		this.circle = new google.maps.Circle({
			center: _this.position,
			radius: _r,
			map: _this.map,
			strokeColor: "#3366FF"
		});
	} else {
		this.circle.setCenter(this.position);
		this.circle.setRadius(_r);
	}
	
};

JMap.prototype.updateAddress = function () {

	var _this = this;
	
	this.geocoder.geocode({latLng: this.position}, function (result, status) {
		
		var _addr = '';
		if (status == google.maps.GeocoderStatus.OK) {
			
			_addr = result[0].formatted_address;
			$("#addressInput").val(_addr);
			
			JMap.log("New Address:" + _this.position.lat() + ", " + _this.position.lng() + ", FA:" + _addr);
			
			if (JMap.logOn === true) {
				for (var i = 0; i < result.length; i++) {
					JMap.log(i + "#" + result[i].formatted_address);
				}
			}
			
		} else {
			_addr = '没有找到该地址';
			//google.maps.GeocoderStatus.
			switch (status) {
				case google.maps.GeocoderStatus.ERROR:
					_addr = '无法连接地图服务器，请检查你的网络连接';
					JMap.log(status + "#There was a problem contacting the Google servers.");
				break;
				
				case google.maps.GeocoderStatus.INVALID_REQUEST:
					JMap.log(status + "#This GeocoderRequest was invalid.");
				break;
				
				case google.maps.GeocoderStatus.OVER_QUERY_LIMIT:
					JMap.log(status + "#The webpage has gone over the requests limit in too short a period of time.");
				break;
				
				case google.maps.GeocoderStatus.REQUEST_DENIED:
					JMap.log(status + "#The webpage is not allowed to use the geocoder.");
				break;
				
				case google.maps.GeocoderStatus.UNKNOWN_ERROR:
					JMap.log(status + "#A geocoding request could not be processed due to a server error. The request may succeed if you try again.");
				break;
				
				case google.maps.GeocoderStatus.ZERO_RESULTS:
					JMap.log(status + "#No result was found for this GeocoderRequest.");
				break;
			}
		}
		
		_this.address = _addr;
		_this.updateInfo();
		JMap.log("_this.address=" + _this.address);
	});
};

JMap.prototype.rezoom = function (_zoom) {
	
	_zoom = ( (_zoom && _zoom >= 0 && _zoom <= 20) ? _zoom : 13);
	this.map.setZoom(_zoom);
	
};

JMap.prototype.updateInfo = function () {
	//this.infoWindow.setContent('<div id="mapPositionInfo">' + this.address + '</div>');
	this.infoNode.innerHTML = this.address;
};

JMap.prototype.setCenter = function () {
	this.map.setCenter(this.position);
};

JMap.prototype.setMarker = function () {
	this.marker.setPosition(this.position);
};

JMap.prototype.getData = function () {
	return {
		lat: this.position.lat(),
		lng: this.position.lng(),
		address: this.address
	};
};

JMap.prototype.doSearch = function (_addr) {
	//TODO do address search
	JMap.log("Do Search: " + _addr);
	this.address = _addr;
	var _this = this;
	
	this.geocoder.geocode({address: _this.address}, function (result, status) {
		if (status == google.maps.GeocoderStatus.OK) {
			_this.address = result[0].formatted_address;
			_this.position = result[0].geometry.location;
			_this.setCenter();
			_this.setMarker();
			_this.rezoom();
			_this.updateInfo();
			
			JMap.log("New Location:" + _this.position.lat() + ", " + _this.position.lng() + ", FA:" + _this.address);
			
		} else {
			JMap.log("Failed to get position:" + status);
		}
	});
	
};

JMap.test = function () {
	var latlng = new google.maps.LatLng(32.959, 107.957);//(39.904, 151.207);
	var opts = {
		center: latlng,
		zoom:4,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	var node = document.getElementById("jmapBox");
	var map = new google.maps.Map(node, opts);
	
	var marker = new google.maps.Marker({
      position: latlng, 
      map: map,
	  draggable: true,
      title:"Hello World!"
	});
	
	google.maps.event.addListener(map, "zoom_changed", function () {
	
	});
	
	google.maps.event.addListener(marker, 'dblclick', function() {
		var p = marker.getPosition();
		window.console.log("Position: " + p.lat() + ", " + p.lng());
	});
	
};


var mapa = null;

(function () {
	google.load("maps", 3, {"other_params": "sensor=false&language=zh-CN"});
})();

window.onload = function () {
	var opt = {id:"jmapBox"};
	
	if (google.loader && google.loader.ClientLocation
			&& google.loader.ClientLocation.latitude && google.loader.ClientLocation.longitude) {
		opt.lat = google.loader.ClientLocation.latitude;
		opt.lng = google.loader.ClientLocation.longitude;
		opt.addr = google.loader.ClientLocation.address.city;
	}
	
	mapa = new JMap(opt);
	
	$("#doSearchBt").click(function () {
		mapa.doSearch($("#addressInput").val());
	});
	
	
	$("#savePositionBt").click(function () {
		var data = mapa.getData();
		JMap.log("Data: " + data.lat + ", " + data.lng + ", " + data.address);
	});
	
	$("#searchform").submit(function () {
		mapa.doSearch($("#addressInput").val());
		return false;
	});
	//mapa = new JMap({id:"jmapBox", lat: 39.904, lng: 151.207});
	//JMap.test();
	
};