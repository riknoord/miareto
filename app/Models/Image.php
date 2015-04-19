<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model {

	protected $table = "images";

    protected $fillable = ['image','is_profile_image'];

    public function profile(){
        $this->belongsTo('App\Models\UserProfile','userprofile_id');
    }
}
