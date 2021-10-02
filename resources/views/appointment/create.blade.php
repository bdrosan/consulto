<x-app-layout>
    <div class="px-4 py-2 bg-white">
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
    </div>
    <x-error />
    <div class="p-4">
        <div class="grid md:grid-cols-2 gap-4">
            <div class="w-full">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 border-b border-gray-200">
                        <form method="POST" action="{{ route('appointment.store') }}">
                            @csrf
                            <!-- Lead id -->
                            <div class="md:flex justify-between items-center">
                                <x-label for="lead_id" :value="__('Lead')" />

                                <x-select name="lead_id" id="lead_id" class="w-full md:w-2/3 py-1 mt-2 md:mt-0"
                                    required>
                                    <option value=""></option>
                                    @foreach($leads as $lead)
                                    <option value="{{ $lead->id }}">{{ $lead->name }}</option>
                                    @endforeach
                                </x-select>
                            </div>

                            <!-- Date -->
                            <div class="mt-4 md:flex justify-between items-center">
                                <x-label for="time" :value="__('Select Date Time')" />

                                <x-input id="time" class="w-full md:w-2/3 py-1 mt-2 md:mt-0" type="datetime-local"
                                    name="time" :value="old('time')" required />
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
                                <a href="{{ route('appointment.index') }}"
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
    @push('scripts')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
        integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#lead_id').select2();
    });
    </script>
    @endpush
</x-app-layout>