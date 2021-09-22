<x-app-layout>
    <div class="mb-8">
        <a href="/follow-up/create"
            class="px-5 py-2 text-sm uppercase text-indigo-600 font-semibold tracking-widest outline-none border border-indigo-600 hover:text-white hover:bg-indigo-600 focus:border-purple-200 focus:outline-none active:border-transparent active:text-grey-900 transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-5 h-5 inline-block"
                viewBox="0 0 20 20">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                <path
                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
            </svg>
            Add Conversation
        </a>
    </div>
    <x-error />
    <x-success />
    <div class="md:grid grid-cols-5 gap-8">
        <div class="col-span-3">
            <div>
                <h2 class="text-xl">Follow Ups</h2>
                @if($conversations->total()>0)
                <x-table th="Conversation, Phone, Date" td="conversation, phone, created_at" :data="$conversations"
                    link="follow-up" action />
                @else
                <div class="bg-white p-4">
                    No follow up found
                </div>
                @endif

                <div class="mt-4">
                    {{ $conversations->links() }}
                </div>
            </div>
            <div class="mt-8">
                <h2 class="text-xl">Active Lead</h2>
                @if($active_leads->total()>0)
                <x-table th="Name,Phone,Calls,Rating" :data="$active_leads" link="follow-up/lead" />
                @else
                <div class="p-4 bg-white rounded">No active lead found</div>
                @endif

                <div class="mt-4">
                    {{ $active_leads->links() }}
                </div>
            </div>
        </div>

        <div class="col-span-2">
            <div>
                <h2 class="text-xl">Unfollowed Lead</h2>
                @if($leads->total()>0)
                <x-table th="Name,Phone" :data="$leads" link="follow-up/lead" />
                @else
                <div class="p-4 bg-white rounded">Great! you followed up all</div>
                @endif

                <div class="mt-4">
                    {{ $leads->links() }}
                </div>
            </div>
            <div class="mt-4">
                <h2 class="text-xl">Dead Lead</h2>
                @if($dead_leads->total()>0)
                <x-table th="Name,Phone" :data="$dead_leads" link="follow-up/lead" />
                @else
                <div class="p-4 bg-white rounded">No dead lead found</div>
                @endif

                <div class="mt-4">
                    {{ $dead_leads->links() }}
                </div>
            </div>
        </div>
    </div>

</x-app-layout>