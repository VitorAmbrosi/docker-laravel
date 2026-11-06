<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class TarefaRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        //se for uma requisação PATCH, validar apenas o campo concluida
        if ($this->isMethod('patch')) {
            return [
                'concluida' => ['required', 'boolean'],
            ];
        }

        return [
            'titulo' => ['required', 'string', 'max:255'],
            'descricao' => ['required', 'min:1'],
            'concluida' => ['boolean'],
        ];
    }
}
