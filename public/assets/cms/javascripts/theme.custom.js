/* Add here all your JS customizations */

$(document).ready(function(){
    $('.on-default.remove-row').click(function(){
        var id = $(this).parent('span').parent('.dd-item').attr('data-id');
        var  func = function(){

            var token = $('meta[name="csrf_token"]').attr('content');

            console.log('id : '+id);
            $.ajax({
                url: location.href+'/'+id,
                method:"POST",
                data: {
                    _token : token,
                    _method : "DELETE"
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

        console.log(location.href);
    });


});

$(document).on('click', '.modal-dismiss', function (e) {
    e.preventDefault();
    $.magnificPopup.close();
});