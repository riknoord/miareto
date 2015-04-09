@if($ShowNavProfile)
<ul class="NavProfileContainer">
    <li><img src="/images/profiles/no-profile/avatar.jpg" /></li>
    <li>
        <div>
            <div class="NavProfile-Name"><a href="/{{$profile->slug}}">{{ $profile->firstname }} {{ $profile->lastname }}</a></div>
            <div class="NavProfile-City">Hellevoetsluis</div>
        </div>
    </li>
</ul>
@endif