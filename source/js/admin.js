(function($) {
	"use strict";
	var preloader = require("./hm_modules/preloader.js"),
		adminTabs = require("./hm_modules/tabs.js"),
		tinyMceL10n = require("./hm_modules/tinymce_l10n.js"),
		popup = require("./hm_modules/popup.js"),
		pickMeUp = require("./hm_modules/pickMeUp.js");

	popup.init("#hm-popup", ".hm-popup__text", ".hm-popup__close");


	// ==============================
	// TODO: ADMIN HANDLERS
	// ==============================
	if($(".admin-page").length){
		adminTabs(".tabs-control__item", ".tabs-content__item");
		pickMeUp(".form__field_date");
		tinymce.init({
			selector: ".tinymce-field",
			plugins: "link, image",
			min_height: 200,
			menubar: false,
			toolbar1: "undo redo | bold italic | link image",
			toolbar2: "alignleft aligncenter alignright"
		});

		tinyMceL10n();



		// Image preview
		$(".form__field_file").on("change", function(){
			var input = this,
				preview;

			if($("#image-src").length > 0){
				preview = $("#image-src");
			} else {
				preview = $("<img id='image-src'/>");
				$(".form__field_image-preview").append(preview);
			}

			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function(e){
					preview.attr("src", e.target.result);
				};

				reader.readAsDataURL(input.files[0]);
			}
		});



		// Skills handlers
		$(".skills").on("click", function(e){
			var clicked = $(e.target);

			if(clicked.is(".skills__remove")){
				$(clicked)
					.closest(".skills__block")
					.fadeOut(500, function(){
						$(this).remove();
					});
			}

			if(clicked.is(".skill__remove")){
				$(clicked)
					.closest(".skill")
					.fadeOut(300, function(){
						$(this).remove();
					});
			}

			if(clicked.is(".skill__new")){
				var button = clicked,
					skill_wrap = $("<li class='skill'></li>"),
					skill_name = $("<input class='skill__name' type='text' placeholder='Технология'/>"),
					skill_perc = $("<input class='skill__percentage' type='number' min='0' max='100' step='0.5' value='0'/>"),
					skill_misc = $("<span class='skill__misc'><span class='skill__percent-sign'>%</span><span class='skill__remove fa fa-close'></span></span>");

				skill_wrap.append(skill_name, skill_perc, skill_misc);
				button.before(skill_wrap);
			}
		});



		$(".skills__block_new").on("click", function(){
			var empty_block = $(this),
				skills_wrap = $("<div class='skills__block'></div>"),
				skills_remove = $("<div class='skills__remove fa fa-close'></div>"),
				skills_heading = $("<input class='skills__heading' type='text' placeholder='Категория'/>"),
				skills_list = $("<ul class='skills__list'><li class='skill skill__new fa fa-plus'></li></ul>");

			skills_wrap.append(skills_remove, skills_heading, skills_list);
			empty_block.before(skills_wrap);

		});

		$("form").on("submit", function(e){
			var form = $(this);
			e.preventDefault();
			form.ajaxSubmit({
				type: "POST",
				url: "/admin",
				dataType: "json",
				success: function(resp){
					popup.showPopup(resp.message, 2500);
				},
				error: function(){
					popup.showPopup("Упс. На сервере произошла ошибка.<br/>Попробуйте позже.", 2500);
				}
			});



			// $.ajax({
			// 	type: "POST",
			// 	url: "/admin"
			// 	// data: form.serialize(),
			// 	// dataType: "json"
			// }).done(function(resp) {
			// 	popup.showPopup(resp.message,2000);
			// 	// resetForm(form);
			// }).fail(function(){
			// 	popup.showPopup("Упс. На сервере произошла ошибка.<br/>Попробуйте позже.");
			// 	// resetForm(form);
			// });
			// return false;
		});

	}


	preloader();

})(jQuery);