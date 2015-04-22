@if($ShowNavProfile)
<ul class="NavProfileContainer">
    <li><img src="{{$profile->present()->ProfileImage}}" /></li>
    <li>
        <div>
            <div class="NavProfile-Name"><a href="/{{$profile->slug}}">{{ $profile->firstname }} {{ $profile->lastname }}</a></div>
            <div class="NavProfile-City">Hellevoetsluis</div>
        </div>
    </li>
</ul>
@endif