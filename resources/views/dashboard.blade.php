<x-app-layout>
    <x-slot name="header">
        <div class="text-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('¡Bienvenido a Taskify!') }}
            </h2>
            <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">Dashboard</p>
        </div>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg p-6">
                        <h1 class="text-2xl font-semibold mb-4">¡Taskify - Tu Gestor de Tareas Favorito! 🚀</h1>
                        <p class="mb-4">¡Bienvenido a Taskify! Esta es una aplicación web desarrollada con Laravel que
                            te permite gestionar tus tareas de manera eficiente y divertida. Con Taskify, podrás
                            organizar tus actividades diarias, asignarlas a diferentes usuarios y realizar un
                            seguimiento de su progreso.</p>
                    </div>

                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg p-6 mt-2">
                        <h2 class="text-lg font-semibold mt-8 mb-4">Características Principales 💡</h2>
                        <ul class="list-disc ml-6 mb-4">
                            <li>Registro e Inicio de Sesión: Únete a nuestra comunidad registrándote en Taskify y accede
                                fácilmente a tu cuenta para comenzar a gestionar tus tareas.</li>
                            <li>Creación y Asignación de Tareas: Crea nuevas tareas especificando un título, descripción
                                y
                                asignándolas a usuarios específicos.</li>
                            <li>Estados de Tareas Personalizables: Cambia el estado de tus tareas entre Pendiente, En
                                Proceso y Terminada. ¡Incluso puedes definir tus propios estados personalizados!</li>
                            <li>Historial de Acciones: Mantenemos un registro detallado de todas las acciones realizadas
                                sobre tus tareas, incluyendo cambios de estado, asignación y reasignación.</li>
                            <li>Interfaz Amigable: Nuestra interfaz de usuario intuitiva te permite navegar fácilmente
                                por
                                tus tareas y realizar acciones con un par de clics.</li>
                        </ul>
                    </div>

                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg p-6 mt-2">
                        <h2 class="text-lg font-semibold mt-8 mb-4">¿Cómo Empezar? 🛠️</h2>
                        <p class="mb-4"><strong>Instalación:</strong></p>
                        <ol class="list-decimal ml-6 mb-4">
                            <li>Clona el repositorio de Taskify en tu máquina local.</li>
                            <li>Ejecuta composer install para instalar las dependencias.</li>
                            <li>Copia el archivo .env.example a .env y configura tu entorno.</li>
                            <li>Ejecuta php artisan key:generate para generar una nueva clave de aplicación.</li>
                        </ol>

                        <p class="mb-4"><strong>Base de Datos:</strong></p>
                        <ol class="list-decimal ml-6 mb-4">
                            <li>Crea una nueva base de datos para Taskify.</li>
                            <li>Actualiza las credenciales de la base de datos en el archivo .env.</li>
                            <li>Ejecuta php artisan migrate para migrar las tablas necesarias.</li>
                        </ol>

                        <p class="mb-4"><strong>¡Comienza a Gestionar Tareas!</strong></p>
                        <ol class="list-decimal ml-6 mb-4">
                            <li>Inicia el servidor ejecutando php artisan serve.</li>
                            <li>Visita http://localhost:8000 en tu navegador y comienza a usar Taskify.</li>
                        </ol>
                    </div>

                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg p-6 mt-2">
                        <h2 class="text-lg font-semibold mt-8 mb-4">Colaboración y Contribución 🤝</h2>
                        <p class="mb-4">¡Estamos abiertos a colaboraciones y contribuciones de la comunidad! Si tienes
                            ideas para mejorar Taskify o encuentras algún error, no dudes en crear un issue o enviar un
                            pull
                            request en nuestro repositorio.</p>
                    </div>

                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg p-6 mt-2">
                        <h2 class="text-lg font-semibold mt-8 mb-4">¡Únete a la Comunidad! 🌟</h2>
                        <p class="mb-4">¡Síguenos en nuestras redes sociales para estar al tanto de las últimas
                            actualizaciones y novedades de Taskify! Únete a nuestra comunidad de usuarios apasionados
                            por la
                            productividad y la organización.</p>
                    </div>

                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg p-6 mt-2">
                        <h2 class="text-lg font-semibold mt-8 mb-4">Problemas o Consultas 🤔</h2>
                        <p class="mb-4">Si encuentras algún problema o tienes alguna consulta relacionada con Taskify,
                            no
                            dudes en ponerte en contacto con nuestro equipo de soporte. Estamos aquí para ayudarte en
                            cualquier momento.</p>

                        <p class="mb-4">¡Gracias por elegir Taskify como tu gestor de tareas preferido! ¡Esperamos que
                            disfrutes organizando tus tareas con nosotros! 🚀</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
