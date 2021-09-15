<x-app-layout>
    <div class="mb-4">
        <a href="{{ route('follow-up.index') }}"
            class="px-5 py-2 mr-2 text-sm uppercase text-indigo-600 font-semibold tracking-widest outline-none border border-indigo-600 hover:text-white hover:bg-indigo-600 focus:border-purple-200 focus:outline-none active:border-transparent active:text-grey-900 transition-all">
            <svg class="w-5 h-5 inline-block" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
            </svg>
            Back
        </a>
        <a href="{{ route('followup.createByLead',$id) }}"
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
    <div class="md:grid md:grid-cols-5 gap-4">
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
            @else
            <div class="bg-white p-4">
                Not Found!
            </div>
            @endif
        </div>
    </div>

</x-app-layout>