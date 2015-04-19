<?php namespace App\Lib\TimelineHistory;

use App\Models\UserProfile;
use Illuminate\Support\Facades\Session;

class HistoryRepository {

    private $HistoryListKey = "Historys";

    private $userprofiles = [];

    public function init(){
        $this->userprofiles = Session::get($this->HistoryListKey,[]);
    }

    private function updatesession(){
        Session::put($this->HistoryListKey,$this->userprofiles);
    }

    public function add(UserProfile $userprofile){
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
} 