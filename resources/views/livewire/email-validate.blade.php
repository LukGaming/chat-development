<div>
    <!-- Email Address -->
    <div class="mt-4" wire:keydown.debounce.100ms="validaEmail">
                <x-label for="email" :value="__('Email')" />
                <x-input id="email" class="block mt-1 w-full" type="email" wire:model="email" name="email" :value="old('email')" required />
            </div>
            <div>
        @if (session()->has('message'))
            <div class="alert alert-success" style="color: red;">
                {{ session('message') }}
            </div>
        @endif
    </div>
</div>