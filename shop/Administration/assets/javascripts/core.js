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
	}
}

$(document).ready(function(){
	Main.init();
});