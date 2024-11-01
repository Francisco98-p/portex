<x-crud-layout>
    <x-slot name="title">Modificar actividad de {{ $patient_full_name }}</x-slot>

    <a href="{{ route('patient-activities.index', ['patient_id' => $patientActivity->patient_id]) }}">
        <div
            class="inline-flex items-center px-4 py-2 mb-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
            </svg>
        </div>
    </a>
    {{-- información de la actividad --}}
    <div class="mt-2 border border-gray-200 dark:border-gray-700 rounded-md p-4 shadow-md">
        <x-label for="activity_id" value="Actividad" />
        <input type="text" name="activity_id" id="activity_id"
            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full"
            value="{{ $patientActivity->activity->name }}" readonly>
        <textarea name="description" id="description" cols="30" rows="2"
            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full"
            readonly>{{ $patientActivity->activity->description }}</textarea>
    </div>
    {{-- Formulario para modificar actividad --}}
    <form action="{{ route('patient-activities.update', ['patient_activity' => $patientActivity->id]) }}" method="POST"
        class="mt-2" novalidate enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mt-2">
            <x-label for="description" value="Descripción" />
            <textarea name="description" id="description" cols="30" rows="2"
                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full"
                required>{{ old('description', $patientActivity->description) }}</textarea>
        </div>
        <div class="mt-2">
            <x-label for="reasons" value="Razones" />
            <textarea name="reasons" id="reasons" cols="30" rows="2"
                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full"
                required>{{ old('reasons', $patientActivity->reasons) }}</textarea>
        </div>
        <div class="mt-2">
            <x-label for="goals" value="Objetivos" />
            <textarea name="goals" id="goals" cols="30" rows="2"
                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full"
                required>{{ old('goals', $patientActivity->goals) }}</textarea>
        </div>
        <div class="mt-2">
            <x-label for="indicators" value="Indicadores" />
            <textarea name="indicators" id="indicators" cols="30" rows="2"
                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full"
                required>{{ old('indicators', $patientActivity->indicators) }}</textarea>
        </div>
        <div class="flex items-center justify-end mt-4">
            <x-button class="ms-4">Actualizar actividad</x-button>
        </div>
    </form>
</x-crud-layout>
