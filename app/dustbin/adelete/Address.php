<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Address;

class Address extends Model
{
    
	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'addresses';
	
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['add_line_1', 'add_line_2', 'street', 'pincode', 'city', 'state', 'country'];
	
	/**
     * A guardian has an address.
     */
    public function guardians()
    {
        return $this->belongsTo('App\Guardian');
    }
	
	/**
     * A school has an address.
     */
    public function schools()
    {
        return $this->belongsTo('App\School');
    }
	
	/**
     * A staff has an address.
     */
    public function staff()
    {
        return $this->belongsTo('App\Staff');
    }
	
	/**
     * A student has an address.
     */
    public function students()
    {
        return $this->belongsTo('App\Student');
    }
	
}

