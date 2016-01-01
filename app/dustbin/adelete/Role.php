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
    protected $fillable = ['role_name'];
		
		
	/**
     * A student has many guardian.
     */
    public function guardians()
    {
        return $this->belongsTo('App\Guardian');
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

}
