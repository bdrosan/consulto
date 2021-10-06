<x-app-layout>
    <div class="p-4 md:grid grid-cols-5 gap-4">
        <div class="col-span-1">
            <x-admin-menu />
        </div>
        <div class="mt-4 md:mt-0 col-span-4">
            <div class="p-4 bg-white">
                <h4 class="text-lg">Permissions for "{{$role->name}}"</h4>
                <hr>
                <form action="{{ route('role.storePermission') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{$id}}">
                    <div class="flex flex-wrap mt-4">

                        @foreach($permissions as $permission)
                        <div class="p-2 border mr-4 mb-4 rounded-lg">
                            <label for="{{ str_replace(' ', '_', $permission) }}">{{ $permission }}</label>

                            <input id="{{ str_replace(' ', '_', $permission) }}" type="checkbox" name="permission[]"
                                value="{{ $permission }}" @if($rolePermissions->contains($permission)) checked @endif />
                        </div>
                        @endforeach

                    </div>
                    <x-button>
                        {{__('Grant Permissions')}}
                    </x-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>