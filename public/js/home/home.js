/**
 * Created by hungnv on 10/3/2017.
 */
$(document).ready(function () {

    initEvents();

});

function  initEvents(){
    $(document).on('click','#btn-search', function () {

        $.ajax({
            method:'post',
            url:"/home/test",
            dataType:"json",
            data:{},
            success: function (res) {
                alert(res);
            },
            error: function (jqXHR) {
                if(jqXHR.status==404){
                    location.href="/login";
                }
                console.log(err);
            }

        });
    });

    $(document).on('click','#btn-error', function () {

        $.ajax({
            method:'post',
            url:"/home/success",
            dataType:"json",
            data:{},
            success: function (res) {
                alert(res);
            },
            error: function (jqXHR) {
                if(jqXHR.status==404){
                    location.href="/login";
                }
                console.log(err);
            }

        });
    });

    $(document).on('click','#btn-encode', function () {

        $.ajax({
            method:'get',
            url:"/home/encode",
            dataType:"json",
            data:{},
            success: function (res) {
                alert(JSON.parse(res));
            },
            error: function (jqXHR) {
                if(jqXHR.status==404){
                    location.href="/login";
                }
                console.log(err);
            }

        });
    });
}
