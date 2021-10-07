<x-app-layout>
    <div class="p-4">
        <x-error />
        <div class="grid md:grid-cols-2 gap-4">
            <div class="w-full col-span-1">
                <div class="bg-white overflow-hidden">
                    <div class="p-6 border-b border-gray-200">
                        <form method="POST" action="{{ route('file-open.store') }}">
                            @csrf
                            <!-- Name -->
                            <div class="md:flex justify-between items-center">
                                <x-label for="name" :value="__('Name (as in Passport)')" />

                                <x-input id="name" class="w-full md:w-2/3 py-1 mt-2 md:mt-0" type="text" name="name"
                                    :value="$lead->name" placeholder="Required" required autofocus />
                            </div>

                            <!-- Passport -->
                            <div class="mt-4 md:flex justify-between items-center">
                                <x-label for="passport" :value="__('Passport No')" />

                                <x-input id="passport" class="w-full md:w-2/3 py-1 mt-2 md:mt-0 uppercase" type="text"
                                    name="passport" :value="$lead->passport" placeholder="Required" required />
                            </div>

                            <!-- Country -->
                            <div class="mt-4 md:flex justify-between items-center">
                                <x-label for="country" :value="__('Applying Country')" />

                                <x-select id="country" name="level" class="w-full md:w-2/3 py-1 mt-2 md:mt-0" required>
                                    <option value=""></option>
                                    <option value="Australia">Australia</option>
                                    <option value="Canada">Canada</option>
                                    <option value="Malaysia">Malaysia</option>
                                </x-select>
                            </div>

                            <!-- University -->
                            <div class="mt-4 md:flex justify-between items-center">
                                <x-label for="university" :value="__('Applying University')" />

                                <x-input id="university" class="w-full md:w-2/3 py-1 mt-2 md:mt-0" type="text"
                                    name="university" :value="$lead->university" placeholder="Required" required />
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
                                <x-label for="subject" :value="__('Subject')" />

                                <x-input id="subject" class="w-full md:w-2/3 py-1 mt-2 md:mt-0" type="text"
                                    name="subject" :value="$lead->subject" placeholder="Required" required />
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

                            <!-- Phone -->
                            <div class="mt-4 md:flex justify-between items-center">
                                <x-label for="phone" :value="__('Phone')" />

                                <x-input id="phone" class="w-full md:w-2/3 py-1 mt-2 md:mt-0" type="text" name="phone"
                                    :value="$lead->phone" placeholder="required" required />
                            </div>

                            <!-- Email Address -->
                            <div class="mt-4 md:flex justify-between items-center">
                                <x-label for="email" :value="__('Email')" />

                                <x-input id="email" class="w-full md:w-2/3 py-1 mt-2 md:mt-0" type="email" name="email"
                                    :value="$lead->email" />
                            </div>

                            <!-- Address -->
                            <div class="mt-4 md:flex justify-between items-center">
                                <x-label for="address" :value="__('Address')" />

                                <x-input id="address" class="w-full md:w-2/3 py-1 mt-2 md:mt-0" type="text"
                                    name="address" :value="$lead->address" />
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