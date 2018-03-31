/**
 * Created by hungnv on 2018/03/31.
 */

$(document).ready(function () {
    $(".datepicker").datepicker({
        dateFormat: 'yy/mm/dd',
    });

    $(document).on('change','.datepicker', function () {
        var value=$(this).val();
        var regex=/^[0-9]{4}\/(1[0-2]|0[1-9])\/(3[01]|[12][0-9]|0[1-9])$/;
        var regex1=/^[0-9]{4}(1[0-2]|0[1-9])(3[01]|[12][0-9]|0[1-9])$/;
        if(!regex.test(value)&&!regex1.test(value)){
            $(this).val('');
        }else if(regex1.test(value)){
            //20150505
            var year=value.substring(0,4);
            var month=value.substring(4,6);
            var day=value.substring(6);

            $(this).val(year+'/'+month+'/'+day);
        }

    });



});

function validateDate(value){
    var regex=/^[0-3]?[0-9]\/[0-3]?[0-9]\/(?:[0-9]{2})?[0-9]{2}$/;
    if(!value.test(regex)){

    }
}