<x-app-layout>
    <div class="p-4 grid md:grid-cols-2 gap-4">
        <div class="w-full col-span-1">
            <x-error />
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 border-b border-gray-200">
                    <form method="POST" action="{{ route('role.store') }}">
                        @csrf

                        <!-- Name -->
                        <div class="mt-4 md:flex justify-between items-center">
                            <x-label for="name" :value="__('Name')" />

                            <x-input id="name" class="w-full md:w-2/3 py-1 mt-2 md:mt-0" type="text" name="name"
                                :value="old('name')" required autofocus autocomplete="off" />
                        </div>

                        <div class="mt-4 flex justify-end">
                            <a href="/follow-up"
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