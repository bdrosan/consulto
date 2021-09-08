<x-app-layout>
    <div class="mb-5">
        <a href="/lead/create"
            class="px-5 py-2 text-sm uppercase text-indigo-600 font-semibold tracking-widest outline-none border border-indigo-600 hover:text-white hover:bg-indigo-600 focus:border-purple-200 focus:outline-none active:border-transparent active:text-grey-900 transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-5 h-5 inline-block"
                viewBox="0 0 20 20">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                <path
                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
            </svg>
            New
        </a>
    </div>
    <div class="overflow-x-auto">
        <div class="w-full">
            @if($leads->total()>0)
            <x-table th="Name,Phone,Country,Subject,Qualification,Result,IELTS" :data="$leads" link="lead" />
            @else
            <div class="p-4 bg-white rounded">No Leads Available</div>
            @endif
        </div>
    </div>
    <div class="mt-4">
        {{ $leads->links() }}
    </div>

</x-app-layout>