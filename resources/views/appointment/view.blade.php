<x-app-layout>
    <div class="px-4 py-2 bg-white flex gap-4">
        <a href="{{ route('appointment.index') }}"
            class="flex items-center gap-x-2 text-sm uppercase hover:text-indigo-600 font-semibold tracking-widest outline-none focus:border-purple-200 focus:outline-none active:border-transparent active:text-grey-900 transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            <div>
                Back
            </div>
        </a>
        <a href="{{route('appointment.create')}}"
            class="text-sm uppercase hover:text-indigo-600 font-semibold tracking-widest outline-none focus:border-purple-200 focus:outline-none active:border-transparent active:text-grey-900 transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-5 h-5 inline-block"
                viewBox="0 0 512 512">
                <path d="M392.533,187.733H221.867V17.067C221.867,7.641,214.226,0,204.8,0s-17.067,7.641-17.067,17.067v170.667H17.067
			C7.641,187.733,0,195.374,0,204.8s7.641,17.067,17.067,17.067h170.667v170.667c0,9.426,7.641,17.067,17.067,17.067
			s17.067-7.641,17.067-17.067V221.867h170.667c9.426,0,17.067-7.641,17.067-17.067S401.959,187.733,392.533,187.733z" />
            </svg>
            New
        </a>
        <a href="{{route('appointment.edit',$id)}}"
            class="text-sm uppercase hover:text-indigo-600 font-semibold tracking-widest outline-none focus:border-purple-200 focus:outline-none active:border-transparent active:text-grey-900 transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-5 h-5 inline-block"
                viewBox="0 0 20 20">
                <path
                    d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
            </svg>
            Edit
        </a>
    </div>
    <div class="p-4 md:grid md:grid-cols-2 gap-4">
        <div>
            @if($appointment)
            <x-v-table th="Time:date,Agenda,Conversation,Visited" :rows="$appointment" />
            @else
            <div class="bg-white p-4">
                Not Found!
            </div>
            @endif
        </div>
    </div>
</x-app-layout>