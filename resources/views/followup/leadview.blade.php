<x-app-layout>
    <div class="p-4 flex items-center mb-8 bg-white gap-4">
        <a href="{{ route('follow-up.index') }}" title="Back"
            class="p-2 rounded-full text-sm uppercase text-indigo-600 font-semibold tracking-widest outline-none border border-indigo-600 hover:text-white hover:bg-indigo-600 focus:border-purple-200 focus:outline-none active:border-transparent active:text-grey-900 transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
        </a>
        <a href="{{ route('follow-up.createByLead',$id) }}" title="Add Conversation"
            class="p-2 rounded-full text-sm uppercase text-indigo-600 font-semibold tracking-widest outline-none border border-indigo-600 hover:text-white hover:bg-indigo-600 focus:border-purple-200 focus:outline-none active:border-transparent active:text-grey-900 transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
        </a>
        <a href="{{ route('appointment.leadShow',$id) }}" title="Appointments"
            class="p-2 rounded-full text-sm uppercase text-indigo-600 font-semibold tracking-widest outline-none border border-indigo-600 hover:text-white hover:bg-indigo-600 focus:border-purple-200 focus:outline-none active:border-transparent active:text-grey-900 transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6 h-6" viewBox="-2 -2 20 20">
                <path
                    d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                <path
                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z" />
                <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z" />
            </svg>
        </a>

        <a href="{{ route('appointment.createByLead',$id) }}" title="Make Appointment"
            class="p-2 rounded-full text-sm uppercase text-indigo-600 font-semibold tracking-widest outline-none border border-indigo-600 hover:text-white hover:bg-indigo-600 focus:border-purple-200 focus:outline-none active:border-transparent active:text-grey-900 transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6 h-6" viewBox="-2 -2 20 20">
                <path
                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z" />
                <path
                    d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4zM8 8a.5.5 0 0 1 .5.5V10H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V11H6a.5.5 0 0 1 0-1h1.5V8.5A.5.5 0 0 1 8 8z" />
            </svg>
        </a>
        <div>Upcoming appointment: 24/09/2021 12:00 pm</div>


    </div>
    <div class="md:grid grid-cols-5 gap-4">
        <div class="col-span-3">
            @if($conversations->total()>0)
            <x-table th="Conversation, Created_at" :data="$conversations" />
            @else
            <div class="bg-white p-4">
                No conversations found
            </div>
            @endif
        </div>
        <div class="col-span-2">
            @if($lead)
            <x-v-table th="Name,Phone,Email,Country,Subject,Qualification,Result,IELTS,Address,Note" :rows="$lead" />
            <div class="py-4 flex flex-col items-center gap-4 bg-white">
                @if($lead->is_active)
                <a href="{{ route('follow-up.moveToArchive',$id) }}" title="Move to Archive"
                    class="flex items-center gap-2 p-2  text-sm uppercase text-red-400 font-semibold tracking-widest outline-none border border-red-600 hover:text-white hover:bg-red-600 focus:border-purple-200 focus:outline-none active:border-transparent active:text-grey-900 transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6 h-6" viewBox="-2 -2 20 20">
                        <path
                            d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                    </svg>
                    Move to archive
                </a>
                @else
                <a href="{{ route('follow-up.undoArchive',$id) }}" title="Retrieve from Archive"
                    class="flex items-center gap-2 p-2 rounded-full text-sm uppercase text-indigo-400 font-semibold tracking-widest outline-none border border-indigo-600 hover:text-white hover:bg-indigo-600 focus:border-purple-200 focus:outline-none active:border-transparent active:text-grey-900 transition-all">
                    <svg class="h-6 w-6" fill="currentcolor" viewBox="0 0 512 512">
                        <path d="M384.834,180.699c-0.698,0-348.733,0-348.733,0l73.326-82.187c4.755-5.33,4.289-13.505-1.041-18.26
			c-5.328-4.754-13.505-4.29-18.26,1.041l-82.582,92.56c-10.059,11.278-10.058,28.282,0.001,39.557l82.582,92.561
			c2.556,2.865,6.097,4.323,9.654,4.323c3.064,0,6.139-1.083,8.606-3.282c5.33-4.755,5.795-12.93,1.041-18.26l-73.326-82.188
			c0,0,348.034,0,348.733,0c55.858,0,101.3,45.444,101.3,101.3s-45.443,101.3-101.3,101.3h-61.58
			c-7.143,0-12.933,5.791-12.933,12.933c0,7.142,5.79,12.933,12.933,12.933h61.58c70.12,0,127.166-57.046,127.166-127.166
			C512,237.745,454.954,180.699,384.834,180.699z" />
                    </svg>
                    Retrieve from archive
                </a>
                @endif
                <form action="{{route('follow-up.transfer',$id)}}" method="post" class="md:flex">
                    @csrf
                    @method('PATCH')
                    <select name="user_id"
                        class="border border-red-400 md:border-r-0 focus:border-red-400 focus:ring-red-400">
                        <option value="">Transfer Ownership</option>
                        @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                    <button type="submit"
                        class="mt-2 md:mt-0 flex items-center gap-2 p-2 text-sm uppercase text-red-400 font-semibold tracking-widest outline-none border border-red-600 hover:text-white hover:bg-red-600 focus:border-red-200 focus:outline-none active:border-transparent active:text-grey-900 transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6 h-6" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1 11.5a.5.5 0 0 0 .5.5h11.793l-3.147 3.146a.5.5 0 0 0 .708.708l4-4a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 11H1.5a.5.5 0 0 0-.5.5zm14-7a.5.5 0 0 1-.5.5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H14.5a.5.5 0 0 1 .5.5z" />
                        </svg>
                        Transfer
                    </button>
                </form>
            </div>
            @else
            <div class="bg-white p-4">
                Not Found!
            </div>
            @endif
        </div>
    </div>

</x-app-layout>