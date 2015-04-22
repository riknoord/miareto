<?php
namespace app\MiaReto\Repositories;

use App\Models\UserProfile;

class ProfileRepository {


    /**
     * @var UserProfile
     */
    private $profile;

    public function __construct(UserProfile $profile)
    {
        $this->profile = $profile;
    }

    public function GetProfileWithSlug($slug)
    {
        return $this->profile->where('slug', '=', $slug)->with('profileimage');
    }
}