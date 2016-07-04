var match_arr = {
		"username" : /[a-zа-я0-9_-]{2,}/g,
		"email" : /([a-z0-9_\.-]+)@([a-z0-9_\.-]+)\.([a-z\.]{2,6})/g,
		"text" : /.{10,}/g
	},
	errors_arr = {
		"username" : "Имя должно быть длиннее 2х символов и не содержать посторонних знаков",
		"email" : "Email имеет неверный формат<br/>Например: ex@mp.le",
		"text" : "Ваше сообщение должно быть не короче 10 символов"
	};



var showPopup = function(text, time){
	var popup = $("#hm-popup"),
		content = popup.find(".hm-popup__text"),
		close = popup.find(".hm-popup__close");

	content.html(text);
	popup.removeClass("hide").addClass("show");

	if(time){
		setTimeout(function(){
			popup.removeClass("show").addClass("hide");
		}, time);
	}

	close.on("click", function(){
		popup.removeClass("show").addClass("hide");
	});
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
		valid = true,
		errorText = "Пожалуйста исправьте ошибки заполнения.",
		tooltip_template = $("<div class='tooltip'></div>"),
		form_offset = form_obj.offset().top;


	fields.each(function() {
		var field = $(this),
			check_type = field.data("check"),
			value = field.val(),
			tooltip_offset = field.offset().top - form_offset;

		if(!value.match(match_arr[check_type])){
			var field_tooltip;

			if(field.next().hasClass("tooltip")){
				field_tooltip = field.next("tooltip");
			} else {
				field_tooltip = tooltip_template.clone();
				field.after(field_tooltip);
			}

			field_tooltip.css({
				"top" : tooltip_offset
			});

			field_tooltip.html(errors_arr[check_type]).fadeIn();

			field.addClass("error");

			valid = false;
		}
	});

	if(valid){
		return true;
	}else{
		showPopup(errorText, 2000);
		return false;
	}

};



var resetForm = function(form){
	var text_fields = form.find("input[type=text], input[type=email], textarea"),
		tooltips = form.find(".tooltip");

	tooltips.remove();
	text_fields.removeClass("error valid");
	form[0].reset();
}



var watchForm = function(selector, reset){
	var form = $(selector),
		reset = form.find(reset),
		fields = form.find("input[type=text], input[type=email], textarea");


	fields.on("focus", function(){
		var field = $(this);

		if(field.next().hasClass("tooltip")){
			field.next().remove();
		}
	});

	reset.on("click", function(e){
		e.preventDefault();
		resetForm(form);
	});

	form.submit(function(e) {
		e.preventDefault();

		if(fieldsCheck(form)){
			$.ajax({
				type: "POST",
				url: "process.php",
				data: form.serialize(),
				beforeSend: function(){}
			}).done(function() {

			});

			showPopup("Всё Ок", 2000);
			resetForm(form);
			return false;
		}
		
	});
};



module.exports = {
	watchForm : watchForm,
	onAirCheck : onAirCheck
};