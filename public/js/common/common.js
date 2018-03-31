$(document).ready(function () {


});
function getData(_obj){
    var result={};
    for(var key in _obj){
        switch (_obj[key]['type'])
        {
            case 'text':
            {
                result[key]=$("#"+key).val();
            }break;
            case "select":
            {
                result[key]=$("#"+key).val();
            }break;
            case "checkbox":{
                if($('input[name="'+key+'"]').is(":checked")){
                    result[key]=1;
                }else{
                    result[key]=0;
                }
            }break;
        }
    }

    return result;


}