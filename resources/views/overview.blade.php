@extends('main')

@section('content')
<div class="container">
    <div class="col-md-4 main-message-field">
        <div style="min-height: 850px;"></div>
    </div>

    <div class="col-md-6 main-profile-field">
         <ul class="messages addfield">
            <li class="new-message">
                <div class="w-box clearfix">
                <div class="loader"><img src="/images/squares.gif" /></div>
                     <form class="dynaform" method="POST" action="/messages/add" data-postto="postfield" data-loader="loader">
                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <h2>Place a new message</h2>
                        <div class="newmessage">
                            <textarea class="form-control message-input" name="message" placeholder="Enter your message" required="required"></textarea>
                        </div>
                        <button type="submit" class="btn">Add message</button>
                     </form>
                </div>
            </li>
         </ul>
         <ul class="messages postfield">
            @foreach($messages AS $message)
            <li>
                <div class="w-box msg">
                    <div class="msg-from">>
                        @if(!isset($message->profile->profileimage))
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
            @endforeach
         </ul>

    </div>
    <div class="col-md-2">

    </div>

</div>
@endsection