<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateExamRequest extends Request
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
        	'exam' => 'alpha_num',
        	'exam_date' => 'required|date',
            'exam_duration' => 'required|date',
        	'max_marks' => 'required|integer',
        	'pass_marks' => 'required|integer',
        ];
    }
}
