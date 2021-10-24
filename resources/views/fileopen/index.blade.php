<x-app-layout>
    <div class="px-4 py-2 mb-4 bg-white">
        <a href="{{ route('file-open.create') }}"
            class="text-sm uppercase hover:text-indigo-600 font-semibold tracking-widest outline-none focus:border-purple-200 focus:outline-none active:border-transparent active:text-grey-900 transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-5 h-5 inline-block"
                viewBox="0 0 512 512">
                <path d="M392.533,187.733H221.867V17.067C221.867,7.641,214.226,0,204.8,0s-17.067,7.641-17.067,17.067v170.667H17.067
			C7.641,187.733,0,195.374,0,204.8s7.641,17.067,17.067,17.067h170.667v170.667c0,9.426,7.641,17.067,17.067,17.067
			s17.067-7.641,17.067-17.067V221.867h170.667c9.426,0,17.067-7.641,17.067-17.067S401.959,187.733,392.533,187.733z" />
            </svg>
            New
        </a>
    </div>
    <div class="p-4 md:grid grid-cols-4 gap-4">
        <div class="col-span-3">
            <div class="p-4 bg-white">
                No file available
            </div>
        </div>
        <div class="col-span-1">
            <div x-data="{ open: false }">
                <div x-on:click="open = ! open" class="px-4 py-2 bg-gray-300 cursor-pointer flex justify-between">
                    <div>Dropdown</div>
                    <div x-show="open" class="self-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-chevron-up" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708l6-6z" />
                        </svg>
                    </div>
                    <div x-show="!open" class="self-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-chevron-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                        </svg>
                    </div>
                </div>

                <div x-show="open" class="p-4 border-2 bg-white">
                    Dropdown Contents...
                </div>
            </div>
        </div>


    </div>
</x-app-layout>