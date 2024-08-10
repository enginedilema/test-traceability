<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SampleReceptionRequest extends FormRequest
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
            'sample_qr' => 'required',
			'patient_name' => 'string',
			'gender' => 'string',
			'origin_lab_id' => 'required',
			'registration_date' => 'string',
			'technical_id' => 'required',
        ];
    }
}
