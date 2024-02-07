<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnnouncementsRequest extends FormRequest
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
            'title'=>'required|min:10|max:255',
            'description'=>'required|string',
            'company_id'=>'required|string',
            'image' => 'nullable|mimes:png,jpeg,jpg,webp'
        ];
    }
    public function messages():array{
        return[
            'title.required' => 'vous devez remplir le champ du titre',
            'title.min' => 'Le titre doit avoir au moins :min caractères.',
            'title.max' => 'Le titre ne doit pas dépasser :max caractères.',
            'description.required' => 'Le champ description est requis.',
            'description.string' => 'Le champ description doit être une chaîne de caractères.',
            'company_id.required' => 'Le champ entreprise est requis.',
            'company_id.string' => 'Le champ entreprise doit être une chaîne de caractères.',
            'image.mimes' => 'please  put a valid format for image'
        ];
    }
}
