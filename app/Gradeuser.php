<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gradeuser extends Model
{

	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'gradeusers';
	
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['grade_id', 'user_id', 'school_id'];


}
