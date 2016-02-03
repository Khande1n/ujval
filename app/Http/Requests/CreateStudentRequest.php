<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Carbon\Carbon;

class CreateStudentRequest extends Request
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
       		'student' => 'required|string',
        	'email' => 'required|unique:students|email',
        	'bday' => 'required|date',
        	'guardian1' => 'string',
        	// 'parentemail' => 'required|email',
        	// 'contact11' => 'required|integer|digits:10',
       		// 'std_pincode' => 'required|integer'
        ];
    }
}