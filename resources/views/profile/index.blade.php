<x-app-layout>

    @if (session('status'))
    <div class="p-4 mb-4 bg-green-300 shadow-sm rounded-md">
        {{ session('status') }}
    </div>
    @endif
    <div class="p-6 bg-white overflow-hidden shadow-sm sm:rounded-lg">

        <img src="{{ Avatar::create(Auth::user()->name)->toBase64() }}" />
        <div>{{Auth::user()->name}}</div>
        <div>{{Auth::user()->email}}</div>
        <div>{{__('Member Since ').Auth::user()->created_at}}</div>
        <div class="mt-2">
            <a href="/profile/edit"
                class="px-4 py-2 bg-gray-800 text-gray-300 rounded-md outline-none hover:text-white">Edit
                Profile</a>
        </div>

    </div>

</x-app-layout>