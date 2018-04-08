$(document).ready(function () {

    $(document).on('click', '.btn-delete', function (e) {
        var $this = $(this);
        jConfirm(function () {
            var url = $this.attr('href');
            axios.delete(url).then(function (res) {

                jSuccess('Delete Success', function () {
                    location.reload(true);
                });

            }).catch(function (err) {
                jError(err);
            });
        });

        return false;

    });

    $(document).on('click', '.btn-remove', function () {

        var parent = $(this).closest('tr');
        parent.remove();

    });

    var bootstrapTooltip = $.fn.tooltip.noConflict();
    $.fn.bstooltip = bootstrapTooltip;

});
function getData(_obj) {
    var result = {};
    for (var key in _obj) {
        switch (_obj[key]['type']) {
            case 'text':
            {
                result[key] = $("#" + key).val();
            }
                break;
            case "select":
            {
                result[key] = $("#" + key).val();
            }
                break;
            case "checkbox":
            {
                if ($('input[name="' + key + '"]').is(":checked")) {
                    result[key] = 1;
                } else {
                    result[key] = 0;
                }
            }
                break;
            case "radio":
            {
                result[key] = $('input[name="' + key + '"]:checked').val();
            }
                break;
        }
    }

    return result;


}

function jSuccess(content, callback) {
    $.alert({
        title: 'Congratulations!',
        content: content,
        type: 'green',
        draggable: false,
        animation: 'scale',
        closeAnimation: 'scale',
        animateFromElement: false,
        icon: 'fa fa-info-circle',
        buttons: {
            OK: function () {
                if (typeof callback == 'function') {
                    callback();
                }
            }
        }
    });
}

function jConfirm(callback) {
    $.confirm({
        animation: 'scale',
        closeAnimation: 'none',
        //animationSpeed:50,
        animateFromElement: false,
        title: 'Confirm',
        draggable: false,
        type: 'orange',
        icon: 'fa fa-question',
        buttons: {

            OK: function () {
                if (typeof callback == 'function') {
                   setTimeout(function () {
                       callback();
                   },55);
                }
            },
            Cancel: function () {
                //alert('cancel');
            }
        },onClose: function () {
            // before the modal is hidden.
            console.log(1);
        },
    });
}

function jError(content) {
    $.alert({
        title: 'Error',
        content: content,
        type: 'red',
        draggable: false,
        animation: 'scale',
        closeAnimation: 'scale',
        animateFromElement: false,
        icon: 'fa fa-warning'
    });
}

function jInfo(content) {
    $.toast({
        text: content,
        showHideTransition: 'slide',
        position: 'bottom-right',
        icon: 'info'
    })
}

function _validate(){

    _clearError();
    var _error=0;
    $("input.required:enabled:not(:read-only)").each(function () {


        var value=$(this).val();
        if(value==''){
            _error++;
            //$(this).bstooltip({title:'Required',trigger:'click'});
            $(this).after("<span class='has-error'>Required!</span>");
            $(this).addClass('has-error');
        }
    });
    if(_error>0){
        $("input.has-error:first").focus();
    }

    if(_error>0){
        return false;
    }
    return true;
}
function _clearError(){
    $("input").removeClass('has-error');
    $("span.has-error").remove();
}

function _showError(res){
    for(var key in res.data['errors']){
        for(var i=0;i<res.data['errors'][key].length;i++){
            if(key.indexOf('#')>-1){
                $(key).addClass('has-error');
                $(key).after("<span class='has-error'>"+res.data['errors'][key][i]+"</span>");
            }else if(key.indexOf('.')>-1) {
                //class

                var index=res.data['errors'][key][i]['id'];
                for(var j=0;j<res.data['errors'][key][i]['error'].length;j++){
                    $(key).eq(index).addClass('has-error');
                    $(key).eq(index).after("<span class='has-error'>"+res.data['errors'][key][i]['error'][j]+"</span>")
                }
            }
        }
    }
    $("input.has-error:first").focus();
}
