<div>
    <div>
        <x-input-label for="name" :value="__('Name')" />
        <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name"
            :value="old('name')" required autofocus autocomplete="name" />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>
    <div class="mt-4">
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email"
            :value="old('email')" required autocomplete="username" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>
    <div class="mt-4">
        <x-input-label for="name" :value="__('Contact')" />
        <x-text-input wire:model="contact" class="block mt-1 w-full" type="number" required autofocus />
        <x-input-error :messages="$errors->get('contact')" class="mt-2" />
    </div>
    <div class="mt-4">
        <x-input-label for="name" :value="__('Address')" />
        <x-text-input wire:model="address" class="block mt-1 w-full" type="text" required autofocus />
        <x-input-error :messages="$errors->get('address')" class="mt-2" />
    </div>
    <!-- Password -->
    <div class="mt-4">
        <x-input-label for="password" :value="__('Password')" />

        <x-text-input id="password" wire:model="password" class="block mt-1 w-full" type="password" name="password"
            required autocomplete="new-password" />

        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Confirm Password -->
    <div class="mt-4">
        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

        <x-text-input id="password_confirmation" wire:model="password_confirmation" class="block mt-1 w-full"
            type="password" name="password_confirmation" required autocomplete="new-password" />

        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
    </div>

    <div class="flex items-center justify-end mt-4">
        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
            href="{{ route('login') }}">
            {{ __('Already registered?') }}
        </a>

        <x-button label="REGISTER" dark class="ml-4 font-bold" wire:click="registerUser" spinner="registerUser"
            right-icon="arrow-right" />
    </div>
    <div class="mt-5 text-sm text-center">
        <span>Already have an Account? <a href="{{ route('login') }}"
                class="text-main font-medium hover:underline hover:text-green-600">Sign In
                here</a></span>
    </div>
</div>
