<x-app-layout>
    <div class="grid md:grid-cols-2 gap-4">
        <div class="w-full col-span-1">
            <x-error />
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 border-b border-gray-200">
                    <form method="POST" action="{{ route('follow-up.update', $id) }}">
                        @method('PATCH')
                        @csrf

                        <input type="hidden" name="id" value="{{$id}}">

                        <!-- Conversation -->
                        <div class="mt-4 md:flex justify-between items-center">
                            <x-label for="conversation" :value="__('Conversation')" />

                            <x-textarea id="conversation" class="w-full md:w-2/3 mt-2 md:mt-0" name="conversation">
                                {{$conversation['conversation']}}
                            </x-textarea>
                        </div>

                        <div class="mt-4 flex justify-end">
                            <a href="{{route('follow-up.index')}}"
                                class="'inline-flex items-center px-4 py-2 mr-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-gray-300 active:bg-gray-300 focus:outline-none focus:border-gray-300 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150'">
                                {{ __('Cancel') }}
                            </a>
                            <x-button>
                                {{ __('Save') }}
                            </x-button>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>