/**
 * CObject
 */
function CObject (id, name, email) {
	var _id = id;
	var _name = name;
	var _email = email;

	this.key = 'HelloYou';
	
	this.getId = function () {
		return _id;
	};
	
	this.getName = function () {
		return _name;
	};
	
	this.getEmail = function () {
		return _email;
	};
	
	this.setId = function (id) {
		_id = id; 
	}
	
	this.setName = function (name) {
		_name = name;
	}
	
	this.setEmail = function (email) {
		_email = email;
	}
}

CObject.prototype.toString = function () {
	//return this._id + ', ' + this._name + ', ' + this._email;
	return this.getId() + ', ' + this.getName() + ', ' + this.getEmail();
};




try {
	var co = new CObject(10, 'Peter', 'peter@fwso.cn');
	window.console.log(co.getId() + ', ' + co.getName() + ', '  + co.getEmail());
	co.setEmail('peter.ok@fwso.cn');
	window.console.log(co.getId() + ', ' + co.getName() + ', '  + co.getEmail());
	window.console.log(co._id + ', ' + co._name + ', '  + co._email);	
	window.console.log(co.toString());
	window.console.log(co.key);
} catch (e) {
	window.console.error(e);
}