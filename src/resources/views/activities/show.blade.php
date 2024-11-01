<x-crud-layout>
    <x-slot name="title">Detalle de la actividad</x-slot>
    <a href="{{ route('activities.index') }}">
        <div
            class="inline-flex items-center px-4 py-2 mb-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
            </svg>
        </div>
    </a>

    <p>Nombre: {{ $activity->name }}</p>
    <p>Descripción: {{ $activity->description }}</p>
    <img src="data:image/png;base64,{{ $activity->image }}" alt="Imagen de la actividad" width="255">

</x-crud-layout>
