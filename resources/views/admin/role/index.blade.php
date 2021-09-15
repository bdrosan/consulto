<x-app-layout>
    <div class="grid grid-cols-5 gap-4">
        <div class="col-span-1 bg-white flex flex-col">
            <x-admin-menu />
        </div>
        <div class="col-span-4">
            @if($roles->total()>0)
            <x-table th="Name" :data="$roles" link="role" action />
            @else
            <div class="bg-white p-4">
                No user found
            </div>
            @endif
        </div>
    </div>
</x-app-layout>