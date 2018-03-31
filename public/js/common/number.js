/**
 * Created by hungnv on 2018/03/31.
 */

$(document).ready(function () {


    $(document).on('focus','input', function () {
       $(this).select();
    });
    $(document).on('keypress','.number', function (evt) {

        var theEvent = evt || window.event;
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode( key );
        var regex = /[0-9]/;
        if( !regex.test(key) ) {
            theEvent.returnValue = false;
            if(theEvent.preventDefault) theEvent.preventDefault();
        }
    });

    $(document).on('focusin','.number, .decimal', function focusin () {
        var value=$(this).val();
        value=value.replace(/,/g,'');
        $(this).val(value);
        $(this).select();
    });

    $(document).on('focusout','.number, .decimal', function focusout () {
        var value=$(this).val();
        value=value*1;
        $(this).val(value.toLocaleString());
    });

    $(document).on('keypress','.decimal', function (evt) {

        var real_len=$(this).attr('real_len');
        var decimal_len=$(this).attr('decimal_len');
        $(this).attr('maxlength',real_len*1+decimal_len*1+1);

        var theEvent = evt || window.event;
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode( key );
        var regex = /[0-9]|\./;
        if( !regex.test(key) ) {
            theEvent.returnValue = false;
            if(theEvent.preventDefault) theEvent.preventDefault();
        }else{
            var value=$(this).val();
            console.log(value);

            console.log(evt.target.selectionStart);
            if(key=='.'){
                if(value.indexOf('.')>0){
                    theEvent.returnValue = false;
                    if(theEvent.preventDefault) theEvent.preventDefault();
                }
            }else {
                if(value.split("").reverse().join("").indexOf('.')>decimal_len*1-1){
                    if(evt.target.selectionStart<=value.length-(decimal_len*1+1)){

                    }else {
                        theEvent.returnValue = false;
                        if(theEvent.preventDefault) theEvent.preventDefault();
                    }

                }
            }




        }

    });
});