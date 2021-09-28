<x-app-layout>
    <div class="px-4 py-2 bg-white">
        <div>
            Set new appointment for {{$lead->name}}
        </div>
    </div>
    <x-error />
    <div class="p-4">
        <div class="grid md:grid-cols-2 gap-4">
            <div class="w-full">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 border-b border-gray-200">
                        <form method="POST" action="{{ route('appointment.store') }}">
                            @csrf
                            <input type="hidden" name="lead_id" value="{{$lead->id}}">
                            <!-- Date -->
                            <div class="md:flex justify-between items-center">
                                <x-label for="time" :value="__('Select Date Time')" />

                                <x-input id="time" class="w-full md:w-2/3 py-1 mt-2 md:mt-0" type="datetime-local"
                                    name="time" :value="old('time')" required autofocus />
                            </div>

                            <!-- agenda -->
                            <div class="mt-4 md:flex justify-between items-center">
                                <x-label for="agenda" :value="__('Agenda')" />

                                <x-textarea id="agenda" class="w-full md:w-2/3 mt-2 md:mt-0" name="agenda"
                                    placeholder="Notes (optional)">
                                    {{old('agenda')}}
                                </x-textarea>
                            </div>

                            <div class="mt-4 flex justify-end">
                                <a href="{{ route('follow-up.leadShow', $lead) }}"
                                    class="'inline-flex items-center px-4 py-2 mr-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-gray-300 active:bg-gray-300 focus:outline-none focus:border-gray-300 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150'">
                                    {{ __('Cancel') }}
                                </a>
                                <x-button>
                                    {{ __('Create') }}
                                </x-button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

</x-app-layout>