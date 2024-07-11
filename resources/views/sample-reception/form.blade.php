<div class="space-y-6">
    
    <div>
        <x-input-label for="patient_name" :value="__('Patient Name')"/>
        <x-text-input id="patient_name" name="patient_name" type="text" class="mt-1 block w-full" :value="old('patient_name', $sampleReception?->patient_name)" autocomplete="patient_name" placeholder="Patient Name"/>
        <x-input-error class="mt-2" :messages="$errors->get('patient_name')"/>
    </div>
    <div>
        <x-input-label for="gender" :value="__('Gender')"/>
        <x-text-input id="gender" name="gender" type="text" class="mt-1 block w-full" :value="old('gender', $sampleReception?->gender)" autocomplete="gender" placeholder="Gender"/>
        <x-input-error class="mt-2" :messages="$errors->get('gender')"/>
    </div>
    <div>
        <x-input-label for="age" :value="__('Age')"/>
        <x-text-input id="age" name="age" type="text" class="mt-1 block w-full" :value="old('age', $sampleReception?->age)" autocomplete="age" placeholder="Age"/>
        <x-input-error class="mt-2" :messages="$errors->get('age')"/>
    </div>
    <div>
        <x-input-label for="identification_number" :value="__('Identification Number')"/>
        <x-text-input id="identification_number" name="identification_number" type="text" class="mt-1 block w-full" :value="old('identification_number', $sampleReception?->identification_number)" autocomplete="identification_number" placeholder="Identification Number"/>
        <x-input-error class="mt-2" :messages="$errors->get('identification_number')"/>
    </div>
    <div>
        <x-input-label for="clinical_information" :value="__('Clinical Information')"/>
        <x-text-input id="clinical_information" name="clinical_information" type="text" class="mt-1 block w-full" :value="old('clinical_information', $sampleReception?->clinical_information)" autocomplete="clinical_information" placeholder="Clinical Information"/>
        <x-input-error class="mt-2" :messages="$errors->get('clinical_information')"/>
    </div>
    <div>
        <x-input-label for="origin_lab_id" :value="__('Origin Lab Id')"/>
        <x-text-input id="origin_lab_id" name="origin_lab_id" type="text" class="mt-1 block w-full" :value="old('origin_lab_id', $sampleReception?->origin_lab_id)" autocomplete="origin_lab_id" placeholder="Origin Lab Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('origin_lab_id')"/>
    </div>
    <div>
        <x-input-label for="origin_lab_other" :value="__('Origin Lab Other')"/>
        <x-text-input id="origin_lab_other" name="origin_lab_other" type="text" class="mt-1 block w-full" :value="old('origin_lab_other', $sampleReception?->origin_lab_other)" autocomplete="origin_lab_other" placeholder="Origin Lab Other"/>
        <x-input-error class="mt-2" :messages="$errors->get('origin_lab_other')"/>
    </div>
    <div>
        <x-input-label for="requesting_person" :value="__('Requesting Person')"/>
        <x-text-input id="requesting_person" name="requesting_person" type="text" class="mt-1 block w-full" :value="old('requesting_person', $sampleReception?->requesting_person)" autocomplete="requesting_person" placeholder="Requesting Person"/>
        <x-input-error class="mt-2" :messages="$errors->get('requesting_person')"/>
    </div>
    <div>
        <x-input-label for="registration_date" :value="__('Registration Date')"/>
        <x-text-input id="registration_date" name="registration_date" type="text" class="mt-1 block w-full" :value="old('registration_date', $sampleReception?->registration_date)" autocomplete="registration_date" placeholder="Registration Date"/>
        <x-input-error class="mt-2" :messages="$errors->get('registration_date')"/>
    </div>
    <div>
        <x-input-label for="exfoliative_sample_type_id" :value="__('Exfoliative Sample Type Id')"/>
        <x-text-input id="exfoliative_sample_type_id" name="exfoliative_sample_type_id" type="text" class="mt-1 block w-full" :value="old('exfoliative_sample_type_id', $sampleReception?->exfoliative_sample_type_id)" autocomplete="exfoliative_sample_type_id" placeholder="Exfoliative Sample Type Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('exfoliative_sample_type_id')"/>
    </div>
    <div>
        <x-input-label for="paaf_sample_type_id" :value="__('Paaf Sample Type Id')"/>
        <x-text-input id="paaf_sample_type_id" name="paaf_sample_type_id" type="text" class="mt-1 block w-full" :value="old('paaf_sample_type_id', $sampleReception?->paaf_sample_type_id)" autocomplete="paaf_sample_type_id" placeholder="Paaf Sample Type Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('paaf_sample_type_id')"/>
    </div>
    <div>
        <x-input-label for="sample_type_other" :value="__('Sample Type Other')"/>
        <x-text-input id="sample_type_other" name="sample_type_other" type="text" class="mt-1 block w-full" :value="old('sample_type_other', $sampleReception?->sample_type_other)" autocomplete="sample_type_other" placeholder="Sample Type Other"/>
        <x-input-error class="mt-2" :messages="$errors->get('sample_type_other')"/>
    </div>
    <div>
        <x-input-label for="lateralitat" :value="__('Lateralitat')"/>
        <x-text-input id="lateralitat" name="lateralitat" type="text" class="mt-1 block w-full" :value="old('lateralitat', $sampleReception?->lateralitat)" autocomplete="lateralitat" placeholder="Lateralitat"/>
        <x-input-error class="mt-2" :messages="$errors->get('lateralitat')"/>
    </div>
    <div>
        <x-input-label for="technical_id" :value="__('Technical Id')"/>
        <x-text-input id="technical_id" name="technical_id" type="text" class="mt-1 block w-full" :value="old('technical_id', $sampleReception?->technical_id)" autocomplete="technical_id" placeholder="Technical Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('technical_id')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>