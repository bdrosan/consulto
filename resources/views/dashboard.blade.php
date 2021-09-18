<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="grid grid-cols-5 gap-4">
        <a href="/lead"
            class="p-4 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg flex justify-between items-center">
            <div>
                <svg version="1.0" width="60" height="60" viewBox="0 0 200 200">
                    <g transform="translate(0,200) scale(0.1,-0.1)" fill="#CCC" stroke="none">
                        <path
                            d="M1435 1615 c-5 -2 -23 -6 -38 -9 -16 -4 -48 -25 -73 -48 -90 -83 -92 -207 -5 -302 20 -22 23 -30 12 -34 -24 -8 -89 -72 -112 -109 -12 -19 -27 -53 -34 -76 l-12 -42 -16 31 c-16 31 -92 106 -118 117 -11 5 -11 8 3 17 27 16 66 90 73 135 28 171 -181 300 -324 201 -51 -36 -91 -113 -91 -175 0 -51 28 -116 65 -151 l24 -23 -44 -29 c-53 -35 -80 -71 -110 -145 l-22 -54 -31 41 c-17 23 -49 55 -72 72 l-41 31 24 26 c91 97 76 254 -31 322 -83 52 -179 47 -248 -13 -94 -83 -100 -227 -14 -308 l31 -29 -29 -15 c-46 -24 -109 -102 -132 -163 -17 -47 -20 -74 -18 -173 l3 -118 213 123 213 122 179 -78 c99 -44 184 -79 190 -79 6 0 86 43 178 96 92 53 275 157 407 232 132 74 242 137 244 139 8 6 -43 54 -72 70 l-28 14 25 20 c61 48 84 164 47 245 -35 77 -151 141 -216 119z" />
                        <path
                            d="M1789 1167 l30 -53 -469 -272 c-258 -150 -476 -275 -485 -278 -9 -4 -94 29 -200 76 l-184 82 -224 -121 c-122 -66 -230 -126 -240 -133 -16 -12 -16 -15 3 -46 l20 -32 47 24 c27 14 126 67 222 119 l174 95 41 -18 c22 -9 108 -47 189 -83 l148 -66 500 290 c275 160 501 290 503 288 1 -2 15 -26 31 -54 l29 -50 33 105 c18 58 34 111 35 119 2 10 -26 20 -102 37 -58 13 -111 23 -118 24 -9 0 -3 -18 17 -53z" />
                    </g>
                </svg>
            </div>
            <div class="text-center"><span class="text-3xl block">{{$lead}}</span>Lead</div>
        </a>
        <a href="/lead"
            class="p-4 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg flex justify-between items-center">
            <div>
                <svg width="60" height="60" viewBox="0 0 200 200">

                    <g transform="translate(0,200) scale(0.1,-0.1)" fill="#ccc" stroke="none">
                        <path
                            d="M554 1786 c-128 -41 -201 -180 -164 -311 19 -68 88 -141 153 -160 97 -29 175 -15 238 42 131 119 111 324 -39 406 -61 33 -131 42 -188 23z" />
                        <path
                            d="M1199 1762 c-220 -115 -152 -440 96 -460 56 -4 72 -1 119 22 240 117 165 466 -100 466 -48 0 -73 -6 -115 -28z" />
                        <path
                            d="M512 1219 c-63 -12 -157 -66 -215 -124 -99 -97 -137 -202 -137 -377 l0 -108 313 0 314 0 2 117 c3 176 13 214 84 332 21 35 36 69 34 75 -7 19 -99 64 -162 81 -63 16 -163 18 -233 4z" />
                        <path
                            d="M1196 1220 c-67 -17 -159 -73 -216 -130 -66 -66 -105 -140 -125 -235 -17 -79 -19 -202 -5 -225 7 -12 41 -16 175 -18 l165 -3 0 260 0 261 208 0 207 1 -55 34 c-30 20 -70 40 -90 46 -50 14 -218 20 -264 9z" />
                        <path d="M1240 1000 l0 -80 40 0 40 0 0 40 0 40 60 0 60 0 0 40 0 40 -100 0 -100 0 0 -80z" />
                        <path d="M1520 1040 l0 -40 80 0 80 0 0 40 0 40 -80 0 -80 0 0 -40z" />
                        <path
                            d="M1760 1040 c0 -36 3 -40 25 -40 16 0 25 -6 25 -15 0 -11 11 -15 40 -15 l40 0 0 55 0 55 -65 0 -65 0 0 -40z" />
                        <path d="M1810 810 l0 -80 40 0 40 0 0 80 0 80 -40 0 -40 0 0 -80z" />
                        <path d="M1240 760 l0 -80 40 0 40 0 0 80 0 80 -40 0 -40 0 0 -80z" />
                        <path d="M1810 570 l0 -80 40 0 40 0 0 80 0 80 -40 0 -40 0 0 -80z" />
                        <path d="M1240 510 l0 -80 34 0 c30 0 34 4 40 31 3 17 6 53 6 80 l0 49 -40 0 -40 0 0 -80z" />
                        <path d="M1390 470 l0 -40 80 0 80 0 0 40 0 40 -80 0 -80 0 0 -40z" />
                        <path d="M1630 470 l0 -40 80 0 80 0 0 40 0 40 -80 0 -80 0 0 -40z" />
                    </g>
                </svg>


            </div>
            <div class="text-center"><span class="text-3xl block">{{$unassigned}}</span>Unassigned Lead</div>
        </a>
        <a href="/follow-up"
            class="p-4 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg flex justify-between items-center">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="#ccc" viewBox="0 0 16 16">
                    <path
                        d="M8 1a5 5 0 0 0-5 5v1h1a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V6a6 6 0 1 1 12 0v6a2.5 2.5 0 0 1-2.5 2.5H9.366a1 1 0 0 1-.866.5h-1a1 1 0 1 1 0-2h1a1 1 0 0 1 .866.5H11.5A1.5 1.5 0 0 0 13 12h-1a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h1V6a5 5 0 0 0-5-5z" />
                </svg>

            </div>
            <div class="text-center"><span class="text-3xl block">{{$followup}}</span>Follow Up</div>
        </a>
        <a href="/appointment"
            class="p-4 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg flex justify-between items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="#ccc" class="bi bi-calendar2-check"
                viewBox="0 0 16 16">
                <path
                    d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                <path
                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z" />
                <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z" />
            </svg>
            <div>Appointment</div>
        </a>
        <a href="/Appointment"
            class="p-4 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg flex justify-between items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="#ccc" class="bi bi-list-check"
                viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3.854 2.146a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 3.293l1.146-1.147a.5.5 0 0 1 .708 0zm0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 7.293l1.146-1.147a.5.5 0 0 1 .708 0zm0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z" />
            </svg>
            <div>Assessment</div>
        </a>
        <a href="/Appointment"
            class="p-4 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg flex justify-between items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="#ccc" class="bi bi-file-earmark-text"
                viewBox="0 0 16 16">
                <path
                    d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z" />
                <path
                    d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z" />
            </svg>
            <div>File Submit</div>
        </a>
        <a href="/Appointment"
            class="p-4 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg flex justify-between items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="#ccc" class="bi bi-wallet2"
                viewBox="0 0 16 16">
                <path
                    d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z" />
            </svg>
            <div>Payments</div>
        </a>
        <a href="/Appointment"
            class="p-4 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg flex justify-between items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 200 200" fill="#ccc">
                <path
                    d="M624 448H16c-8.84 0-16 7.16-16 16v32c0 8.84 7.16 16 16 16h608c8.84 0 16-7.16 16-16v-32c0-8.84-7.16-16-16-16zM80.55 341.27c6.28 6.84 15.1 10.72 24.33 10.71l130.54-.18a65.62 65.62 0 0 0 29.64-7.12l290.96-147.65c26.74-13.57 50.71-32.94 67.02-58.31 18.31-28.48 20.3-49.09 13.07-63.65-7.21-14.57-24.74-25.27-58.25-27.45-29.85-1.94-59.54 5.92-86.28 19.48l-98.51 49.99-218.7-82.06a17.799 17.799 0 0 0-18-1.11L90.62 67.29c-10.67 5.41-13.25 19.65-5.17 28.53l156.22 98.1-103.21 52.38-72.35-36.47a17.804 17.804 0 0 0-16.07.02L9.91 230.22c-10.44 5.3-13.19 19.12-5.57 28.08l76.21 82.97z" />
            </svg>
            <div>Processing</div>
        </a>
        <a href="/Appointment"
            class="p-4 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg flex justify-between items-center">
            <div>Archive</div>
        </a>
        <a href="/Appointment"
            class="p-4 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg flex justify-between items-center">
            <div>Reports</div>
        </a>
    </div>
</x-app-layout>