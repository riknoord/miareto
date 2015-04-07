<li>
    <div class="w-box msg">
        <div class="msg-from">
            <img src="../images/profile_21423567.jpg" >
            <div class="msg-from-info">
                <div class="title">{{$message->profile->firstname}} {{$message->profile->lastname}}</div>
                <div class="info">{{$message->created_at}}</div>
            </div>
        </div>
        <div class="msg-content">
            {{$message->message}}
        </div>
        <div class="msg-comments">

        </div>
    </div>
</li>