<x-app-layout>
    <div class="p-6">
        <h1 class="text-3xl font-bold text-red-600">
            DASHBOARD ADMIN
        </h1>

        <p class="mt-4">
            Bienvenido administrador {{ auth()->user()->name }}
        </p>
    </div>
</x-app-layout>