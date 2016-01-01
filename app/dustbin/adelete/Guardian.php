<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Guardian;

class Guardian extends Model
{

	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'guardians';
	
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['guardian_1_name', 'guardian_1_name'];
	
	
	/**
     * A student has many guardian.
     */
    public function addresses()
    {
        return $this->hasOne('App\Address');
    }
	
	/**
     * A student has one address.
     */
    public function contacts()
    {
        return $this->hasMany('App\Contact');
    }
	
	/**
     * A student has one address.
     */
    public function users()
    {
        return $this->hasOne('App\User');
    }
		
	/**
     * A student has one address.
     */
    public function roles()
    {
        return $this->hasOne('App\Role');
    }
	
		
	/**
     * A student has one address.
     */
    public function students()
    {
        return $this->belongsTo('App\Student');
    }
	
}
