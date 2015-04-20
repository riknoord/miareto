<?php namespace App\Lib\TimelineHistory;

use App\Models\UserProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HistoryRepository {

    private $HistoryListKey = "Historys";

    private $userprofiles = [];
    private $authuser;

    public function init(){
        $this->userprofiles = Session::get($this->HistoryListKey,[]);
        $this->authuser = Auth::User();
    }

    private function updatesession(){
        Session::put($this->HistoryListKey,$this->userprofiles);
    }

    public function add(UserProfile $userprofile){
        if($this->LastProfileIsMine($userprofile)) return $this;

        array_push($this->userprofiles,$userprofile);
        $this->updatesession();
        return $this;
    }

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

    public function all(){
        return array_slice($this->userprofiles,0,8);
    }

    private function LastProfileIsMine(UserProfile $userProfile){
        if($userProfile->id == $this->authuser->id)
            return true;
        if(end($this->userprofiles)->id == $userProfile->id)
            return true;

        return false;
    }
} 