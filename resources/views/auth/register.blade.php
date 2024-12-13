<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="foto" :value="__('Foto')" />
            <x-text-input id="foto" class="block mt-1 w-full" type="file" name="foto"/>

        </div>

        <div class="mt-4">
            <x-input-label for="pekerjaan" :value="__('pekerjaan')" />
            <x-text-input id="pekerjaan" class="block mt-1 w-full" type="text" name="pekerjaan"/>

        </div>

        <div class="mt-4">
            <x-input-label for="tentang" :value="__('tentang')" />
            <x-text-input id="tentang" class="block mt-1 w-full" type="text" name="tentang"/>

        </div>

        <div class="mt-4">
            <x-input-label for="no_telepon" :value="__('no_telepon')" />
            <x-text-input id="no_telepon" class="block mt-1 w-full" type="text" name="no_telepon"/>

        </div>

        <div class="mt-4">
            <x-input-label for="pengalaman" :value="__('pengalaman')" />
            <x-text-input id="pengalaman" class="block mt-1 w-full" type="text" name="pengalaman"/>

        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
