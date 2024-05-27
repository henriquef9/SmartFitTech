<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateAluno extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'nome' => [
                'required',
                'min:3',
                'max:255',
            ],
            'email' => [
                'required',
                'email',
                'unique:Alunos',
            ],
            'telefone' => [
                'required',
                'regex:/^(?:\+?55)?(?:\(?([1-9]{2})\)?\s)?(?:((?:9\d|[2-9])\d{3})-?(\d{4}))$/',            ],
        ];

        if($this->method() === 'PUT' || $this->method() === 'PATCH'){

            $id = $this->id ?? $this->aluno;
            $rules['email'] = [
                'required',
                'email',
                //Vai ignorar a verificação de unicidade quando for email do mesmo aluno
                Rule::unique('Alunos')->ignore($id),
            ];
        }

        return $rules;
    }
}
