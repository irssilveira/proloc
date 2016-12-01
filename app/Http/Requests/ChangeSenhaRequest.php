<?php

namespace proloc\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangeSenhaRequest extends FormRequest
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
        $rules = [
            'token' => 'required', 'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'email.required'         => 'Complete o campo email',


        ];
    }
}
