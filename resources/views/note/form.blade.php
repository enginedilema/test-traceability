<div class="space-y-6">
    
    <div>
        <x-input-label for="user_id" :value="__('User Id')"/>
        <x-text-input id="user_id" name="user_id" type="text" class="mt-1 block w-full" :value="old('user_id', $note?->user_id)" autocomplete="user_id" placeholder="User Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('user_id')"/>
    </div>
    <div>
        <x-input-label for="sample_id" :value="__('Sample Id')"/>
        <x-text-input id="sample_id" name="sample_id" type="text" class="mt-1 block w-full" :value="old('sample_id', $note?->sample_id)" autocomplete="sample_id" placeholder="Sample Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('sample_id')"/>
    </div>
    <div>
        <x-input-label for="comments" :value="__('Comments')"/>
        <x-text-input id="comments" name="comments" type="text" class="mt-1 block w-full" :value="old('comments', $note?->comments)" autocomplete="comments" placeholder="Comments"/>
        <x-input-error class="mt-2" :messages="$errors->get('comments')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>