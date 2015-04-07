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


        $.ajax({
            type: "POST",
            url: url,
            data: datastring,
            success: function(data) {
                if(posttofield != null){
                    $(data).hide().prependTo("." + posttofield).fadeIn('slow');
                    $form.trigger("reset");
                    resize_left_bar();
                }
            }
        });
    });
});

function resize_left_bar(){
    if($(".main-profile-field") && $(".main-message-field")){
        $(".main-message-field").height($(".main-profile-field").height() + "px");
    }
}