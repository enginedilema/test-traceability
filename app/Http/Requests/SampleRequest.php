<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SampleRequest extends FormRequest
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
			'qr_code' => 'required|string',
			'name' => 'required|string',
			'user_id' => 'required',
			'sample_type_id' => 'required',
			'status_id' => 'required',
			'observations' => 'string',
        ];
    }
}
