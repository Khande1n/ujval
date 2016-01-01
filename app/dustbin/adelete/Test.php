<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Test;

class Test extends Model
{

	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tests';
	
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['test_name', 'test_date'];
	
		
	/**
     * A student has many guardian.
     */
    public function grades()
    {
        return $this->belongsTo('App\grade');
    }
		
		
	/**
     * A student has many guardian.
     */
    public function marks()
    {
        return $this->hasMany('App\Marks');
    }
		
		
	/**
     * A student has many guardian.
     */
    public function schools()
    {
        return $this->belongsTo('App\School');
    }
			
		
	/**
     * A student has many guardian.
     */
    public function staff()
    {
        return $this->belongsTo('App\Staff');
    }
		
		
	/**
     * A student has many guardian.
     */
    public function students()
    {
        return $this->belongsTo('App\Student');
    }
	
		
	/**
     * A student has many guardian.
     */
    public function subjects()
    {
        return $this->belongsTo('App\Subject');
    }	
	
}
