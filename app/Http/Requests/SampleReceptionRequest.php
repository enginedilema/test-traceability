<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Sample;
use App\Models\Status;

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
            'sample_qr' => [
                'required',
                function ($attribute, $value, $fail) {
                    $sample = Sample::where('qr_code', $value)->first();
                    
                    if (!$sample) {
                        $fail(__('The selected :attribute is invalid.', ['attribute' => $attribute]));
                    }

                    // Verifica si el status es inferior a SAMPLE_RECEPTION
                    if ($sample && $sample->id <= Status::$SAMPLE_RECEPTION) {
                        $fail(__('The sample status must be less than SAMPLE_RECEPTION.'));
                    }
                },
            ],
			'patient_name' => 'string',
			'gender' => 'string',
			'origin_lab_id' => 'required',
			'registration_date' => 'string',
			'technical_id' => 'required',
        ];
    }
}
