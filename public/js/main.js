$(function() {
    resize_left_bar();

    $( ".dynaform" ).submit(function( event ) {
        // Stop form from submitting normally
        event.preventDefault();

        // Get some values from elements on the page
        var $form = $(this);
        var url = $form.attr( "action" );
        var datastring = $form.serialize();

        var posttofield = $form.data('postto') ? $form.data('postto') : null;
        var loader      = $form.data('loader') ? $form.data('loader') : null;

        if(loader) loading(loader,true);

        $.ajax({
            type: "POST",
            url: url,
            data: datastring,
            success: function(data) {
                if(posttofield != null){
                    $(data).hide().prependTo("." + posttofield).fadeIn('slow');
                    $form.trigger("reset");
                    resize_left_bar();

                    if(loader) loading(loader,false);
                }
            }
        });
    });

    $(".pop-menu").click(function(e){
        e.preventDefault();
        $('#pop-menu').find(".content").load($(this).attr("href"));
        $('#pop-menu').modal();
    });
});

function resize_left_bar(){
    if($(".main-profile-field") && $(".main-message-field")){
        if($(".main-message-field").height() < $(".main-profile-field").height())
            $(".main-message-field").height($(".main-profile-field").height() + "px");
    }
}
function loading(loadcontainer, show){

    if(show) {
        console.log($("." + loadcontainer).height());
        var margintop = ($("." + loadcontainer).height() / 2) - 20;

        $("." + loadcontainer + ">img").css("margin-top",  margintop + "px");
        $("." + loadcontainer).show();
    }
    if(!show) $("." + loadcontainer).fadeOut('fast');
}