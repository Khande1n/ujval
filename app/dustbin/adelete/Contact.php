<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Contact;

class Contact extends Model
{

	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'contacts';
	
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['contact_1', 'contact_2'];
	
	/**
     * A student has many guardian.
     */
    public function guardians()
    {
        return $this->hasMany('App\Guardian');
    }
	
	/**
     * A student has one address.
     */
    public function schools()
    {
        return $this->hasMany('App\School');
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
        return $this->hasOne('App\Contact');
    }
	
}
