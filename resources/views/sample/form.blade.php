<div class="space-y-6">
    <div>
        <x-input-label for="qr_code" :value="__('Qr Code')"/>
        @if(isset($sample) && $sample->qr_code == null)
        <video id="video" style="width: 100%; max-width: 400px;"></video> <!-- Elemento video para la cámara -->        <script>
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
        <x-text-input id="qr_code" name="qr_code" type="text" class="mt-1 block w-full" :value="old('qr_code', $sample?->qr_code)" autocomplete="qr_code" placeholder="Qr Code"/>

        @else
        <x-text-input id="qr_code" name="qr_code" type="text" class="mt-1 block w-full bg-gray-100" :value="old('qr_code', $sample?->qr_code)" autocomplete="qr_code" placeholder="Qr Code" readonly/>
        @endif
        <x-input-error class="mt-2" :messages="$errors->get('qr_code')"/>
    </div>
    <div>
        <x-input-label for="name" :value="__('Name')"/>
        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $sample?->name)" autocomplete="name" placeholder="Name"/>
        <x-input-error class="mt-2" :messages="$errors->get('name')"/>
    </div>
    <div>
        <x-input-label for="user_id" :value="__('User')"/>
        @if(isset($sample) && $sample->user_id !== null)
            <!-- Vista Editar -->
            <x-text-input id="user_name" name="user_name" type="text" class="mt-1 block w-full bg-gray-100" :value="$sample->user->name" readonly/>
            <input type="hidden" name="user_id" value="{{ $sample->user->id }}"/>
        @else
            <!-- Vista Crear -->
            <x-text-input id="user_name" name="user_name" type="text" class="mt-1 block w-full bg-gray-100" :value="Auth::user()->name" readonly/>
            <input type="hidden" name="user_id" value="{{ Auth::id()}}"/>
        @endif
        <x-input-error class="mt-2" :messages="$errors->get('user_id')"/>
    </div>
    <div>
        <x-input-label for="sample_type_id" :value="__('Sample Type')"/>
        <select id="sample_type_id" name="sample_type_id" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
            @foreach($sampleTypes as $sampleType)
                <option value="{{ $sampleType->id }}" @selected(old('sample_type_id', $sample?->sample_type_id) == $sampleType->id)>
                    {{ $sampleType->type }}
                </option>
            @endforeach
        </select>
        <x-input-error class="mt-2" :messages="$errors->get('sample_type_id')"/>
    </div>
    <div>
        <x-input-label for="status_id" :value="__('Status')"/>
        <select id="status_id" name="status_id" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
            @foreach($statuses as $status)
                <option value="{{ $status->id }}" @selected(old('status_id', $sample?->status_id) == $status->id)>
                    {{ $status->name }}
                </option>
            @endforeach
        </select>
        <x-input-error class="mt-2" :messages="$errors->get('status_id')"/>
    </div>
    <div>
        <x-input-label for="observations" :value="__('Observations')"/>
        <x-text-input id="observations" name="observations" type="text" class="mt-1 block w-full" :value="old('observations', $sample?->observations)" autocomplete="observations" placeholder="Observations"/>
        <x-input-error class="mt-2" :messages="$errors->get('observations')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>