/**
 * Created by 749 on 2017/05/04.
 */

//window.Pusher = require('pusher-js');
Echo.channel('test')
    .listen('ChatMessageWasReceived', function (e) {
        console.log(e);
    });