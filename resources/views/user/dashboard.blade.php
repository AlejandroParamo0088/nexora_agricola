<x-app-layout>
    <div class="p-6">
        <h1 class="text-3xl font-bold text-green-600">
            DASHBOARD USUARIO
        </h1>

        <p class="mt-4">
            Bienvenido {{ auth()->user()->name }}
        </p>
    </div>
</x-app-layout>