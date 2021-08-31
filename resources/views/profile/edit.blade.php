<x-app-layout>

    <div class="p-6 bg-white overflow-hidden shadow-sm sm:rounded-lg">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ route('profile.update') }}" method="POST">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{Auth::user()->name}}"
                    required autofocus />
            </div>

            <p class="mt-4">Change Password. Leave empty if not needed.</p>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" />
            </div>

            <x-button class="mt-4">
                {{ __('Save') }}
            </x-button>
        </form>


    </div>

</x-app-layout>