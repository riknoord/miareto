<li>
    <div class="w-box msg">
        <div class="msg-from">
            @if(!isset($message->profile->profileimage->image))
            <img src="images/profiles/no-profile/avatar.jpg" @if($message->profile->user_id == Auth::user()->id) class="my-avatar-container" @endif />
            @else
            <img src="{{"images/profiles/".$message->profile->id."/".$message->profile->profileimage->image}}" @if($message->profile->user_id == Auth::user()->id) class="my-avatar-container" @endif />
            @endif
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