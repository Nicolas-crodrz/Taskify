<!-- history.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lista de Tareas') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center"> <!-- Centrado el contenido -->
                    <h1 class="text-2xl font-semibold mb-4">Historial de acciones de la tarea "{{ $task->title }}"</h1>
                    <!-- Tamaño del texto aumentado a text-2xl -->
                    <hr class="my-2">
                    <ul>
                        @foreach ($history as $action)
                            <li class="mb-4">
                                <p class="mb-1">Acción: {{ $action->action }}</p>
                                <p class="mb-1">Fecha y hora: {{ $action->created_at }}</p>
                                <p class="mb-1">Usuario: {{ $action->user->name }}</p>
                            </li>
                            <hr class="my-2"> <!-- Separación entre bloques -->
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
