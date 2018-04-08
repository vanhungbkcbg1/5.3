/**
 * Created by hungnv on 10/3/2017.
 */

var _obj = {

    id: {type: 'text'},
    content: {type: 'text'}
};
$(document).ready(function () {

    initEvents();

    initTrigger();
});

function initEvents() {

    $(document).on('click', '#btn-add', function () {

        var tr = $("#tmp tbody tr:last").clone();
        $("#comments tbody").append(tr);

    });

    $(document).on('click', '#btn-save', function () {

        jConfirm(function () {

            if(_validate()){
                var data = {};
                data.post = getData(_obj);
                data.comments = getDataInsert();
                data.mode=$("#mode").val();

                axios.post('/adminlte/post/detail', data).then(function (res) {

                    if(res.data.status==201){
                        _showError(res);
                    }else{
                        jSuccess('Save success', function () {
                            location.reload(true);
                        });
                    }


                    }
                ).catch(function (e) {
                        jError(e);
                    }
                );
            }

        });

    });

}
function initTrigger() {

    $("#content").tooltip({title:'required'});
}

function getDataInsert() {

    var result = [];
    $("#comments tbody tr").each(function (i, row) {

        var tr = $(this);
        var detail = {};
        detail['comment_content'] = tr.find('.comment_content').val();
        detail['my_email'] = tr.find('.my_email').val();
        detail['id'] = tr.find('.comment_id').val();

        result[i] = detail;
    });

    return result;
}

