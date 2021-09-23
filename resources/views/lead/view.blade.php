<x-app-layout>

    <div class="mb-4">
        <a href="/lead"
            class="px-5 py-2 text-sm uppercase text-indigo-600 font-semibold tracking-widest outline-none border border-indigo-600 hover:text-white hover:bg-indigo-600 focus:border-purple-200 focus:outline-none active:border-transparent active:text-grey-900 transition-all">
            <svg class="w-5 h-5 inline-block" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
            </svg>
            Back
        </a>
    </div>

    <div class="md:grid grid-cols-5 gap-4">
        <div class="col-span-3">
            @if($user)
            <div class="p-4 bg-white md:flex justify-between items-center gap-4">
                Assigned to {{$user->name}}
                @role('admin|super admin')
                <form action="{{route('lead.transfer',$id)}}" method="post" class="md:flex">
                    @csrf
                    @method('PATCH')
                    <select name="user_id"
                        class="py-1 mt-4 md:mt-0 border border-indigo-400 md:border-r-0 focus:border-indigo-400 focus:ring-indigo-400">
                        <option value="">Change Ownership</option>
                        @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                    <button type="submit"
                        class="mt-2 md:mt-0 flex items-center gap-2 py-1 px-4 text-sm uppercase text-indigo-400 font-semibold tracking-widest outline-none border border-indigo-600 hover:text-white hover:bg-indigo-600 focus:border-indigo-200 focus:outline-none active:border-transparent active:text-grey-900 transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6 h-6" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1 11.5a.5.5 0 0 0 .5.5h11.793l-3.147 3.146a.5.5 0 0 0 .708.708l4-4a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 11H1.5a.5.5 0 0 0-.5.5zm14-7a.5.5 0 0 1-.5.5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H14.5a.5.5 0 0 1 .5.5z" />
                        </svg>
                        Change
                    </button>
                </form>
                @endrole
            </div>
            <div class="mt-4">
                @if($conversations->total()>0)
                <x-table th="Conversation, Date" td="conversation, created_at" :data="$conversations" />
                @else
                <div class="bg-white p-4">
                    No conversations found
                </div>
                @endif
            </div>
            @else
            <x-error />
            <x-success />
            <div class="p-4 bg-white md:flex justify-between items-center">
                <div class="text-red-800 text-lg md:mr-2 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Not assigned to anyone
                </div>
                <div class="mt-2 md:mt-0">
                    <form action="{{route('lead.userUpdate',$id)}}" method="post">
                        @csrf
                        @method('PATCH')
                        <select name="user_id" required>
                            <option value="">Assign Now</option>
                            @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                        <x-button class="py-3">Assign</x-button>
                    </form>
                </div>
            </div>
            @endif
        </div>
        <div class="col-span-2 mt-4 md:mt-0">
            <x-v-table th="Name, Phone, Email, Country, Subject, Qualification, Result, IELTS, Address, Note"
                :rows="$lead" />
        </div>
    </div>


</x-app-layout>