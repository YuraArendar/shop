var Main = {

	init: function(){
		$('input').click(function(){
			$(this).next('.error').html('').hide();
			$($(this).closest(".form-group")).removeClass("has-error");
		});

		$('select').click(function(){
			$(this).next('.error').html('').hide();
			$($(this).closest(".form-group")).removeClass("has-error");
		});

	},


	//Вывод тостов
	showMessage: function(message, title, type){
		new PNotify({
			title: title,
			text: message,
			type: type
		});
	},

	submitForm:function(form){
		$.ajax({
			url: $(form).attr('action'),
			method:"POST",
			data: $(form).serialize(),
			dataType:"json",
			success: function (res) {
				if(typeof res['redirect'] !=='undefined')
					window.location.href =  res['redirect'];
				if(typeof res['message'] !=='undefined')
					Main.showMessage(res['message']['message'],res['message']['title'],res['message']['type']);
				$.each(res,function(i,value){
					var el = $('#'+i+'-error');
					el.show();
					el.html(value);
				});


			}
		});
		return false;
	},
	// Вывод диалога подтверждения и вызов фунции если есть при подтверждении
	showDialog: function(selector,title,text,func){
		($(selector).find('.panel-title')).html(title);
		($(selector).find('.modal-text')).html(text);
		$.magnificPopup.open({
			items: {
				src: selector,
				type: 'inline',
				modal:true
			}
		});
		$(selector).find('.modal-confirm').on('click', function (e) {
			e.preventDefault();
			$.magnificPopup.close();
			if(typeof func !=='undefined')
				func();
		});

	}
}

$(document).ready(function(){
	Main.init();
});