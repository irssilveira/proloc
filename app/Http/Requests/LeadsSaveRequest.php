<?php

namespace proloc\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LeadsSaveRequest extends Request
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
     *
     */
    public function rules()
    {
        $rules = [
            'nome' => 'required',
            'telefone' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'sexo' => 'required',
            'equipamento' => 'required',
            'observacao' => 'required',
            'dataRetorno' => 'required',
            'mensagem' => 'required',
            'unidades_id' => 'required',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'nome.required'         => 'Complete o nome',
            'email.required'        => 'Complete o email',
            'telefone.required'     => 'Complete o telefone',
            'endereco.required'     => 'Complete o endereço',
            'bairro.required'       => 'Complete o bairro',
            'cidade.required'       => 'Complete a cidade',
            'estado.required'       => 'Complete o estado',
            'sexo.required'         => 'Complete o sexo',
            'equipamento.required'  => 'Complete a equipamento',
            'observacao.required'   => 'Complete a observação',
            'dataRetorno.required'  => 'Complete a data de retorno',
            'mensagem.required'     => 'Complete a mensagem',

        ];
    }
}