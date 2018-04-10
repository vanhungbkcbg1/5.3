/**
 * Created by hungnv on 10/3/2017.
 */
$(document).ready(function () {

    initEvents();

    initTrigger();
});

function  initEvents(){

        //$("#auto-completed").focus();
}
function  initTrigger(){
    var availableTags = [
        "ActionScript",
        "AppleScript",
        "Asp",
        "BASIC",
        "C",
        "C++",
        "Clojure",
        "COBOL",
        "ColdFusion",
        "Erlang",
        "Fortran",
        "Groovy",
        "Haskell",
        "Java",
        "JavaScript",
        "Lisp",
        "Perl",
        "PHP",
        "Python",
        "Ruby",
        "Scala",
        "Scheme"
    ];

    $("#auto-completed").blur(function (event) {
       return event.preventDefault();
    });
    //$("#auto-completed").blur();
    $("#auto-completed").focus();
   $("#auto-completed" ).autocomplete({
        source: availableTags,
        change: function (event,ui) {
            if(ui.item==null){
                $("#auto-completed").val('');
            }
        }
    });

    //$( "#auto-completed" ).autocomplete( "option", { cancelBlur: true } );
    //item.cancelBlur=true;
    //console.log(item.);

    //$("#auto-completed").blur();
    //$("#auto-completed").focus();




    //$("#auto-completed" ).autocomplete({
    //    source: function( request, response ) {
    //        $.ajax( {
    //            url: "/adminlte/autocompleted",
    //            dataType: "json",
    //            data: {
    //                term: request.term
    //            },
    //            success: function( data ) {
    //                response( data );
    //            }
    //        } );
    //    },
    //    //minLength: 2,
    //    select: function( event, ui ) {
    //        console.log(ui);
    //    }
    //} );
}
