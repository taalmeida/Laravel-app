<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRegistersRequest extends FormRequest
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
        $rules =[
            //mudar o numero de data de nasc
            'name' => 'required|min:3|max:255',
            'cpf' => 'required, unique:registers',
            'number' => 'required',
            
        ];

         if ($this->method() ==='PUT' | $this->method()==='PATH') {
            //o cpf é unico na tabela de registros
            
            $rules['cpf'] =[
                'required',
                //"unique: registers, cpf, {{$this->id}},id",
                Rule::unique('registers') -> ignore($this->register ?? $this->id),
            ];
         }

        return $rules;
    }
}
