<x-app-layout>
    <x-error />
    <div class="grid md:grid-cols-2 gap-4">
        <div class="w-full col-span-1">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 border-b border-gray-200">
                    <form method="POST" action="{{ route('lead.update', $id) }}">
                        @method('PATCH')
                        @csrf
                        <!-- Name -->
                        <div class="md:flex justify-between items-center">
                            <x-label for="name" :value="__('Name')" />

                            <x-input id="name" class="w-full md:w-2/3 py-1 mt-2 md:mt-0" type="text" name="name"
                                :value="$lead->name" required autofocus />
                        </div>

                        <!-- Phone -->
                        <div class="mt-4 md:flex justify-between items-center">
                            <x-label for="phone" :value="__('Phone')" />

                            <x-input id="phone" class="w-full md:w-2/3 py-1 mt-2 md:mt-0" type="text" name="phone"
                                :value="$lead->phone" required />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4 md:flex justify-between items-center">
                            <x-label for="email" :value="__('Email')" />

                            <x-input id="email" class="w-full md:w-2/3 py-1 mt-2 md:mt-0" type="email" name="email"
                                :value="$lead->email" />
                        </div>

                        <!-- IELTS -->
                        <div class="mt-4 md:flex justify-between items-center">
                            <x-label for="ielts" :value="__('IELTS')" />

                            <x-input id="ielts" class="w-full md:w-2/3 py-1 mt-2 md:mt-0" type="number" step="0.5"
                                min="1" max="9" name="ielts" :value="$lead->ielts" />
                        </div>

                        <!-- Last Education -->
                        <div class="mt-4 md:flex justify-between items-center">
                            <x-label for="qualification" :value="__('Last Education')" />

                            <x-input id="qualification" class="w-full md:w-2/3 py-1 mt-2 md:mt-0" type="text"
                                name="qualification" :value="$lead->qualification" />
                        </div>

                        <!-- Result -->
                        <div class="mt-4 md:flex justify-between items-center">
                            <x-label for="result" :value="__('Last Education Result')" />

                            <x-input id="result" class="w-full md:w-2/3 py-1 mt-2 md:mt-0" type="text" name="result"
                                :value="$lead->result" />
                        </div>

                        <!-- Country -->
                        <div class="mt-4 md:flex justify-between items-center">
                            <x-label for="country" :value="__('Prefered Country')" />

                            <x-input id="country" class="w-full md:w-2/3 py-1 mt-2 md:mt-0" type="text" name="country"
                                :value="$lead->country" />
                        </div>

                        <!-- Subject -->
                        <div class="mt-4 md:flex justify-between items-center">
                            <x-label for="subject" :value="__('Prefered Subject')" />

                            <x-input id="subject" class="w-full md:w-2/3 py-1 mt-2 md:mt-0" type="text" name="subject"
                                :value="$lead->subject" />
                        </div>

                        <!-- Address -->
                        <div class="mt-4 md:flex justify-between items-center">
                            <x-label for="address" :value="__('Address')" />

                            <x-input id="address" class="w-full md:w-2/3 py-1 mt-2 md:mt-0" type="text" name="address"
                                :value="$lead->address" />
                        </div>

                        <!-- Note -->
                        <div class="mt-4 md:flex justify-between items-center">
                            <x-label for="note" :value="__('Note')" />

                            <x-textarea id="note" class="w-full md:w-2/3 mt-2 md:mt-0" type="text" name="note">
                                {{$lead->note}}
                            </x-textarea>
                        </div>

                        <div class="mt-4 flex justify-end">
                            <a href="/lead"
                                class="'inline-flex items-center px-4 py-2 mr-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-gray-300 active:bg-gray-300 focus:outline-none focus:border-gray-300 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150'">
                                {{ __('Cancel') }}
                            </a>
                            <x-button>
                                {{ __('Update') }}
                            </x-button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>