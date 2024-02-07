<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SkillsRequest extends FormRequest
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
        return [
            'skill'=>'required|min:5|max:255',
        ];
    }

    public function messages():array{
        return[
            'skill.required' => 'vous devez remplir le champ du skill',
            'skill.min' => 'Le skill doit avoir au moins :min caractères.',
            'skill.max' => 'Le skill ne doit pas dépasser :max caractères.',
        ];
    }
}
