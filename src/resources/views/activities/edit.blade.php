<x-crud-layout>
    <x-slot name="title">Modificar actividad</x-slot>

    <a href="{{ route('activities.index') }}">
        <div
            class="inline-flex items-center px-4 py-2 mb-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
            </svg>
        </div>
    </a>

    <form action="{{ route('activities.update', $activity) }}" method="POST" class="mt-2"
        enctype="multipart/form-data" novalidate>
        @csrf
        @method('PUT')
        <div class="mt-2">
            <x-label for="name" value="Nombre" />
            <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                value="{{ $activity->name }}" required autofocus autocomplete="name" />
        </div>
        <div class="mt-2">
            <x-label for="description" value="Descripción" />
            <textarea name="description" id="description" cols="30" rows="3"
                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full"
                required>{{ $activity->description }}</textarea>
        </div>
        <div class="mt-2">
            <img src="data:image/png;base64,{{ $activity->image }}" alt="Imagen de la actividad" width="255">
        </div>
        <div class="mt-2">
            <x-label for="image" value="Imagen" />
            <x-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')" required
                autocomplete="image" />
        </div>
        <div class="flex items-center justify-end mt-4">
            <x-button class="ml-4">
                {{ __('Modificar actividad') }}
            </x-button>
        </div>
    </form>

</x-crud-layout>
