/* Add here all your JS customizations */
$(document).ready(function(){
    $('.on-default.remove-row').click(function(){

        var token = $('meta[name="csrf_token"]').attr('content');

        var lang = $('meta[http-equiv="Content-Language"]').attr('content');

        var id = $(this).parent('span').parent('.dd-item').attr('data-id');

        $.ajax({
            url: '/'+lang+'/cms/structure/'+id,
            method:"POST",
            data: {
                _token : token,
                _method : "DELETE"
            },
            success: function (res) {
                Main.showMessage(res['message'],res['title'],res['type']);
            }

        });
    });
});