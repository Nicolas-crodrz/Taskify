<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detalles de Tarea') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="mb-6">
                        <strong class="text-lg text-gray-800 dark:text-gray-200">Título:</strong>
                        <p class="text-gray-700 dark:text-gray-300">{{ $task->title }}</p>
                    </div>
                    <div class="mb-6">
                        <strong class="text-lg text-gray-800 dark:text-gray-200">Descripción:</strong>
                        <p class="text-gray-700 dark:text-gray-300">{{ $task->description }}</p>
                    </div>
                    <div class="mb-6">
                        <strong class="text-lg text-gray-800 dark:text-gray-200">Estado:</strong>
                        <p class="text-gray-700 dark:text-gray-300">{{ $task->status }}</p>
                    </div>
                    <div class="mb-6">
                        <strong class="text-lg text-gray-800 dark:text-gray-200">Fecha de Creación:</strong>
                        <p class="text-gray-700 dark:text-gray-300">{{ $task->created_at->format('d/m/Y H:i:s') }}</p>
                    </div>
                    @if ($task->status == 'Terminado')
                        <div class="mb-6">
                            <strong class="text-lg text-gray-800 dark:text-gray-200">Fecha de Finalización:</strong>
                            @if ($task->completed_at)
                                <p class="text-gray-700 dark:text-gray-300">
                                    {{ \Carbon\Carbon::parse($task->completed_at)->format('d/m/Y H:i:s') }}</p>
                            @else
                                <p class="text-gray-700 dark:text-gray-300">No disponible</p>
                            @endif
                        </div>
                    @endif
                    <div class="mb-6">
                        <strong class="text-lg text-gray-800 dark:text-gray-200">Asignada a:</strong>
                        <p class="text-gray-700 dark:text-gray-300">{{ $task->user->name }}</p>
                    </div>
                    <div class="mb-6">
                        <strong class="text-lg text-gray-800 dark:text-gray-200">Creada por:</strong>
                        <p class="text-gray-700 dark:text-gray-300">{{ auth()->user()->name }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
