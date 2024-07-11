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
			'patient_name' => 'string',
			'gender' => 'string',
			'identification_number' => 'string',
			'clinical_information' => 'string',
			'origin_lab_id' => 'required',
			'origin_lab_other' => 'string',
			'requesting_person' => 'string',
			'registration_date' => 'required',
			'sample_type_other' => 'string',
			'lateralitat' => 'string',
			'technical_id' => 'required',
        ];
    }
}
