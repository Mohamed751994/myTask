<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
            'name'         => 'required|max:191',
            'description'  => 'required',
            'rating'       => 'required|between:1,5',
            'views'        => 'required',
            'levels'       => 'required|in:beginner,immediate,high',
            'hours'        => 'required',
            'active'       => 'required|min:0|max:1|regex:/^[0-9]+$/',
        ];
    }
}
