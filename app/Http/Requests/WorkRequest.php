<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkRequest extends FormRequest
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
            'title' => 'required|max:45|min:3',
            'value' => 'required|numeric',
            'term' => 'required|date',
            'discipline_id' => 'required|numeric',
            'course_id' => 'required|numeric',
            'pdf' => 'required|mimes:pdf',
        ];
    }
}
