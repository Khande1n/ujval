<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
	
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'attendances';
	
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['attendance', 'present_id', 'present_type'];
	
	
	
    /**
     * Get all of the owning imageable models.
     */
    public function present()
    {
        return $this->morphTo();
    }
	
}

