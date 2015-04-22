<?php namespace App\MiaReto\Presenters;


use App\Lib\Presenter\Presenter;

/**
 * Class UserProfile
 * @package App\MiaReto\Presenters
 */
class UserProfile extends Presenter {

    /**
     * @return string
     */
    public function ProfileImage()
    {
        if(count($this->entity->profileimage))
            return "images/profiles/".$this->entity->id."/".$this->entity->profileimage->image;

        return $this->entity->EmptyProfileImage();
    }

} 