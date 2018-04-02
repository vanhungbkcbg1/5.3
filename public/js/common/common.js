$(document).ready(function () {

    $(document).on('click', '.btn-delete', function (e) {
        var parent = $(this).closest('tr');
        var result = confirm('Are you want to delete this item');
        if (result == true) {
            var url = $(this).attr('href');
            axios.delete(url).then(function (res) {

                parent.remove();
                jSuccess('Delete Success');
                location.reload(true);
            }).catch(function (err) {
                jError(err);
            });

            return false;
        } else {
            return false;
        }

    });

    $(document).on('click', '.btn-remove', function () {

        var parent = $(this).closest('tr');
        parent.remove();

    });

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

function jSuccess(content) {
    $.alert({
        title: 'Congratulations!',
        content: content,
        type:'green',
        draggable:false,
        animation: 'scale',
        closeAnimation: 'scale',
        animateFromElement: false,
        icon:'fa fa-info-circle'
    });
}

function jConfirm(callback) {
    $.confirm({
        animation: 'scale',
        closeAnimation: 'scale',
        animateFromElement: false,
        title:'Confirm',
        draggable: false,
        type:'orange',
        icon:'fa fa-question',
        buttons:{

            OK: function () {
               if(typeof callback=='function'){
                   callback();
               }
            },
            Cancel: function () {
                //alert('cancel');
            }
        }
    });
}

function jError(content) {
    $.alert({
        title: 'Error',
        content: content,
        type:'red',
        draggable:false,
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