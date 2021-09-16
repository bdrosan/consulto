<x-app-layout>
    <x-error />
    <div class="grid md:grid-cols-2 gap-4">
        <div class="w-full col-span-1">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 border-b border-gray-200">
                    <form method="POST" action="{{ route('lead.store') }}">
                        @csrf
                        <!-- Name -->
                        <div class="md:flex justify-between items-center">
                            <x-label for="name" :value="__('Name')" />

                            <x-input id="name" class="w-full md:w-2/3 py-1 mt-2 md:mt-0" type="text" name="name"
                                :value="old('name')" required autofocus />
                        </div>

                        <!-- Phone -->
                        <div class="mt-4 md:flex justify-between items-center">
                            <x-label for="phone" :value="__('Phone')" />

                            <x-input id="phone" class="w-full md:w-2/3 py-1 mt-2 md:mt-0" type="text" name="phone"
                                :value="old('phone')" required />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4 md:flex justify-between items-center">
                            <x-label for="email" :value="__('Email')" />

                            <x-input id="email" class="w-full md:w-2/3 py-1 mt-2 md:mt-0" type="email" name="email"
                                :value="old('email')" />
                        </div>

                        <!-- IELTS -->
                        <div class="mt-4 md:flex justify-between items-center">
                            <x-label for="ielts" :value="__('IELTS')" />

                            <x-input id="ielts" class="w-full md:w-2/3 py-1 mt-2 md:mt-0" type="number" step="0.5"
                                min="1" max="9" name="ielts" :value="old('ielts')" />
                        </div>

                        <!-- Last Education -->
                        <div class="mt-4 md:flex justify-between items-center">
                            <x-label for="qualification" :value="__('Last Education')" />

                            <x-input id="qualification" class="w-full md:w-2/3 py-1 mt-2 md:mt-0" type="text"
                                name="qualification" :value="old('qualification')" />
                        </div>

                        <!-- Result -->
                        <div class="mt-4 md:flex justify-between items-center">
                            <x-label for="result" :value="__('Last Education Result')" />

                            <x-input id="result" class="w-full md:w-2/3 py-1 mt-2 md:mt-0" type="text" name="result"
                                :value="old('result')" />
                        </div>

                        <!-- Country -->
                        <div class="mt-4 md:flex justify-between items-center">
                            <x-label for="country" :value="__('Prefered Country')" />

                            <x-input id="country" class="w-full md:w-2/3 py-1 mt-2 md:mt-0" type="text" name="country"
                                :value="old('country')" />
                        </div>

                        <!-- Subject -->
                        <div class="mt-4 md:flex justify-between items-center">
                            <x-label for="subject" :value="__('Prefered Subject')" />

                            <x-input id="subject" class="w-full md:w-2/3 py-1 mt-2 md:mt-0" type="text" name="subject"
                                :value="old('subject')" />
                        </div>

                        <!-- Address -->
                        <div class="mt-4 md:flex justify-between items-center">
                            <x-label for="address" :value="__('Address')" />

                            <x-input id="address" class="w-full md:w-2/3 py-1 mt-2 md:mt-0" type="text" name="address"
                                :value="old('address')" />
                        </div>

                        <!-- Note -->
                        <div class="mt-4 md:flex justify-between items-center">
                            <x-label for="note" :value="__('Note')" />

                            <x-textarea id="note" class="w-full md:w-2/3 mt-2 md:mt-0" type="text" name="note">
                                {{old('note')}}
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
        <div>
            <div class="bg-white p-6 rounded mb-8 md:flex justify-around">
                <form action="{{ route('lead.import') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="flex flex-col justify-between items-center">
                        <label for="import"
                            class="w-64 flex flex-col items-center p-4 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue-300 hover:text-white">
                            <span id="importLabel">Select a file</span>
                            <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20">
                                <path
                                    d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                            </svg>
                        </label>
                        <input id="import" class="hidden" type="file" name="importFile" onChange="upload()" required />
                        <x-button class="px-12 mt-4">
                            {{ __('Import') }}
                        </x-button>
                    </div>
                </form>
                <div class="mt-4 text-center">
                    <a href="/leads.xlsx" class="p-2 rounded border hover:bg-gray-300" download="">Download
                        Sample</a>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
<script>
function upload() {
    var importField = document.getElementById("import");
    var importLabel = document.getElementById("importLabel");
    if (importField.value != "") {
        var fileName = importField.value.split('\\').pop();
        importLabel.innerHTML = fileName;
    }
}
</script>