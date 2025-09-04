<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePneuRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Allow all authenticated users to make this request
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'marca' => 'required|string|max:20',
            'modelo' => 'required|string|max:30',
            'aro' => 'required|integer',
            'medida' => 'required|string|max:10',
            'preco' => 'required|numeric',
            'quantidade_estoque' => 'required|integer',
            'largura' => 'required|integer',
            'perfil' => 'required|string|max:3',
            'indice_peso' => 'nullable|string|max:20',
            'indice_velocidade' => 'nullable|string|max:20',
            'tipo_construcao' => 'required|string|max:20',
            'tipo_terreno' => 'nullable|string|max:2',
            'desenho' => 'required|string|max:15',
        ];
    }
}
