<div class="space-y-6">
    
    <div>
        <x-input-label for="sample_qr" :value="__('Sample QR')"/>
        @if( $sampleReception?->sample?->qr_code === null)
        <video id="video" style="width: 100%; max-width: 400px;"></video> <!-- Elemento video para la cámara -->        
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const codeReader = new ZXing.BrowserQRCodeReader();
                const videoElem = document.createElement('video');
                videoElem.style.display = 'none'; // Ocultar el elemento video
        
                document.body.appendChild(videoElem); // Agregar el elemento video al body
        
                codeReader
                    .decodeFromInputVideoDevice(undefined, 'video')
                    .then(result => {
                        document.querySelector('#qr_code').value = result.text;
                        videoElem.srcObject.getTracks().forEach(track => track.stop()); // Detener la cámara
                    })
                    .catch(err => console.error(err));
        
                codeReader
                    .listVideoInputDevices()
                    .then(videoInputDevices => {
                        const selectedDeviceId = videoInputDevices[0].deviceId;
                        codeReader.decodeFromInputVideoDevice(selectedDeviceId, 'video');
                    })
                    .catch(err => console.error(err));
            });
        </script>
        @endif
        <x-text-input id="sample_qr" name="sample_qr" type="text" class="mt-1 block w-full" :value="old('sample_qr', $sampleReception?->sample?->qr_code)" autocomplete="sample_qr" placeholder="Sample QR"/>
        <x-input-error class="mt-2" :messages="$errors->get('sample_qr')"/>
    </div>
    <div>
        <x-input-label for="patient_name" :value="__('Patient Name')"/>
        <x-text-input id="patient_name" name="patient_name" type="text" class="mt-1 block w-full" :value="old('patient_name', $sampleReception?->patient_name)" autocomplete="patient_name" placeholder="Patient Name"/>
        <x-input-error class="mt-2" :messages="$errors->get('patient_name')"/>
    </div>
    <div>
        <x-input-label for="gender" :value="__('Gender')"/>
            <select name="gender" id="gender"  class="w-full px-3 py-2 border rounded-md   border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                <option value="M" @if(isset($sampleReception) && $sampleReception->gender === 'M') selected @endif>Male</option>
                <option value="F" @if(isset($sampleReception) && $sampleReception->gender === 'F') selected @endif>Female</option>
            </select> 
        <x-input-error class="mt-2" :messages="$errors->get('gender')"/>
    </div>
    <div>
        <x-input-label for="age" :value="__('Age')"/>
        <x-text-input id="age" name="age" type="number" class="mt-1 block w-full" :value="old('age', $sampleReception?->age)" autocomplete="age" placeholder="Age"/>
        <x-input-error class="mt-2" :messages="$errors->get('age')"/>
    </div>
    <div>
        <x-input-label for="identification_number" :value="__('Identification Number')"/>
        <x-text-input id="identification_number" name="identification_number" type="text" class="mt-1 block w-full" :value="old('identification_number', $sampleReception?->identification_number)" autocomplete="identification_number" placeholder="Identification Number"/>
        <x-input-error class="mt-2" :messages="$errors->get('identification_number')"/>
    </div>
    <div>
        <x-input-label for="clinical_information" :value="__('Clinical Information')"/>
        <textarea id="clinical_information" name="clinical_information" class="mt-1 block w-full resize-none border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" autocomplete="clinical_information" placeholder="Examples: Nodule in the right breast, Cough and repeated hemoptysis, Suspected recurrence of urothelial neoplasia">{{ old('clinical_information', $sampleReception?->clinical_information) }}</textarea>        <x-input-error class="mt-2" :messages="$errors->get('clinical_information')"/>
    </div>
    <div>
        <x-input-label for="origin_lab_id" :value="__('Origin Lab')"/>
            <select id="origin_lab_id" name="origin_lab_id" class="w-full px-3 py-2 border rounded-md   border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                @foreach($originLabs as $originLab)
                    <option value="{{ $originLab->id }}" @selected(old('original_lab_id', $sampleReception?->origin_lab_id) == $originLab->id)>
                        {{ $originLab->name }}
                    </option>
                @endforeach
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('origin_lab_id')"/>
            <x-text-input id="origin_lab_other" name="origin_lab_other" type="text" class="mt-1 block w-full" :value="old('origin_lab_other', $sampleReception?->origin_lab_other)" autocomplete="origin_lab_other" placeholder="Origin Lab Other"/>
            <x-input-error class="mt-2" :messages="$errors->get('origin_lab_other')"/>
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        var originLabSelect = document.getElementById('origin_lab_id');
                        var originLabOtherInput = document.getElementById('origin_lab_other');
            
                        // Función para mostrar u ocultar el campo 'origin_lab_other'
                        function toggleOriginLabOther() {
                            if (originLabSelect.value == '3') {
                                originLabOtherInput.classList.remove('hidden');
                            } else {
                                originLabOtherInput.classList.add('hidden');
                            }
                        }
            
                        // Llamar a la función al cargar la página y cada vez que cambia el select
                        toggleOriginLabOther();
                        originLabSelect.addEventListener('change', toggleOriginLabOther);
                    });
                </script>
    </div>

    <div>
        <x-input-label for="requesting_person" :value="__('Requesting Person')"/>
        <x-text-input id="requesting_person" name="requesting_person" type="text" class="mt-1 block w-full" :value="old('requesting_person', $sampleReception?->requesting_person)" autocomplete="requesting_person" placeholder="Requesting Person"/>
        <x-input-error class="mt-2" :messages="$errors->get('requesting_person')"/>
    </div>

                <!-- Tipus de mostra -->

