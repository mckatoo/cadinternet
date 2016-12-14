<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequisicoesRequest extends FormRequest
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
            'nome' => 'required|min:6',
            'rarefunc' => 'required|max:50',
            'MAC' => 'required|min:17',
            'tipo' => 'required',
            'campus' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo NOME é obrigatório!',
            'nome.min' => 'O campo NOME deve ter no mínimo 6 caracteres',
            'rarefunc.required' => 'O campo RA RE OU FUNCIONAL é obrigatório!',
            'rarefunc.max' => 'O campos RA RE OU FUNCIONAL pode ter no máximo 50 caracteres.',
            'MAC.required' => 'O campo MAC é obrigatório!',
            'MAC.min' => 'O campo MAC deve ter no mínimo 17 caracteres!',
            'tipo.required' => 'O campos TIPO é obrigatório!',
            'campus.required' => 'O campo CAMPUS é obrigatório!'
        ];
    }
}