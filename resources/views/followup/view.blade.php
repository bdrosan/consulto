<x-app-layout>
    <div class="px-4 py-2 mb-4 bg-white">
        <a href="{{ route('follow-up.index') }}"
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
    <div class="md:grid md:grid-cols-2 gap-4">
        <div>
            @if($conversation)
            <x-v-table th="Conversation, Phone, Created_at" :rows="$conversation" />
            @else
            <div class="bg-white p-4">
                Not Found!
            </div>
            @endif
        </div>
    </div>

</x-app-layout>