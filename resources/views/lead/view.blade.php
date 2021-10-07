<x-app-layout>
    @if($lead->user_id === Auth::id() || Auth::user()->hasPermissionTo('access all leads'))
    <div class="p-4 mb-4 bg-white flex flex-wrap items-center gap-4">
        <a href="{{ route('lead.index') }}"
            class="flex items-center gap-x-2 text-sm uppercase hover:text-indigo-600 font-semibold tracking-widest outline-none focus:border-purple-200 focus:outline-none active:border-transparent active:text-grey-900 transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            <div>
                Back
            </div>
        </a>
        <a href="{{ route('lead.create') }}"
            class="flex items-center gap-x-2 text-sm uppercase hover:text-indigo-600 font-semibold tracking-widest outline-none focus:border-purple-200 focus:outline-none active:border-transparent active:text-grey-900 transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-5 h-5" viewBox="0 0 512 512">
                <path d="M392.533,187.733H221.867V17.067C221.867,7.641,214.226,0,204.8,0s-17.067,7.641-17.067,17.067v170.667H17.067
			C7.641,187.733,0,195.374,0,204.8s7.641,17.067,17.067,17.067h170.667v170.667c0,9.426,7.641,17.067,17.067,17.067
			s17.067-7.641,17.067-17.067V221.867h170.667c9.426,0,17.067-7.641,17.067-17.067S401.959,187.733,392.533,187.733z" />
            </svg>
            New
        </a>
        <a href="{{ route('appointment.leadShow',$id) }}"
            class="flex items-center gap-x-2 text-sm uppercase hover:text-indigo-600 font-semibold tracking-widest outline-none focus:border-purple-200 focus:outline-none active:border-transparent active:text-grey-900 transition-all">
            <svg viewBox="0 0 26 26" class="h-5 w-5" fill="currentcolor" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="m11.199 18.634c-.133 0-.26-.053-.354-.146l-2.134-2.134c-.195-.195-.195-.512 0-.707s.512-.195.707 0l1.756 1.756 3.384-3.866c.182-.208.498-.229.705-.047.208.182.229.498.047.706l-3.735 4.269c-.091.104-.221.166-.359.17-.006-.001-.011-.001-.017-.001z" />
                <path
                    d="m21.5 24h-19c-1.379 0-2.5-1.122-2.5-2.5v-17c0-1.378 1.121-2.5 2.5-2.5h19c1.379 0 2.5 1.122 2.5 2.5v17c0 1.378-1.121 2.5-2.5 2.5zm-19-21c-.827 0-1.5.673-1.5 1.5v17c0 .827.673 1.5 1.5 1.5h19c.827 0 1.5-.673 1.5-1.5v-17c0-.827-.673-1.5-1.5-1.5z" />
                <path d="m23.5 8h-23c-.276 0-.5-.224-.5-.5s.224-.5.5-.5h23c.276 0 .5.224.5.5s-.224.5-.5.5z" />
                <path d="m5.5 5c-.276 0-.5-.224-.5-.5v-4c0-.276.224-.5.5-.5s.5.224.5.5v4c0 .276-.224.5-.5.5z" />
                <path d="m18.5 5c-.276 0-.5-.224-.5-.5v-4c0-.276.224-.5.5-.5s.5.224.5.5v4c0 .276-.224.5-.5.5z" />
            </svg>
            <div>
                Appointments
            </div>
        </a>

        <a href="{{ route('appointment.createByLead',$id) }}"
            class="flex items-center gap-x-2 text-sm uppercase hover:text-indigo-600 font-semibold tracking-widest outline-none focus:border-purple-200 focus:outline-none active:border-transparent active:text-grey-900 transition-all">

            <svg class="w-5 h-5" viewBox="0 0 17 17" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                class="bi bi-calendar-plus">
                <path
                    d="M8 7a.5.5 0 0 1 .5.5V9H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V10H6a.5.5 0 0 1 0-1h1.5V7.5A.5.5 0 0 1 8 7z" />
                <path
                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
            </svg>
            <div>
                New Appointment
            </div>
        </a>
        <a href="{{ route('file-open.createByLead',$id) }}"
            class="flex items-center gap-x-2 text-sm uppercase hover:text-indigo-600 font-semibold tracking-widest outline-none focus:border-purple-200 focus:outline-none active:border-transparent active:text-grey-900 transition-all">
            <svg height="20" viewBox="0 -8 394 394" width="20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="m292.476562 48.902344h-79.675781c-1.015625-.003906-1.984375-.429688-2.667969-1.179688l-28.914062-31.628906c-9.378906-10.242188-22.621094-16.078125-36.507812-16.09375h-95.253907c-27.300781.03125-49.425781 22.15625-49.457031 49.457031v278.214844c.03125 27.300781 22.15625 49.425781 49.457031 49.457031h295.085938c27.300781-.03125 49.425781-22.15625 49.457031-49.457031v-178.214844c-.03125-27.300781-22.15625-49.425781-49.457031-49.457031h-2.609375v-1.640625c-.03125-27.300781-22.15625-49.425781-49.457032-49.457031zm-238.550781 314.226562h-4.46875c-19.574219-.023437-35.433593-15.886718-35.457031-35.457031v-278.214844c.023438-19.574219 15.882812-35.433593 35.457031-35.457031h95.253907c9.953124.011719 19.449218 4.195312 26.171874 11.535156l28.910157 31.636719c3.339843 3.644531 8.054687 5.722656 13 5.730469h79.679687c19.574219.023437 35.433594 15.882812 35.457032 35.457031v1.640625h-189.085938c-27.300781.03125-49.425781 22.15625-49.457031 49.460938v178.210937c-.023438 19.570313-15.886719 35.433594-35.460938 35.457031zm290.617188-249.128906c19.574219.023438 35.433593 15.882812 35.457031 35.457031v178.214844c-.023438 19.570313-15.882812 35.433594-35.457031 35.457031h-256.167969c9.601562-9.296875 15.015625-22.09375 15.011719-35.457031v-178.214844c.019531-19.574219 15.882812-35.433593 35.457031-35.457031zm0 0" />
                <path
                    d="m191.691406 245.570312h43v43c0 3.867188 3.136719 7 7 7 3.867188 0 7-3.132812 7-7v-43h43c3.867188 0 7-3.132812 7-7 0-3.867187-3.132812-7-7-7h-43v-43c0-3.867187-3.132812-7-7-7-3.863281 0-7 3.132813-7 7v43h-43c-3.863281 0-7 3.132813-7 7 0 3.867188 3.136719 7 7 7zm0 0" />
            </svg>
            <div>File Open</div>
        </a>
    </div>

    <div class="p-4 md:grid grid-cols-5 gap-4">
        <div class="col-span-3">
            @if($user)
            @can('access all leads')
            <div class="p-4 mb-4 bg-white md:flex justify-between items-center gap-4">
                Assigned to {{$user->name}}
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

            </div>
            @endcan
            @if($time)
            <div class="p-4 mb-4 bg-yellow-100 shadow">Upcoming appointment: {{$time}}</div>
            @endif

            <div class="mb-4">
                <div class="text-lg">Visit History</div>
                @if($visits->count())
                <x-auto-table th="Time, Conversation" :rows="$visits" />
                @else
                <div class="bg-white p-4">
                    No visit history found
                </div>
                @endif
            </div>

            <div class="text-lg">Follow up history</div>
            @if($conversations->count())
            <x-auto-table th="Conversation, Created_at" :rows="$conversations" />
            @else
            <div class="bg-white p-4">
                No follow up found
            </div>
            @endif
            @else
            <x-error />
            <x-success />
            <div class="p-4 bg-white md:flex justify-between items-center">
                <div class="text-red-800 text-lg md:mr-2 flex items-center">
                    <svg viewBox="0 0 48 48" class="w-8 h-8 mr-2" fill="currentcolor"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 0h48v48h-48z" fill="none" />
                        <path
                            d="M22 34h4v-12h-4v12zm2-30c-11.05 0-20 8.95-20 20s8.95 20 20 20 20-8.95 20-20-8.95-20-20-20zm0 36c-8.82 0-16-7.18-16-16s7.18-16 16-16 16 7.18 16 16-7.18 16-16 16zm-2-22h4v-4h-4v4z" />
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
                @can('access own leads')
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
                @endcan
            </div>
        </div>
    </div>
    @else
    <div class="px-4 py-2 mb-4 bg-white">
        <a href="{{ route('lead.index') }}"
            class="flex items-center gap-x-2 text-sm uppercase hover:text-indigo-600 font-semibold tracking-widest outline-none focus:border-purple-200 focus:outline-none active:border-transparent active:text-grey-900 transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            <div>
                Back
            </div>
        </a>
    </div>
    <div class="p-4 text-lg text-red-600 bg-white">
        You do not have enough permission to access this page
    </div>
    @endif
</x-app-layout>