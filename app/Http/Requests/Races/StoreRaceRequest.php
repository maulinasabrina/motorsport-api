<?php

namespace App\Http\Requests\Races;

use Illuminate\Foundation\Http\FormRequest;

class StoreRaceRequest extends FormRequest
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
            'grand_prix' => 'required|string|max:255',
            'date' => 'required|date',
            'track' => 'required|string|max:255',
            'laps' => 'required|integer|min:1',
            'weather' => 'nullable|string|max:255',
        ];
    }
}
