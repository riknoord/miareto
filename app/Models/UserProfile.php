<?php namespace App\Models;

use App\Lib\Presenter\PresentableTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserProfile
 * @package App
 */
class UserProfile extends Model {

    use PresentableTrait;

    /**
     * @var string
     */
    protected $presenter = 'App\Miareto\Presenters\UserProfile';

    /**
     * @var string
     */
    protected $table = "userprofiles";

    /**
     * @var array
     */
    protected $fillable = ['firstname', 'lastname', 'gender'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages(){
        return $this->hasMany('App\Models\Message','userprofile_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images(){
        return $this->hasMany('App\Models\Image','userprofile_id');
    }

    /**
     * @return mixed
     */
    public function profileimage(){
        return $this->hasOne('App\Models\Image','userprofile_id')->where('is_profile_image','=','1');
    }

    /**
     * @return string
     */
    public function EmptyProfileImage(){
        return "images/profiles/no-profile/avatar.jpg";
    }

}
