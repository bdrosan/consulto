<x-app-layout>
    <div class="p-4 md:grid grid-cols-5 gap-4">
        <div class="col-span-1">
            <x-admin-menu />
        </div>
        <div class="mt-4 md:mt-0 col-span-2">
            <x-error />
            <h3 class="p-2 bg-gray-200">Edit Role</h3>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 border-b border-gray-200">
                    <form method="POST" action="{{ route('role.update', $id) }}">
                        @method('PATCH')
                        @csrf

                        <!-- Name -->
                        <div class="mt-4 md:flex justify-between items-center">
                            <x-label for="name" :value="__('Name')" />

                            <x-input id="name" class="w-full md:w-2/3 py-1 mt-2 md:mt-0" type="text" name="name"
                                :value="$role->name" required autofocus autocomplete="off" />
                        </div>

                        <div class="mt-4 flex justify-end">
                            <a href="{{ route('role.index') }}"
                                class="'inline-flex items-center px-4 py-2 mr-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-gray-300 active:bg-gray-300 focus:outline-none focus:border-gray-300 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150'">
                                {{ __('Cancel') }}
                            </a>
                            <x-button>
                                {{ __('Save') }}
                            </x-button>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>