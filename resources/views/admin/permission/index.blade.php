<x-app-layout>
    <div class="p-4 md:grid grid-cols-5 gap-4">
        <div class="col-span-1">
            <x-admin-menu />
        </div>
        <div class="mt-4 md:mt-0 col-span-2">
            <x-success />
            @if($permissions->count())
            <x-auto-table th="Name" :rows="$permissions" link="permission" action />
            @else
            <div class="bg-white p-4">
                No permission found
            </div>
            @endif
        </div>
        <div class="mt-4 md:mt-0 col-span-2">
            <x-error />
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h3 class="p-2 bg-gray-200">Create Permission</h3>
                <div class="p-6 border-b border-gray-200">

                    <form method="POST" action="{{ route('permission.store') }}">
                        @csrf

                        <!-- Name -->
                        <div class="md:flex justify-between">

                            <x-input id="name" class="w-full md:w-3/4 py-1 mb-2 md:mb-0" type="text" name="name"
                                :value="old('name')" required autocomplete="off" placeholder="Permission Name" />
                            <x-button>{{ __('Create') }}</x-button>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>