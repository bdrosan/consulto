<x-app-layout>
    <div class="px-4 py-2 mb-4 bg-white">
        <a href="/lead/create"
            class="text-sm uppercase hover:text-indigo-600 font-semibold tracking-widest outline-none focus:border-purple-200 focus:outline-none active:border-transparent active:text-grey-900 transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-5 h-5 inline-block"
                viewBox="0 0 512 512">
                <path d="M392.533,187.733H221.867V17.067C221.867,7.641,214.226,0,204.8,0s-17.067,7.641-17.067,17.067v170.667H17.067
			C7.641,187.733,0,195.374,0,204.8s7.641,17.067,17.067,17.067h170.667v170.667c0,9.426,7.641,17.067,17.067,17.067
			s17.067-7.641,17.067-17.067V221.867h170.667c9.426,0,17.067-7.641,17.067-17.067S401.959,187.733,392.533,187.733z" />
            </svg>
            New
        </a>
    </div>

    <div class="p-4">
        <x-success />
        <x-error />
        @if(Auth::user()->hasPermissionTo('access all leads'))
        <div class="w-full md:grid grid-cols-4 gap-4">
            <div class="col-span-3">
                <form action="{{ route('lead.bulkAction') }}" method="post">
                    @csrf
                    <div class="md:flex justify-between">
                        <div id="bulkAction">
                            <select class="py-1 mb-2" id="selectAction" name="action" onchange="assign()" required>
                                <option value="">Bulk Actions</option>
                                <option value="assign">Assign To</option>
                                <option value="delete">Delete</option>
                            </select>
                            <select class="py-1 mb-2" id="counselor" name="counselor">
                                <option value="">Select Counselor</option>
                                @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                            <x-button>Apply</x-button>
                        </div>
                        <div class="mb-2">
                            <div class="flex">
                                <input type="text" name="q" id="search" form="search-form"
                                    placeholder="Search by name or phone" value="{{ $q ?? '' }}"
                                    class="w-72 py-1 px-4 bg-white border-gray-300 border-r-0 focus:border-gray-300 focus:ring-gray-200 focus:ring-opacity-50">
                                <button type="submit" form="search-form"
                                    class="px-4 bg-white border border-gray-300 border-l-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-search" viewBox="0 0 16 16">
                                        <path
                                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    @if($leads->count())

                    <x-auto-table th="Name,Phone,Country, Assigned To, Date Added"
                        td="name,phone,country,assign_to,created_at" :rows="$leads" link="lead" action checkbox />
                    @else
                    <div class="p-4 bg-white rounded">No Leads Available</div>
                    @endif
                </form>
                <form id="search-form" action="{{route('lead.search')}}"></form>
                <div class="mt-4">
                    {{ $leads->links() }}
                </div>
            </div>
            <div class="col-span-1 mt-4 md:mt-0">
                <div class="p-3 bg-gray-200">Lead Count</div>
                <div class="p-4 flex flex-col gap-2 bg-white">
                    <div class="text-red-600">
                        <a href="{{ route('lead.unassigned') }}">Unassigned - {{$unassigned}}</a>
                    </div>
                    <div class="text-yellow-600">
                        <a href="{{ route('lead.unfollowed') }}">Unfollowed - {{$unfollowed}}</a>
                    </div>
                    <div class="text-green-600">
                        <a href="{{ route('lead.followed') }}">Followed - {{$followed}}</a>
                    </div>
                </div>

                <div class="p-3 mt-4 bg-gray-200">Assigned Lead Count</div>
                <div class="p-4 flex flex-col gap-2 overflow-y-auto max-h-72 bg-white">
                    @foreach($count as $c)
                    <div>
                        <a href="{{ route('lead.userlead', $c->id) }}">{{$c->name}} - {{$c->count}}</a>
                    </div>
                    @endforeach
                </div>


            </div>
        </div>
        @else
        <div class="w-full">
            <form action="{{ route('lead.bulkAction') }}" method="post">
                @csrf
                <div class="mb-2">
                    <div class="flex">
                        <input type="text" name="q" id="search" form="search-form" placeholder="Search by name or phone"
                            value="{{ $q ?? '' }}"
                            class="w-72 py-1 px-4 bg-white border-gray-300 border-r-0 focus:border-gray-300 focus:ring-gray-200 focus:ring-opacity-50">
                        <button type="submit" form="search-form"
                            class="px-4 bg-white border border-gray-300 border-l-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-search" viewBox="0 0 16 16">
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                            </svg>
                        </button>
                    </div>
                </div>
                @if($leads->count())
                <x-auto-table th="Name,Phone,Country,Date Added" td="name,phone,country,created_at" :rows="$leads"
                    link="lead" />
                @else
                <div class="p-4 bg-white rounded">No Leads Available</div>
                @endif
            </form>
            <form id="search-form" action="{{route('lead.search')}}"></form>
            <div class="mt-4">
                {{ $leads->links() }}
            </div>
        </div>
        @endif

    </div>

    @push('scripts')
    <script>
    if (document.getElementById("counselor")) {

        var counselor = document.getElementById("counselor");
        counselor.style.display = "none";

        function assign() {
            var value = document.getElementById("selectAction").value;
            if (value == 'assign') {
                counselor.style.display = "inline";
                counselor.setAttribute("required", "");
            } else {
                counselor.style.display = "none";
                counselor.removeAttribute("required", "");
            }

        }

    }
    </script>
    @endpush
</x-app-layout>