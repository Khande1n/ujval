<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
    protected $fillable = ['add1', 'add2', 'street', 'city', 'state', 'country', 'pincode', 'guardian2', 'contact11', 'contact12', 'addressable_id', 'addressable_type'];
	
	
	
    /**
     * Get all of the owning imageable models.
     */
    public function addressable()
    {
        return $this->morphTo();
    }
	
}
