<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\School;

class School extends Model
{

	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'schools';
	
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['school', 'sch_contact1', 'sch_contact2', 'sch_add1', 'sch_add2', 'sch_street', 'sch_pincode', 'city', 'state', 'country'];	
	
	
	/**
     * School has many staffs.
     */
    public function users()
    {
        return $this->hasMany('App\User');
    }
	
	/**
     * School has many grades.
     */
    public function grades()
    {
        return $this->hasMany('App\Grades');
    }
}
