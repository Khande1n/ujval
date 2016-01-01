<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Gender;

class Gender extends Model
{

	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'genders';
	
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['gender_name']; 
	
		/**
     * A student has many guardian.
     */
    public function guardians()
    {
        return $this->hasMany('App\Gender');
    }
	
	/**
     * A student has one address.
     */
    public function staff()
    {
        return $this->hasMany('App\Staff');
    }
	
	/**
     * A student has one address.
     */
    public function students()
    {
        return $this->hasMany('App\Student');
    }
	
}
