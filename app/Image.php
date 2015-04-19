<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model {

	protected $table = "images";

    protected $fillable = ['image','is_profile_image'];

    public function profile(){
        $this->belongsTo('App\UserProfile','userprofile_id');
    }
}
