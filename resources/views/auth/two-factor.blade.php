<x-guest-layout>

    <div class="mb-6 text-center">

        <h2 class="text-2xl font-bold text-green-700">
            Verificación de seguridad
        </h2>

        <p class="mt-2 text-gray-600">
            Ingresa el código de 6 dígitos enviado a tu correo.
        </p>

    </div>

    <form method="POST" action="{{ route('2fa.store') }}">
        @csrf

        <div>
            <x-input-label for="code" :value="'Código OTP'" />

            <x-text-input
                id="code"
                class="block mt-1 w-full text-center text-2xl tracking-[10px]"
                type="text"
                name="code"
                required
                autofocus
                maxlength="6"
            />

            <x-input-error :messages="$errors->get('code')" class="mt-2" />
        </div>

        <div class="flex justify-center mt-6">

            <x-primary-button>
                Verificar Código
            </x-primary-button>

        </div>
    </form>

</x-guest-layout>