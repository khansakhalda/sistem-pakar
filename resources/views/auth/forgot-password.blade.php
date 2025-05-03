<x-guest-layout>
    <div class="text-center mb-6">
        <img src="{{ asset('assets/vendors/images/nyamuk.png') }}" alt="Ilustrasi Nyamuk" class="w-20 h-20 mx-auto mb-4 animate-pulse">
        <h1 class="text-xl font-semibold text-blue-700">Reset Kata Sandi</h1>
        <p class="text-sm text-gray-600 mt-2">
            Lupa kata sandi? Masukkan email kamu dan kami akan mengirimkan tautan untuk reset.
        </p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input 
                id="email" 
                name="email" 
                type="email"
                :value="old('email')" 
                required 
                autofocus 
                class="block mt-1 w-full border border-blue-300 focus:border-blue-500 focus:ring focus:ring-blue-200 rounded-md shadow-sm transition ease-in-out duration-200"
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Submit Button -->
        <div class="flex items-center justify-end">
            <x-primary-button class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg shadow transition hover:scale-105">
                {{ __('Kirim Link Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>