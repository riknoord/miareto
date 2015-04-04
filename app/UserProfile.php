<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model {

	protected $table = "userprofiles";

    protected $fillable = ['firstname', 'lastname', 'gender'];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function messages(){
        return $this->hasMany('App\Message');
    }
    public function images(){
        return $this->hasMany('App\Image');
    }

}
