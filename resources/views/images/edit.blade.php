<div class="edit-profile-images">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 profile-image">
                @if(isset($profile->profileimage->image))
                    <img src="images/profiles/{{$profile->id}}/{{$profile->profileimage->image}}" class="my-avatar-container">
                @else
                    <img src="images/profiles/no-profile/avatar.jpg" class="my-avatar-container">
                @endif
                <a id="profile-photo" href="#" class="add-photo btn"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Add photo</a>
                <form id="fileupload" action="images/add/profile" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="file" id="profile-photo-input" name="file" data-url="images/add/profile">
                </form>

                <a href="#" class="remove-photo btn"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>Remove photo</a>
            </div>
            <div class="col-md-8 albums-images">
                <h3>Edit your albums</h3>

            </div>
        </div>
    </div>
</div>

<script src="js/vendor/jquery.ui.widget.js"></script>
<script src="js/jquery.iframe-transport.js"></script>
<script src="js/jquery.fileupload.js"></script>
<script>

$(function () {
    $('#fileupload').fileupload({
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                $('.my-avatar-container').attr('src',file.name);
            });
        }
    });

    $("#profile-photo").click(function(){
        $('#profile-photo-input').click();
    })
});
</script>