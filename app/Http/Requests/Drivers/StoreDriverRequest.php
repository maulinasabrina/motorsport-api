<?php

namespace App\Http\Requests\Drivers;

use Illuminate\Foundation\Http\FormRequest;

class StoreDriverRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'team' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'number' => ['required', 'integer', 'min:0'],
            'age' => ['required', 'integer', 'min:0'],
            'photo_url' => ['nullable', 'url'],
        ];
    }
}
