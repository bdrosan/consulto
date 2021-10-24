<x-app-layout>
    <div class="p-4 md:grid grid-cols-5 gap-4">
        <div class="col-span-1">
            <x-admin-menu />
        </div>
        <div class="mt-4 md:mt-0 col-span-4">
            <x-success />
            <x-error />
            <div class="md:grid grid-cols-2 gap-4 items-start">
                <div>
                    @if($countries->count())
                    <x-auto-table th="Country" td="name" :rows="$countries" link="country" action />
                    {{$countries->links()}}
                    @else
                    <div class="bg-white p-4">
                        No university found
                    </div>
                    @endif
                </div>
                <div class="bg-white mt-2 md:mt-0">
                    <h3 class="p-2 bg-gray-200">Add Country</h3>
                    <div class="p-6 border-b border-gray-200">

                        <form method="POST" action="{{ route('settings.storeCountry') }}">
                            @csrf

                            <!-- Name -->
                            <div class="md:flex justify-between">

                                <x-input id="name" class="w-full md:w-3/4 py-1" type="text" name="name"
                                    :value="old('name')" required autocomplete="off" placeholder="Country Name" />
                                <x-button>{{ __('Add') }}</x-button>

                            </div>

                        </form>
                    </div>
                </div>
            </div>

            <div class="md:grid grid-cols-2 gap-4 mt-4 items-start">
                <div>
                    @if($universities->count())
                    <x-auto-table th="University, Country" :rows="$universities" link="role" action />
                    {{$universities->links()}}
                    @else
                    <div class="bg-white p-4">
                        No university found
                    </div>
                    @endif
                </div>
                <div class="bg-white mt-2 md:mt-0">
                    <h3 class="p-2 bg-gray-200">Add University</h3>
                    <div class="p-6 border-b border-gray-200">

                        <form method="POST" action="{{ route('settings.storeUniversity') }}">
                            @csrf

                            <!-- Name -->
                            <div>

                                <x-input id="name" class="w-full py-1" type="text" name="name" :value="old('name')"
                                    required autocomplete="off" placeholder="University Name" />

                                <x-select id="level" name="country" class="w-full py-1 mt-2 mb-2 " required>
                                    <option value="">Choose Country</option>
                                    @foreach($countries as $country)
                                    <option value="{{$country->id}}">{{$country->name}}</option>
                                    @endforeach
                                </x-select>

                                <x-button>{{ __('Add') }}</x-button>

                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>