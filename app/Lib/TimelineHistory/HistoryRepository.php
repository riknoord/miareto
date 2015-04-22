<?php namespace App\Lib\TimelineHistory;

use App\Models\UserProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

/**
 * Class HistoryRepository
 * @package App\Lib\TimelineHistory
 */
class HistoryRepository {

    /**
     * @var string
     */
    private $HistoryListKey = "HistoryList";

    /**
     * @var array
     */
    private $userprofiles = [];

    /**
     * @var
     */
    private $authuser;

    /**
     *
     */
    public function init(){
        $this->userprofiles = Session::get($this->HistoryListKey,[]);

        if(Auth::check()){

            $this->authuser = Auth::User();

        }
    }

    /**
     *
     */
    private function updatesession(){
        Session::put($this->HistoryListKey,$this->userprofiles);
    }

    /**
     * @param UserProfile $userprofile
     * @return $this
     */
    public function add(UserProfile $userprofile){
        if($this->LastProfileIsMine($userprofile)) return $this;

        array_push($this->userprofiles,$userprofile);

        $this->updatesession();

        return $this;
    }

    /**
     * @param UserProfile $userprofile
     * @return $this
     */
    public function remove(UserProfile $userprofile){

        for($i = 0; $i < count($this->userprofiles); $i++){

            if($this->userprofiles[$i]->id == $userprofile->id){

                array_splice($this->userprofiles,$i,1);

                break;

            }
        }

        $this->updatesession();

        return $this;
    }

    /**
     * @return array
     */
    public function all(){

        return array_reverse(array_slice($this->userprofiles,-8,8));

    }

    /**
     * @param UserProfile $userProfile
     * @return bool
     */
    private function LastProfileIsMine(UserProfile $userProfile){

        if(isset($this->authuser) && $userProfile->user_id == $this->authuser->id)
            return true;

        if(count($this->userprofiles) > 0 && end($this->userprofiles)->id == $userProfile->id)
            return true;

        return false;
    }
} 