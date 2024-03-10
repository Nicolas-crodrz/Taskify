<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Tarea') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('tasks.update', $task->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="title"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Título:</label>
                            <input type="text" name="title" id="title" value="{{ $task->title }}"
                                class="mt-1 p-2 block w-full border border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 bg-black"
                                required>
                        </div>
                        <div class="mb-4">
                            <label for="description"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Descripción:</label>
                            <textarea name="description" id="description" rows="4"
                                class="mt-1 p-2 block w-full border border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 bg-black"
                                required>{{ $task->description }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label for="status"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Estado:</label>
                            <select name="status" id="status"
                                class="mt-1 p-2 block w-full border border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 bg-black"
                                required>
                                <option value="Pendiente" {{ $task->status === 'Pendiente' ? 'selected' : '' }}>
                                    Pendiente</option>
                                <option value="En Proceso" {{ $task->status === 'En Proceso' ? 'selected' : '' }}>En
                                    Proceso</option>
                                <option value="Terminado" {{ $task->status === 'Terminado' ? 'selected' : '' }}>
                                    Terminado</option>
                                <option value="Custom"
                                    {{ $task->status !== 'Pendiente' && $task->status !== 'En Proceso' && $task->status !== 'Terminado' ? 'selected' : '' }}>
                                    Custom</option>
                            </select>

                            <label for="custom_status"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Estado
                                Personalizado:</label>
                            <input type="text" name="custom_status" id="custom_status"
                                class="mt-1 p-2 block w-full border border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 bg-black">
                        </div>
                </div>

                <button type="submit"
                    class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:bg-blue-700">Actualizar
                    Tarea</button>
                </form>
            </div>
        </div>
    </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const statusSelect = document.getElementById('status');
            const customStatusDiv = document.getElementById('custom_status');

            statusSelect.addEventListener('change', function() {
                if (statusSelect.value === 'Custom') {
                    customStatusDiv.classList.remove('hidden');
                } else {
                    customStatusDiv.classList.add('hidden');
                }
            });
        });
    </script>

</x-app-layout>
