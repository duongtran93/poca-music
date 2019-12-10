<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class changepasswordRequest extends FormRequest
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
            'old_password' => 'required|password',
            'new_password' => 'required',
            'password_confirm' => 'required|same:new_password',
        ];
    }

    public function messages()
    {
        return [
            'old_password.required' => 'Please enter old password',
            'old_password.password' => 'Incorrect password',
            'new_password.required' => 'Please enter new password',
            'password_confirm.required' => 'Please confirm password',
            'password_confirm.same' => 'Confirm password is incorrect',
        ];
    }
}
