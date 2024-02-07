<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompaniesRequest extends FormRequest
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
            'name'=>'required|min:10|max:255',
            'description'=>'required|string',
            'location'=>'required|string',
            'image' => 'nullable|mimes:png,jpeg,jpg,webp'
        ];
    }

    public function messages():array{
        return[
            'name.required' => 'vous devez remplir le champ du nom',
            'name.min' => 'Le nom doit avoir au moins :min caractères.',
            'name.max' => 'Le nom ne doit pas dépasser :max caractères.',
            'description.required' => 'Le champ description est requis.',
            'description.string' => 'Le champ description doit être une chaîne de caractères.',
            'location.required' => 'Le champ adresse est requis.',
            'location.string' => 'Le champ adresse doit être une chaîne de caractères.',
            'image.mimes' => 'please  put a valid format for image',
        ];
    }
}
