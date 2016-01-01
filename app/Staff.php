<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use App\Staff;

class Staff extends Model  implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
   use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'staff';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['staff', 'email', 'password', 'password_confirmation', 'role', 'stf_bday', 'gender', 'stf_guardian1', 'stf_contact1', 'stf_contact2', 'stf_add1', 'stf_add2', 'stf_street', 'stf_pincode', 'subject_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];


	/**
     * Get the user which belongs to the school.
     */
    public function schools()
    {
        return $this->belongsTo('App\School');
    }
	
			
	/**
     * Get the the attendances of the staff.
     */
    public function attendances()
    {
        return $this->hasMany('App\Attendance');
    }
}
