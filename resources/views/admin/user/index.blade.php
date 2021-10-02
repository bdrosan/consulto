<x-app-layout>
    <div class="md:grid grid-cols-5 gap-4">
        <div class="col-span-1">
            <x-admin-menu />
        </div>
        <div class="mt-4 md:mt-0 col-span-4 md:col-span-2">
            <x-success />
            @if($users->total()>0)
            <x-auto-table th="Name, Email" :data="$users" link="user" action />
            @else
            <div class="bg-white p-4">
                No user found
            </div>
            @endif
        </div>
        <div class="mt-4 md:mt-0 col-span-5 md:col-span-2">
            <x-error />
            <div class="py-2 px-4 bg-gray-200">
                Create User
            </div>
            <div class="p-4 bg-white">
                <form method="POST" action="{{ route('user.store') }}">
                    @csrf

                    <!-- Name -->
                    <x-input class="block w-full py-1" type="text" name="name" :value="old('name')" placeholder="Name" required />

                    <!-- Email Address -->
                    <x-input class="block mt-2 w-full py-1" type="email" name="email" :value="old('email')" placeholder="Email" required />

                    <!-- Password -->
                    <x-input id="password" class="block mt-2 w-full py-1" type="password" name="password" placeholder="Password" required />

                    <!-- Confirm Password -->
                    <x-input id="password_confirmation" class="block mt-2 w-full py-1" type="password" name="password_confirmation" placeholder="Confirm Password" required />

                    <div class="flex items-center justify-end mt-2">
                        <x-button>
                            {{ __('Add User') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>