@extends('main')

@section('content')
<div class="container-fluid">
    <div class="front-profile">

        <div class="arrow right">
            <svg height="46" style="">
                <line x1="46" y1="23" x2="1200" y2="23" style="stroke: rgb(34, 109, 148);stroke-width:2"></line>
            </svg>
            <img src="../images/arrow-right.png" />
        </div>

        <div class="arrow bottom">
            <svg height="46" style="">
                <line x1="23" y1="0" x2="23" y2="1200" style="stroke: rgb(34, 109, 148);stroke-width:2"></line>
            </svg>
            <img src="../images/arrow-down.png" />
        </div>
        <div class="arrow left">
            <svg height="46" style="">
                <line x1="46" y1="23" x2="1200" y2="23" style="stroke: rgb(199, 234, 252);stroke-width:2"></line>
            </svg>
            <img src="../images/arrow-left.png" />
        </div>

        <div class="f-p-info-box w-box">
            <h2>{{$profile->firstname}} {{$profile->lastname}}</h2>
            <span>Hellevoetsluis</span><span class="sub-right">Profile</span>
        </div>
        <div class="f-p-img-box w-box">
            @if(Auth::check() && $profile->id != Auth::user()->profile->id)
            <a href="/friends/add"><span class="glyphicon glyphicon-plus" aria-hidden="true""></span> Add friend</a>
            @endif

            @if(!isset($profile->profileimage))
            <img src="images/profiles/no-profile/avatar.jpg" @if((Auth::user()) && ($profile->user_id == Auth::user()->id)) class="my-avatar-container" @endif />
            @else
            <img src="{{"images/profiles/".$profile->id."/".$profile->profileimage->image}}" @if((Auth::user()) && ($profile->user_id == Auth::user()->id)) class="my-avatar-container" @endif />
            @endif
        </div>
    </div>
</div>

<div class="container">
    <div class="col-md-4 main-message-field">
        <div class="clearfix">
            <div class="w-box profile-link left">
                <div class="clearfix">
                    <img src="../images/profile_3455472.jpg" />
                    <div class="info">
                        <div class="title">Talitha Pleune</div>
                        <div>
                            <span>Hellevoetsluis</span>
                            <span class="sub-right">Vriendin</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <ul class="messages">
            @if(isset($messages))
            @foreach($messages AS $message)
            <li>
                <div class="w-box msg">
                    <div class="msg-from">

                        @if(!isset($message->profile->profileimage))
                        <img src="images/profiles/no-profile/avatar.jpg" @if(Auth::check() && $profile->id != Auth::user()->profile->id) class="my-avatar-container" @endif />
                        @else
                        <img src="images/profiles/{{$message->profile->id}}/{{$message->profile->profileimage->image}}" @if(Auth::check() && $profile->id != Auth::user()->profile->id) class="my-avatar-container" @endif />
                        @endif

                        <div class="msg-from-info">
                            <div class="title">{{ $message->profile->firstname }} {{ $message->profile->lastname }}</div>
                            <div class="info">{{$message->created_at->diffForHumans()}}</div>
                        </div>
                    </div>
                    <div class="msg-content">
                        {!! $message->message !!}
                    </div>
                    <div class="msg-comments">

                    </div>
                </div>
            </li>
            @endforeach
            @endif
        </ul>
    </div>

    <div class="col-md-4 main-profile-field">



    </div>

    <div class="col-md-4 main-profile-field">

        <div class="clearfix">
            <div class="w-box profile-link right">
                <div class="clearfix">
                    <img src="../images/profile_3455472.jpg" />
                    <div class="info">
                        <div class="title">Talitha Pleune</div>
                        <div>
                            <span>Hellevoetsluis</span>
                            <span class="sub-right">Vriendin</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-box">
            <div class="compact-friends">
                <div class="title">Mijn vrienden</div>
                <ul class="clearfix">
                    <?php for($i = 0; $i < 8; $i++){ ?>
                    <li>
                        <img class="link-icon" src="../images/linking-arrow.png" />
                        <img src="../images/profile_21423567.jpg" />
                    </li>
                    <?php } ?>
                </ul>
                <div class="info clearfix">
                    <div class="last-added">
                        <div>Laatst toegevoegd</div>
                        <div>Gisteren 14:56</div>
                    </div>
                    <div class="more">
                        <div>Totaal 342 vrienden</div>
                        <a href="#">Meer vrienden</a>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection