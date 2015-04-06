<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UserProfile
 * @package App
 */
class UserProfile extends Model {

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
        return $this->belongsTo('App\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages(){
        return $this->hasMany('App\Message');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images(){
        return $this->hasMany('App\Image');
    }

}
