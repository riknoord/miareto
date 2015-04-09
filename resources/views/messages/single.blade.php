<li>
    <div class="w-box msg">
        <div class="msg-from">
            <img src="../images/profiles/{{$message->profile->id}}/{{$message->profile->profileimage->image}}" >
            <div class="msg-from-info">
                <div class="title"><a href="/{{$message->profile->slug}}">{{$message->profile->firstname}} {{$message->profile->lastname}}</a></div>
                <div class="info">{{$message->created_at->diffForHumans()}}</div>
            </div>
        </div>
        <div class="msg-content">
            {!! nl2br(e($message->message)) !!}
        </div>
        <div class="msg-comments">

        </div>
    </div>
</li>