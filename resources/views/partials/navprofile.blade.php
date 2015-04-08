@if($ShowNavProfile)
<ul class="NavProfileContainer">
    <li><img src="/images/profiles/no-profile/avatar.jpg" /></li>
    <li>
        <div>
            <div class="NavProfile-Name">{{ $profile->firstname }} {{ $profile->lastname }}</div>
            <div class="NavProfile-City">Hellevoetsluis</div>
        </div>
    </li>
</ul>
@endif