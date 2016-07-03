var match_arr = {
		"username" : /[a-zа-я0-9_-]{2,}/g,
		"email" : /([a-z0-9_\.-]+)@([a-z0-9_\.-]+)\.([a-z\.]{2,6})/g,
		"text" : /.{10,}/g
	};



var onAirCheck = function(form_selector){
	var fields = $(form_selector).find("input[type=text], input[type=email], textarea");

	fields.on("keyup", function(){
		var field = $(this),
			check_type = field.data("check"),
			value = field.val();

		if(value.match(match_arr[check_type])){
			// alert("OK\nType: " + check_type + "\nVal: " + value + " \nField: " + field);
			field.removeClass("error").addClass("valid");
		}else{
			// alert("notOK\nType: " + check_type + "\nVal: " + value + " \nField: " + field);
			field.removeClass("valid").addClass("error");
		};

	});
};



var fieldsCheck = function (form_obj) {
	var fields = $(form_obj).find("input[type=text], input[type=email], textarea"),
		valid = true;

	fields.each(function() {
		var field = $(this),
			check_type = field.data("check"),
			value = field.val();

		if(!value.match(match_arr[check_type])){
			valid = false;
		}
	});

	return valid;

};



var formSend = function(selector){
	$(selector).submit(function(e) {
		e.preventDefault();
		var form = $(this);
		
		if(fieldsCheck(form)){
			$.ajax({
				type: "POST",
				url: "process.php",
				data: form.serialize(),
				beforeSend: function(){}
			}).done(function() {

			});
			return false;
		}
		
	});
};



module.exports = {
	watchForm : formSend,
	onAirCheck : onAirCheck,
	fieldsCheck : fieldsCheck
};