<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Birthday;

class Birthday extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'birthdays';
	
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['bday'];
	
	/**
     * A student has one birthday.
     */
    public function staff()
    {
        return $this->belongsTo('App\Staff');
    }
	
	/**
     * A student has one address.
     */
    public function students()
    {
        return $this->belongsTo('App\Student');
    }
	
}
