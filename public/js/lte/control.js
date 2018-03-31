/**
 * Created by hungnv on 2018/03/31.
 */

var _obj={

    exampleInputEmail1:{type:'text'},
    gender:{type:'checkbox'},
    "my-select":{type:'select'},
    optradio:{type:'radio'}

};
$(document).ready(function () {

    $(document).on('click','#btn-submit', function () {

        var data=getData(_obj);
        $("#result").html(JSON.stringify(data));
    });
});