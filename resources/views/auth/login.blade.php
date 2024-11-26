@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-start h-screen ">
        <div class="bg-white rounded-lg p-10 shadow-lg w-full max-w-md">
            <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">Connexion</h2>


            <form action="{{ route('login') }}" method="POST" class="space-y-4">
                @csrf
                @method('POST')

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    @error('email')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        required
                        class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    @error('password')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button
                    type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">
                    Connexion
                </button>
            </form>

            <!-- Sign up Link -->
            <p class="text-center text-sm text-gray-600 mt-6">
                Pas encore de compte ?
                <a href="{{ route('showRegisterForm') }}" class="text-blue-600 hover:underline ">Inscrivez-vous</a>.
            </p>
        </div>
    </div>
@endsection
