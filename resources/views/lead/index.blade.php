<x-app-layout>
    <div class="mb-5">
        <a href="/lead/create"
            class="px-5 py-2 text-sm uppercase text-indigo-600 font-semibold outline-none border border-indigo-600 hover:text-white hover:bg-indigo-600 focus:border-purple-200 focus:outline-none active:border-transparent active:text-grey-900 transition-all">New</a>
    </div>
    <div class="overflow-x-auto">
        <div class="w-full">
            @if($leads->total()>0)
            <x-table th="Name,Phone,Email,Address" td="name,phone,email,address" :data="$leads" />
            @else
            <div class="p-4 bg-white rounded">No Leads Available</div>
            @endif
        </div>
    </div>
    <div class="mt-4">
        {{ $leads->links() }}
    </div>

</x-app-layout>