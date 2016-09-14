<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Http\Requests\UserEditFormRequest;
use Illuminate\Support\Facades\Hash;

class UserEditFormRequest extends Request
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
            'name' => 'required',
            'email'=> 'required',
            'role'=> 'required',
            'password'=>'min:6|confirmed',
            'password_confirmation'=>'min:6',
            'phone' => 'required|numeric'
        ];
    }
}
