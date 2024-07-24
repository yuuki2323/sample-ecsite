<x-guest-layout>
  <!-- Session Status -->
  <x-auth-session-status class="mb-4" :status="session('status')" />

  <form method="POST" action="{{ route('admin.login') }}">
      @csrf
      <!-- Email Address -->
      <div>
          <x-input-label for="email" :value="__('Admin Email')" />
          <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
          <x-input-error :messages="$errors->get('email')" class="mt-2" />
      </div>

      <!-- Password -->
      <div class="mt-4">
          <x-input-label for="password" :value="__('Admin Password')" />

          <x-text-input id="password" class="block mt-1 w-full"
                          type="password"
                          name="password"
                          required autocomplete="current-password" />

          <x-input-error :messages="$errors->get('password')" class="mt-2" />
      </div>

      <!-- Remember Me -->


      <div class="flex items-center justify-end mt-4">
          @if (Route::has('password.request'))
              
          @endif

          <x-primary-button class="ms-3">
              {{ __('Admin Log in') }}
          </x-primary-button>
      </div>
  </form>
</x-guest-layout>
