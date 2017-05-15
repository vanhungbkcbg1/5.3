/**
 * Created by 749 on 2017/05/04.
 */

//window.Pusher = require('pusher-js');
Echo.channel('test')
    .listen('ChatMessageWasReceived', function (e) {
        console.log(e);
    });

Echo.private("chat").listen('Chat', function (e) {

    var new_message=$("#content_right").clone();
    new_message.find('.direct-chat-text').text(e.message);
    $("#direct-chat-messages").append(new_message);

    $("#direct-chat-messages").animate({ scrollTop: $('#direct-chat-messages').prop("scrollHeight")}, 200);
});


$(document).ready(function () {

    $(document).on('click','#btn_send', function () {

        var message=$("#message").val();

        $.ajax(
            {
                url:'/chat',
                type:'Post',
                data:{message:message}
            }

        ).done(function () {
            var new_message=$("#content_hidden").clone();
            new_message.find('.direct-chat-text').text(message);
            $("#direct-chat-messages").append(new_message);
            $("#message").val('');

            $("#direct-chat-messages").animate({ scrollTop: $('#direct-chat-messages').prop("scrollHeight")}, 1000);
        });
    });

});