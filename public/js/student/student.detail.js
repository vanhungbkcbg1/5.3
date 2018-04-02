/**
 * Created by hungnv on 10/3/2017.
 */

var _obj = {

    id: {type: 'text'},
    name: {type: 'text'},
    address: {type: 'text'},
    date_of_birth: {type: 'text'},
    grade_id: {type: 'select'}
};
$(document).ready(function () {

    initEvents();

    initTrigger();
});

function initEvents() {


    $(document).on('click', '#btn-save', function () {

        jConfirm(function () {

            var data = {};
            data.student = getData(_obj);
            data.mode=$("#mode").val();

            axios.post('/student/detail', data).then(function () {
                    jSuccess('Save success', function () {
                        location.reload(true);
                    });
                }
            ).catch(function (e) {
                    jError(e);
                }
            );
        });

    });

}
function initTrigger() {

}


