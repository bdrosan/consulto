<x-app-layout>
    <div class="px-4 py-2 mb-4 bg-white">
        <a href="/follow-up/create" class="text-sm uppercase hover:text-indigo-600 font-semibold tracking-widest outline-none focus:border-purple-200 focus:outline-none active:border-transparent active:text-grey-900 transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-5 h-5 inline-block" viewBox="0 0 512 512">
                <path d="M392.533,187.733H221.867V17.067C221.867,7.641,214.226,0,204.8,0s-17.067,7.641-17.067,17.067v170.667H17.067
			C7.641,187.733,0,195.374,0,204.8s7.641,17.067,17.067,17.067h170.667v170.667c0,9.426,7.641,17.067,17.067,17.067
			s17.067-7.641,17.067-17.067V221.867h170.667c9.426,0,17.067-7.641,17.067-17.067S401.959,187.733,392.533,187.733z" />
            </svg>
            New
        </a>
    </div>
    <div class="p-4">
        <x-error />
        <x-success />
        <div class="md:grid grid-cols-5 gap-8">
            <div class="col-span-3">
                <div>
                    <h2 class="text-xl">Follow Ups</h2>
                    @if($conversations->total()>0)
                    <x-auto-table th="Conversation, Phone, Date" td="conversation, phone, created_at" :data="$conversations" link="follow-up" action />
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
                    <x-auto-table th="Name,Phone,Calls,Rating" :data="$active_leads" link="follow-up/lead" />
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
                    <x-auto-table th="Name,Phone" :data="$leads" link="follow-up/lead" />
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
                    <x-auto-table th="Name,Phone" :data="$dead_leads" link="follow-up/lead" />
                    @else
                    <div class="p-4 bg-white rounded">No dead lead found</div>
                    @endif

                    <div class="mt-4">
                        {{ $dead_leads->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>