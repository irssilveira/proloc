<?php

namespace proloc\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LeadsHistoricoSaveRequest extends Request
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
            'id' => 'required',
            'mensagem' => 'required',
            'dataRetorno' => 'required',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'mensagem.required'         => 'Complete a mensagem',
            'dataRetorno.required'         => 'Complete a data de retorno',

        ];
    }
}
