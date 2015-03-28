<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model {

	protected $table = "userprofiles";

    public function user(){
        $this->belongsTo('app/User');
    }
    public function messages(){
        $this->hasMany('app/Message');
    }
    public function images(){
        $this->hasMany('app/Image');
    }

}
