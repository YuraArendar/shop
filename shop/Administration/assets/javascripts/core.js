var Main = {

	init: function(){

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
		var response = $.ajax({
			url: $(this).attr('action'),
			method:"POST",
			data: $(this).serialize(),
			dataType:"json",
			success: function (res) {

				var hasError = true;

				$.each(res,function(i,value){

					var el = $('#'+i+'-error');
					el.show();
					el.html(value);
					if(value != ''){
						hasError = true;
					}
				});
				if(hasError){
					$('#success-input').val(1);
				}

			}
		});

		if($('#success-input').val() == 1){
			return true;
		}else{
			return false;
		}

	});
});