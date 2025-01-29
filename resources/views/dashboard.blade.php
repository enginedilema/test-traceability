<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="flex justify-center items-center space-x-20 py-32">
        <a href="/citologia" class="px-16 py-8 bg-blue-500 text-white rounded-lg text-2xl font-bold shadow-lg hover:bg-blue-700 transition">Citología</a>
        <a href="/biopsia" class="px-16 py-8 bg-green-500 text-white rounded-lg text-2xl font-bold shadow-lg hover:bg-green-700 transition">Biopsia</a>
    </div>
</x-app-layout>