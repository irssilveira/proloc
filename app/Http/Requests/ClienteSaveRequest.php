<?php

namespace proloc\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteSaveRequest extends FormRequest
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
            'razao_social_nome' => 'required',

            'cnpj_cpf' => 'required',
            'inscricao_estadual_rg' => 'required',
            'data_nascimento' => 'required',
            'rua' => 'required',
            'numero' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'uf' => 'required',
            'referencia' => 'required',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'razao_social_nome.required'         => 'Complete o nome',
            'cnpj_cpf.required'     => 'Complete o campo',
            'inscricao_estadual_rg.required'       => 'Complete o campo',
            'data_nascimento.required'       => 'Complete o campo',
            'rua.required'       => 'Complete o campo',
            'numero.required'         => 'Complete o campo',
            'bairro.required'  => 'Complete o campo',
            'cidade.required'   => 'Complete o campo',
            'uf.required'  => 'Complete o campo',
            'referencia.required'     => 'Complete o campo',

        ];
    }
}
