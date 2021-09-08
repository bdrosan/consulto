<x-app-layout>
    <div class="grid md:grid-cols-2 gap-4">
        <div class="w-full col-span-1">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 border-b border-gray-200">
                    <form method="POST" action="{{ route('follow-up.store') }}">
                        @csrf

                        <!-- Phone -->
                        <div class="mt-4 md:flex justify-between items-center">
                            <x-label for="phone" :value="__('Phone')" />

                            <x-input id="phone" class="w-full md:w-2/3 py-1 mt-2 md:mt-0" type="text" name="phone"
                                :value="old('phone')" required autofocus autocomplete="off" />
                        </div>

                        <div id="phone_list"></div>

                        <!-- Conversation -->
                        <div class="mt-4 md:flex justify-between items-center">
                            <x-label for="conversation" :value="__('Conversation')" />

                            <x-textarea id="conversation" class="w-full md:w-2/3 mt-2 md:mt-0" name="conversation">
                                old('conversation')</x-textarea>
                        </div>

                        <div class="mt-4 flex justify-end">
                            <a href="/follow-up"
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

    @push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        $('#phone').on('keyup', function() {
            var query = $(this).val();

            if (query.length == 0) {
                $('#phone_list').html("");
            } else {
                $.ajax({
                    url: "{{ route('lead.liveSearch') }}",
                    type: "GET",
                    data: {
                        'phone': query
                    },
                    success: function(data) {
                        $('#phone_list').html(data);
                    }
                })
                // end of ajax call
            }

        });


        $(document).on('click', 'li', function() {

            var value = $(this).text().split('->')[1].trim();
            $('#phone').val(value);
            $('#phone_list').html("");
        });
    });
    </script>

    @endpush

</x-app-layout>