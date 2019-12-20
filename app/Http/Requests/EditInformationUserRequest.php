<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditInformationUserRequest extends FormRequest
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
            'phone' => 'required|regex:/(0)[0-9]{9}/',
            'address' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'phone.regex' => 'Wrong phone number type'
        ];
    }
}
