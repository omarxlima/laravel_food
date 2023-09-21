<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePermissao extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {

            $id = $this->segment(3);
            return [
                'nome' => "required|min:3|max:190|unique:permissoes,nome,{$id},id",
                'descricao' => 'nullable|min:3|max:255',
            
        ];
    }
}