<div class="mb-6">
    <h2 class="text-xl font-semibold mb-4">Tipus de mostra</h2>
    <select id="sample_type" name="sample_type" class="w-full px-3 py-2 border rounded-md" onchange="handleSampleTypeChange(event)">
        <option value="">Selecciona un tipus de mostra</option>
        <option value="exfoliativa">Citologia exfoliativa</option>
        <option value="paaf">PAAF</option>
    </select>

    <div id="exfoliativa-options" class="mt-4 hidden">
        <select id="exfoliative_sample_type_id" name="exfoliative_sample_type_id" class="w-full px-3 py-2 border rounded-md" onchange="checkToShowSampleTypeOther(event)">
            @foreach($sampleTypeExfoliatives as $sampleTypeExfoliative)
            <option value="{{ $sampleTypeExfoliative->id }}" @if(old('exfoliative_sample_type_id', $sampleReception?->exfoliative_sample_type_id) == $sampleTypeExfoliative->id) selected @endif>
                {{ $sampleTypeExfoliative->name }}
            </option>
            @endforeach
        </select>
    </div>

    <div id="paaf-options" class="mt-4 hidden">
        <select id="paaf_sample_type_id" name="paaf_sample_type_id" class="w-full px-3 py-2 border rounded-md"  onchange="checkToShowSampleTypeOther(event)">
            @foreach($sampleTypePaafs as $sampleTypePaaf)
            <option value="{{ $sampleTypePaaf->id }}" @if(old('paaf_sample_type_id', $sampleReception?->paaf_sample_type_id) == $sampleTypePaaf->id) selected @endif>
                {{ $sampleTypePaaf->name }}
            </option>
            @endforeach
        </select>
    </div>

    <!-- Campo sample_type_other que se mostrará dinámicamente -->
    <x-text-input id="sample_type_other" name="sample_type_other" type="text" class="mt-1 block w-full hidden" :value="old('sample_type_other', $sampleReception?->sample_type_other)" autocomplete="sample_type_other" placeholder="Sample Type Other"/>
    <x-input-error class="mt-2" :messages="$errors->get('sample_type_other')"/>
</div>

<script>
    function handleSampleTypeChange(event) {
        const exfoliativaOptions = document.getElementById('exfoliativa-options');
        const paafOptions = document.getElementById('paaf-options');
        const sampleTypeOtherInput = document.getElementById('sample_type_other');
        const exfoliativaSelect = document.getElementById('exfoliative_sample_type_id');
        const paafSelect = document.getElementById('paaf_sample_type_id');

        // Ocultar todas las opciones
        exfoliativaOptions.classList.add('hidden');
        paafOptions.classList.add('hidden');

        // Resetear el valor del campo sample_type_other
        sampleTypeOtherInput.value = '';
        
        // Resetear el valor de los selects
        exfoliativaSelect.selectedIndex = 0;
        paafSelect.selectedIndex = 0;

        // Mostrar las opciones correspondientes según el tipo seleccionado
        if (event.target.value === 'exfoliativa') {
            exfoliativaOptions.classList.remove('hidden');
        } else if (event.target.value === 'paaf') {
            paafOptions.classList.remove('hidden');
        }
        checkToShowSampleTypeOther(event);

    }

    function checkToShowSampleTypeOther(event) {
        const exfoliativeSampleTypeId = document.getElementById('exfoliative_sample_type_id').value;
        const paafSampleTypeId = document.getElementById('paaf_sample_type_id').value;
        const sampleTypeOtherInput = document.getElementById('sample_type_other');

        // Mostrar el campo sample_type_other si las condiciones se cumplen
        if (exfoliativeSampleTypeId == 14 || paafSampleTypeId == 6) {
            sampleTypeOtherInput.classList.remove('hidden');
        } else {
            sampleTypeOtherInput.classList.add('hidden');
        }
    }

    </script>
                
    
    <div>
        <x-input-label for="lateralitat" :value="__('Lateralitat')"/>
        <x-text-input id="lateralitat" name="lateralitat" type="text" class="mt-1 block w-full" :value="old('lateralitat', $sampleReception?->lateralitat)" autocomplete="lateralitat" placeholder="Lateralitat"/>
        <x-input-error class="mt-2" :messages="$errors->get('lateralitat')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>