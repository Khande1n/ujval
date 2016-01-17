<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Role;

class Role extends Model
{
	
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'roles';
	
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['role_name', 'school_id'];

	
	/**
     * Roles belongs to a school.
     */
    public function schools()
    {
        return $this->belongsTo('App\School');
    }
	
		
	/**
     * Roles belongs to a staff.
     */
    public function staff()
    {
        return $this->belongsToMany('App\Staff');
    }
}
