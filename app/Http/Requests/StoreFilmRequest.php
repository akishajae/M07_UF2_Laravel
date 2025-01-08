<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFilmRequest extends FormRequest
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
            'name' => 'required',
            'year' => 'required|integer',
            'genre' => 'required',
            'country' => 'required',
            'duration' => 'required|integer',
            'img_url' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Campo requerido.',

            'year.required' => 'Campo requerido.',
            'year.integer' => 'El año ha de ser un valor numérico.',

            'genre.required' => 'Campo requerido.',

            'country.required' => 'Campo requerido.',

            'duration.required' => 'Campo requerido.',
            'duration.integer' => 'La duración ha de ser un valor numérico.',

            'img_url.required' => 'Campo requerido.'
        ];
    }
}
