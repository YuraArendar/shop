/* Add here all your JS customizations */

$(document).ready(function(){
    $('.on-default.remove-row').click(function(){
        var id = $(this).parent('span').parent('.dd-item').attr('data-id');
        var  func = function(){

            var token = $('meta[name="csrf_token"]').attr('content');

            $.ajax({
                url: location.href+'/delete/'+id,
                method:"POST",
                data: {
                    _token : token
                },
                success: function (res) {
                    if(res['status']=='ok')
                        location.reload();
                }

            });
        };

        Main.showDialog($(this).attr('href'),'Are you sure?','Delete this structure?',func);

        return false;
    });

    $('.check-active').click(function (){
        var token = $('meta[name="csrf_token"]').attr('content');
        var id = $($(this).closest(".dd-item")).attr("data-id");
        var active = 1;
        if($(this).children('.ios-switch').hasClass('off'))
            active = 0;
        $.ajax({
            url: location.href+'/active/'+id,
            method:"POST",
            data: {
                _token : token,
                active: active
            },
            success: function (res) {

            }

        });

    });




});

$(document).on('click', '.modal-dismiss', function (e) {
    e.preventDefault();
    $.magnificPopup.close();
});