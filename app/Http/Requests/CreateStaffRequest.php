<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Carbon\Carbon;

class CreateStaffRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        	'name' => 'required|alpha_num',
        	'stf_bday' => 'required|date',
        	'email' => 'required|unique:users|email',
            'stf_contact1' => 'required|integer|digits:10',
       		'stf_pincode' => 'required|integer|', 		
        ];
    }
}