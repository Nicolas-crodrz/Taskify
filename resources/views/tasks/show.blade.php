<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detalles de Tarea') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-4">
                        <strong>Título:</strong> {{ $task->title }}
                    </div>
                    <div class="mb-4">
                        <strong>Descripción:</strong> {{ $task->description }}
                    </div>
                    <div class="mb-4">
                        @if ($task->status == 'Custom')
                            <strong>Estado Personalizado:</strong> {{ $task->status }}
                        @else
                            <strong>Estado:</strong> {{ $task->status }}
                        @endif
                    </div>
                    <div class="mb-4">
                        <strong>Fecha de Creación:</strong> {{ $task->created_at->format('d/m/Y H:i:s') }}
                    </div>
                    @if ($task->status == 'Terminado')
                        <div class="mb-4">
                            <strong>Fecha de Finalización:</strong>
                            @if ($task->completed_at)
                                {{ \Carbon\Carbon::parse($task->completed_at)->format('d/m/Y H:i:s') }}
                            @else
                                No disponible
                            @endif
                        </div>
                    @endif
                    <div class="mb-4">
                        <strong>Asignada a:</strong> {{ $task->user->name }}
                    </div>
                    <div class="mb-4">
                        <strong>Creada por:</strong> {{ auth()->user()->name }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
