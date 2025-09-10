

@php
    // Cambia el fondo aquí, solo pon el nombre del archivo
        // Fondo sólido blanco temporal
@endphp
<div style="background-image: url('/fondo 2.png'); background-size: cover; min-height: 100vh; display: flex; align-items: center; justify-content: center;">
<x-guest-layout>
        <div class="w-full max-w-md mx-auto bg-white bg-opacity-90 p-8 rounded shadow">
            <div class="text-center mb-6">
                <a href="/">
                    <img src="/Logo.png" alt="Logo Macro Proveedores" class="w-24 h-24 mx-auto mb-2" />
                </a>
                <h2 class="text-2xl font-bold text-blue-900">Registro</h2>
                <p class="text-gray-700">Crea tu cuenta para acceder</p>
            </div>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-4">
                    <x-input-label for="name" :value="__('Nombre')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div class="mb-4">
                    <x-input-label for="password" :value="__('Contraseña')" />
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <div class="mb-4">
                    <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
                <div class="flex items-center justify-between mt-4">
                    <a class="text-sm text-blue-700 hover:underline" href="{{ route('login') }}">
                        ¿Ya tienes cuenta?
                    </a>
                    <x-primary-button class="ml-4">
                        Registrarse
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
