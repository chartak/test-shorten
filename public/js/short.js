$('.form').submit(function (event) {
    var aData = $(this).serializeArray();

    event.preventDefault();
    var form = $(this)

        var sActionUrl = "/shortLink";
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            headers: {'X-CSRF-TOKEN': CSRF_TOKEN},
            type: "POST",
            url: sActionUrl,
            dataType: 'JSON',
            data: aData,
            beforeSend: function() {
                $(".loader").css({"visibility": "visible"})
            },
            success: function (response) {
                if($.isEmptyObject(response.error)){

                    showMessage(response.success);
                    $('#shorterList').html(response.ht);
                }else{
                    showMessage(response.error);
                }
            },
            complete: function() {
                $(".loader").css({"visibility": "hidden"})
            },
        });
});

function showMessage(message){
    $(".show-message").html('');
    $(".show-message").append(message);
    $(".show-message").css('display','block');
}