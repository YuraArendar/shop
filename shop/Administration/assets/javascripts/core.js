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

		console.log(form);

		return false;
	}
}

$(document).ready(function(){
	Main.init();

	$('form').submit(function(){

		$.ajax({
			url: $(this).attr('action'),
			method:"POST",
			data: $(this).serialize(),
			dataType:"json",
			success: function (res) {
				console.log(res);
				if(typeof res['redirect'] !=='undefined')
					window.location.href =  res['redirect'];
				$.each(res,function(i,value){
					var el = $('#'+i+'-error');
					el.show();
					el.html(value);
				});


			}
		});
		return false;





		//return false;
		if($('#success-input').val() == 1){
			return true;
		}else{
			return false;
		}

	});
});