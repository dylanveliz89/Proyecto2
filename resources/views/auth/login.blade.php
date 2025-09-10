<style>
    body {
        background: url('/F0ndo L.png') no-repeat center center fixed;
        background-size: cover;
        min-height: 100vh;
    }
</style>
<x-guest-layout>
    <div class="text-center mb-10">
        <a href="/">
            <img src="/Logo.png" alt="Logo Macro Proveedores" class="w-24 h-24 mx-auto mb-2" style="margin-top:40px;" />
        </a>
        <h2 class="text-2xl font-bold text-blue-900">Iniciar Sesión</h2>
        <p class="text-gray-700">Bienvenido, por favor ingresa tus datos</p>
    </div>
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <div class="mb-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <div class="flex items-center justify-between mb-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500" name="remember">
                <span class="ml-2 text-sm text-gray-700">{{ __('Recordarme') }}</span>
            </label>
        </div>
        <x-primary-button class="w-full">
            {{ __('Ingresar') }}
        </x-primary-button>
    </form>
</x-guest-layout>
