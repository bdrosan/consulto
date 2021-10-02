<x-app-layout>
    <div class="px-4 py-2 mb-4 bg-white">
        <a href="/lead" class="flex items-center gap-x-2 text-sm uppercase hover:text-indigo-600 font-semibold tracking-widest outline-none focus:border-purple-200 focus:outline-none active:border-transparent active:text-grey-900 transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            <div>
                Back
            </div>
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
                    <select name="user_id" class="py-1 mt-4 md:mt-0 border border-indigo-400 md:border-r-0 focus:border-indigo-400 focus:ring-indigo-400">
                        <option value="">Change Ownership</option>
                        @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="mt-2 md:mt-0 flex items-center gap-2 py-1 px-4 text-sm uppercase text-indigo-400 font-semibold tracking-widest outline-none border border-indigo-600 hover:text-white hover:bg-indigo-600 focus:border-indigo-200 focus:outline-none active:border-transparent active:text-grey-900 transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6 h-6" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 11.5a.5.5 0 0 0 .5.5h11.793l-3.147 3.146a.5.5 0 0 0 .708.708l4-4a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 11H1.5a.5.5 0 0 0-.5.5zm14-7a.5.5 0 0 1-.5.5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H14.5a.5.5 0 0 1 .5.5z" />
                        </svg>
                        Change
                    </button>
                </form>
                @endrole
            </div>
            <div class="mt-4">
                @if($conversations->total()>0)
                <x-auto-table th="Conversation, Date" td="conversation, created_at" :data="$conversations" />
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
                    <svg viewBox="0 0 48 48" class="w-8 h-8 mr-2" fill="currentcolor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 0h48v48h-48z" fill="none" />
                        <path d="M22 34h4v-12h-4v12zm2-30c-11.05 0-20 8.95-20 20s8.95 20 20 20 20-8.95 20-20-8.95-20-20-20zm0 36c-8.82 0-16-7.18-16-16s7.18-16 16-16 16 7.18 16 16-7.18 16-16 16zm-2-22h4v-4h-4v4z" />
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
            <x-v-table th="Name, Phone, Email, Country, Subject, Qualification, Result, IELTS, Address, Note" :rows="$lead" />
        </div>
    </div>


</x-app-layout>