<x-app-layout>
    <div class="grid grid-cols-5 gap-4">
        <div class="col-span-1 bg-white flex flex-col">
            <x-admin-menu />
        </div>
        <div class="col-span-4">
            <div class="p-4 bg-white">
                <h4 class="text-lg">Permissions for "{{$role->name}}"</h4>
                <hr>
                @foreach($permissions as $permission)
                <div>{{$permission->name}}</div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>