<x-guest-layout>
@livewireStyles
    <x-auth-card>
        <x-slot name="logo">
           
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Nome')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            @livewire('email-validate')

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>
            
            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4" disabled id="register">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
        <script>
        window.addEventListener('email-valido', event => {
                $registerButton = document.getElementById("register");
                $registerButton.disabled=false;
            })
            window.addEventListener('email-invalido', event => {
                $registerButton = document.getElementById("register");
                $registerButton.disabled=true;
            })
</script>
        @livewireScripts
    </x-auth-card>
</x-guest-layout>
