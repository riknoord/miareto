<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model {

    protected $table = "messages";

    protected $fillable = ['message'];

    public function profile(){
        return $this->belongsTo('App\UserProfile','userprofile_id','id');
    }

    public function scopeIdDescending($query){
        return $query->orderBy('id','DESC');
    }

    public function scopeFromProfile($query,$profile){
        return $query->where('userprofile_id','=',$profile->id);
    }
}
