<x-app-layout>
    <div class="p-4 md:grid grid-cols-5 gap-4">
        <div class="col-span-1">
            <x-admin-menu />
        </div>
        <div class="mt-4 md:mt-0 col-span-4">
            <x-error />
            <h3 class="p-2 bg-gray-200">Edit Permission</h3>
            <div class="p-6 bg-white">

                <form method="POST" action="{{ route('permission.update', $id) }}">
                    @method('PUT')
                    @csrf

                    <!-- Name -->
                    <div class="md:flex justify-between">

                        <x-input id="name" class="w-full md:w-3/4 py-1 mb-2 md:mb-0" type="text" name="name"
                            :value="$permission->name" required autocomplete="off" placeholder="Permission Name" />

                        <x-button>{{ __('Update') }}</x-button>

                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>