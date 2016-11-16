<?php

namespace proloc\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LeadsEditRequest extends Request
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
            'nome' => 'required',
            'email' => 'required',
            'telefone' => 'required',
            'celular' => 'required',
            'endereco' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'equipamento' => 'required',
            'observacao' => 'required',

        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'nome.required'         => 'Complete o nome',
            'email.required'         => 'Complete o email',
            'telefone.required'         => 'Complete o telefone',
            'celular.required'         => 'Complete o celular',
            'endereco.required'         => 'Complete o endereco',
            'bairro.required'         => 'Complete o bairro',
            'cidade.required'         => 'Complete a cidade',
            'estado.required'         => 'Complete o estado',
            'equipamento.required'         => 'Complete o equipamento',
            'observacao.required'         => 'Complete a observacao',

        ];
    }
}
