<x-app-layout>
    <div class="grid grid-cols-5 gap-4">
        <div class="col-span-1">
            <x-admin-menu />
        </div>
        <div class="col-span-2">
            <x-v-table th="Name,Email" :rows="$user" />
        </div>
        <div class="col-span-2">
            <x-error />
            <x-success />
            <div class="p-2 bg-white">
                <div class="text-lg">Users Roles</div>
                <form action="{{ route('user.storeRole') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{$id}}">
                    <div class="flex my-4">
                        @foreach($roles as $role)
                        <div class="p-2 border mr-2 rounded-lg">
                            <label for="{{ $role->name }}">{{ $role->name }}</label>

                            <input id="{{ $role->name }}" type="checkbox" name="role[]" value="{{ $role->name }}" @if($userRoles->contains($role->name)) checked @endif />
                        </div>
                        @endforeach

                    </div>
                    <x-button>
                        {{__('Assign Roles')}}
                    </x-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>