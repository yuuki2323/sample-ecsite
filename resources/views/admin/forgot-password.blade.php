<x-guest-layout>
  <form method="POST" action="{{ route('admin.password.email') }}">
      @csrf

      <!-- Email Address -->
      <div>
          <x-input-label for="email" :value="__('Email')" />
          <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
          <x-input-error :messages="$errors->get('email')" class="mt-2" />
      </div>

      <div class="flex items-center justify-end mt-4">
          <x-primary-button>
              {{ __('Email Password Reset Link') }}
          </x-primary-button>
      </div>
  </form>
</x-guest-layout>
