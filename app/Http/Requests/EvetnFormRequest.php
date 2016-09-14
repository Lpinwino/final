<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EvetnFormRequest extends Request
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
            'title' => 'required|min:3|unique:events',
            'concept' => 'required',
            'department' => 'required|min:3',
            'objetives' => 'required',
            'impact_studTeach' => 'required',
            'description' => 'required|min:4',
            'date_event' => 'required',
            'end_event' => 'required'
        ];
    }
}
