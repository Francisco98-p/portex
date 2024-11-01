<x-event-layout>

    <x-slot name="title">Contador</x-slot>

    <div class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div class="container mx-auto px-4 py-8">
            <div class="flex items-center space-x-4">
                <span class="text-2xl font-bold m-3">{{ $número }}</span>
                <x-button class="bg-green-500 hover:bg-green-600 m-3"
                    onclick="location.href='{{ route('incrementar', compact('número')) }}'">
                    Incrementar
                </x-button>
                <x-button class="bg-red-500 hover:bg-red-600 m-3"
                    onclick="location.href='{{ route('decrementar', compact('número')) }}'">
                    Decrementar
                </x-button>

                <!-- go to landing -->
                <a href="{{ route('landing') }}"
                    class="bg-blue-500 hover:bg-blue-600 p-3 rounded-lg text-white">Landing</a>
            </div>
        </div>
    </div>
</x-event-layout>
