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

                        <!-- Rating -->
                        <div class="mt-4 md:flex justify-between items-center">
                            <x-label for="rating" :value="__('Prospective Rating')" />

                            <select id="rating" name="rating" required
                                class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full md:w-2/3 py-1 mt-2 md:mt-0">
                                <option value="">Give a Rating</option>
                                <option value="9" {{$conversation->rating == 9 ? 'selected' : ''}}>9 - Very
                                    Prosfective</option>
                                <option value="8" {{$conversation->rating == 8 ? 'selected' : ''}}>8</option>
                                <option value="7" {{$conversation->rating == 7 ? 'selected' : ''}}>7</option>
                                <option value="6" {{$conversation->rating == 6 ? 'selected' : ''}}>6</option>
                                <option value="5" {{$conversation->rating == 5 ? 'selected' : ''}}>5</option>
                                <option value="4" {{$conversation->rating == 4 ? 'selected' : ''}}>4</option>
                                <option value="3" {{$conversation->rating == 3 ? 'selected' : ''}}>3</option>
                                <option value="2" {{$conversation->rating == 2 ? 'selected' : ''}}>2</option>
                                <option value="1" {{$conversation->rating == 1 ? 'selected' : ''}}>1 - Not Interested
                                </option>
                            </select>
                        </div>

                        <!-- Next call -->
                        <div class="mt-4 md:flex justify-between items-center">
                            <x-label for="next_call" :value="__('Schedule next call')" />

                            <x-input id="next_call" class="w-full md:w-2/3 py-1 mt-2 md:mt-0" type="datetime-local"
                                name="next_call" :value='date("Y-m-d\TH:i", strtotime($conversation->next_call))' />
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