<x-crud-layout>
    <x-slot name="title">Mostrar actividad del paciente</x-slot>

    <a href="{{ route('patient-activities.index', ['patient_id' => $patientActivity->patient_id]) }}">
        <div
            class="inline-flex items-center px-4 py-2 mb-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
            </svg>
        </div>
    </a>
    <div class="mt-4">
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Paciente</h3>
                    <p class="mt-1 max-w -2xl text-sm text-gray-500">
                        {{ $patientActivity->patient->apellidos }},
                        {{ $patientActivity->patient->nombres }}</p>
                </div>
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Actividad</h3>
                    <p class="mt-1 max-w
                    -2xl text-sm text-gray-500">
                        {{ $patientActivity->activity->name }}</p>
                </div>

                <div class="border-t border-gray-200">
                    <dl>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Descripción</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                                {{ $patientActivity->description }}
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Razones</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                                {{ $patientActivity->reasons }}
                            </dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Objetivos</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                                {{ $patientActivity->goals }}
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Indicadores</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                                {{ $patientActivity->indicators }}
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</x-crud-layout>
