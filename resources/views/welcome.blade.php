<x-guest-layout>
  <x-auth-card>
    <x-slot name="logo">
      <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
    </x-slot>
    <form method="POST" action="{{ route('acadimic') }}">
      @csrf

      <!-- Email Address -->
      <div>
        @if(Session::has('message'))
        <p class="font-medium text-red-600">{{ Session::get('message') }}</p>
        @endif
        <x-label for="acadimic" :value="__('الرقم الاكاديمي')" />

        <x-input id="acadimic" class="block mt-1 w-full" type="text" name="acadimic_id" required autocomplete="off" />
      </div>

      <x-button class="mt-3">
        {{ __('البحث') }}
      </x-button>
      <x-admin-link style="text-align: center; color:black" href="{{ route('dashboard') }}">تسجيل الدخول في الادارة
      </x-admin-link>
      </div>
    </form>
  </x-auth-card>
</x-guest-layout>
