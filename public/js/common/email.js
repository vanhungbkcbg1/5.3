/**
 * Created by hungnv on 2018/03/31.
 */
/**
 * Created by hungnv on 2018/03/31.
 */

$(document).ready(function () {


    $(document).on('change','.email', function () {

        var value=$(this).val();
        if(!validateEmail(value)){
            $(this).val('');
        }
    });


    $(document)

});

function validateEmail(email){
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}
