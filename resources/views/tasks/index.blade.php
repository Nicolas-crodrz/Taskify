<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lista de Tareas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <ul class="list-group">
                        @foreach ($tasks as $task)
                            <li class="list-group-item flex justify-between items-center mb-2">
                                <div>
                                    {{ $task->title }} - {{ $task->status }}
                                    @if ($task->status == 'Terminada')
                                        @if ($task->completed_at)
                                            <span class="text-gray-500 dark:text-gray-400 text-sm">
                                                ({{ \Carbon\Carbon::parse($task->completed_at)->format('d/m/Y') }})
                                            </span>
                                        @else
                                            <span class="text-gray-500 dark:text-gray-400 text-sm">(No disponible)</span>
                                        @endif
                                    @endif
                                </div>
                                <div class="flex space-x-2">
                                    <a href="{{ route('tasks.show', $task->id) }}"
                                        class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                                        Ver detalles
                                    </a>
                                    <a href="{{ route('tasks.edit', $task->id) }}"
                                        class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
                                        Editar tarea
                                    </a>
                                </div>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
