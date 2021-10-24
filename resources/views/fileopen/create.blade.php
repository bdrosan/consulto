<x-app-layout>
    <div class="px-4 py-2 mb-4 bg-white">
        <a href="{{ route('file-open.index') }}" class="flex items-center gap-x-2 text-sm uppercase hover:text-indigo-600 font-semibold tracking-widest outline-none focus:border-purple-200 focus:outline-none active:border-transparent active:text-grey-900 transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            <div>
                Back
            </div>
        </a>
    </div>
    <div class="p-4">
        <x-error />
        <div class="grid md:grid-cols-2 gap-4">
            <div class="w-full col-span-1">
                <div class="bg-white overflow-hidden">
                    <div class="p-6 border-b border-gray-200">
                        <form method="POST" action="{{ route('file-open.store') }}">
                            @csrf

                            <!-- Lead -->
                            <div class="md:flex justify-between items-center">
                                <x-label for="lead" :value="__('Select Lead')" />

                                <x-select id="lead" name="lead" class="w-full md:w-2/3 py-1 mt-2 md:mt-0" required>
                                    <option value=""></option>
                                    @foreach($leads as $lead)
                                    <option value="{{$lead->id}}">{{$lead->name}}</option>
                                    @endforeach
                                </x-select>
                            </div>

                            <!-- Name -->
                            <div class="mt-4 md:flex justify-between items-center">
                                <x-label for="name" :value="__('Name (as in Passport)')" />

                                <x-input id="name" class="w-full md:w-2/3 py-1 mt-2 md:mt-0" type="text" name="name" :value="old('name')" placeholder="Required" required />
                            </div>

                            <!-- Passport -->
                            <div class="mt-4 md:flex justify-between items-center">
                                <x-label for="passport" :value="__('Passport No')" />

                                <x-input id="passport" class="w-full md:w-2/3 py-1 mt-2 md:mt-0 uppercase" type="text" name="passport" :value="old('passport')" placeholder="Required" required />
                            </div>

                            <!-- Country -->
                            <div class="mt-4 md:flex justify-between items-center">
                                <x-label for="country" :value="__('Applying Country')" />

                                <x-select id="country" name="country" class="w-full md:w-2/3 py-1 mt-2 md:mt-0" required>
                                    <option value=""></option>
                                    @foreach($countries as $country)
                                    <option value="{{$country->id}}">{{$country->name}}</option>
                                    @endforeach
                                </x-select>
                            </div>

                            <!-- University -->
                            <div class="mt-4 md:flex justify-between items-center">
                                <x-label for="university" :value="__('Applying University')" />

                                <x-select id="university" name="university" class="w-full md:w-2/3 py-1 mt-2 md:mt-0" required>
                                    <option value=""></option>
                                    @foreach($universities as $university)
                                    <option value="{{$university->id}}">{{$university->name}}</option>
                                    @endforeach
                                </x-select>
                            </div>

                            <!-- Level -->
                            <div class="mt-4 md:flex justify-between items-center">
                                <x-label for="level" :value="__('Level of Study')" />

                                <x-select id="level" name="level" class="w-full md:w-2/3 py-1 mt-2 md:mt-0" required>
                                    <option value=""></option>
                                    <option value="PhD">PhD</option>
                                    <option value="Masters">Masters</option>
                                    <option value="Bachelor">Bachelor</option>
                                    <option value="Diploma">Diploma</option>
                                    <option value="Foundation">Foundation</option>
                                </x-select>
                            </div>

                            <!-- Subject -->
                            <div class="mt-4 md:flex justify-between items-center">
                                <x-label for="subject" :value="__('Subject of Study')" />

                                <x-input id="subject" class="w-full md:w-2/3 py-1 mt-2 md:mt-0" type="text" name="subject" :value="old('subject')" placeholder="Required" required />
                            </div>

                            <!-- IELTS -->
                            <div class="mt-4 md:flex justify-between items-center">
                                <x-label for="ielts" :value="__('IELTS')" />

                                <x-input id="ielts" class="w-full md:w-2/3 py-1 mt-2 md:mt-0" type="number" step="0.5" min="1" max="9" name="ielts" :value="old('ielts')" />
                            </div>

                            <!-- Last Education -->
                            <div class="mt-4 md:flex justify-between items-center">
                                <x-label for="qualification" :value="__('Last Education')" />

                                <x-input id="qualification" class="w-full md:w-2/3 py-1 mt-2 md:mt-0" type="text" name="qualification" :value="old('qualification')" />
                            </div>

                            <!-- Result -->
                            <div class="mt-4 md:flex justify-between items-center">
                                <x-label for="result" :value="__('Last Education Result')" />

                                <x-input id="result" class="w-full md:w-2/3 py-1 mt-2 md:mt-0" type="text" name="result" :value="old('result')" />
                            </div>

                            <!-- Phone -->
                            <div class="mt-4 md:flex justify-between items-center">
                                <x-label for="phone" :value="__('Phone')" />

                                <x-input id="phone" class="w-full md:w-2/3 py-1 mt-2 md:mt-0" type="text" name="phone" :value="old('phone')" placeholder="Required" required />
                            </div>

                            <!-- Email Address -->
                            <div class="mt-4 md:flex justify-between items-center">
                                <x-label for="email" :value="__('Email')" />

                                <x-input id="email" class="w-full md:w-2/3 py-1 mt-2 md:mt-0" type="email" name="email" :value="old('email')" />
                            </div>

                            <!-- Address -->
                            <div class="mt-4 md:flex justify-between items-center">
                                <x-label for="address" :value="__('Address')" />

                                <x-input id="address" class="w-full md:w-2/3 py-1 mt-2 md:mt-0" type="text" name="address" :value="old('address')" />
                            </div>

                            <!-- Note -->
                            <div class="mt-4 md:flex justify-between items-center">
                                <x-label for="note" :value="__('Note')" />

                                <x-textarea id="note" class="w-full md:w-2/3 mt-2 md:mt-0" type="text" name="note">
                                    {{old('note')}}
                                </x-textarea>
                            </div>

                            <div class="mt-4 flex justify-end">
                                <a href="/lead" class="'inline-flex items-center px-4 py-2 mr-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-gray-300 active:bg-gray-300 focus:outline-none focus:border-gray-300 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150'">
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#lead').select2();

            $('#lead').change(function() {
                var data = "";
                $.ajax({
                    type: "GET",
                    url: "/file-open/getLead/" + $(this).val(),
                    async: false,
                    success: function(response) {
                        $('#name').val(response.name)
                        $('#passport').val(response.passport)
                        $('#country').val(response.country_id)
                        $('#university').val(response.university_id)
                        $('#level').val(response.level)
                        $('#subject').val(response.subject)
                        $('#ielts').val(response.ielts)
                        $('#phone').val(response.phone)
                        $('#email').val(response.email)
                        $('#address').val(response.address)
                        $('#note').val(response.note)
                    },
                    error: function() {
                        alert('Error occured');
                    }
                });

            });
        });
    </script>
    @endpush
</x-app-layout>