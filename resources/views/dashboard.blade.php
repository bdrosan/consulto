<x-app-layout>
    <div class="m-4">
        <div class="grid grid-cols-1 sm:grid-cols-3 md:grid-cols-4 gap-4">
            @can('access all leads')
            <a href="/lead/unassigned"
                class="p-4 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg flex justify-between items-center">
                <div>
                    <svg version="1.0" width="60" height="60" viewBox="0 0 200 200">
                        <g transform="translate(0,200) scale(0.1,-0.1)" fill="#CCC" stroke="none">
                            <path
                                d="M1435 1615 c-5 -2 -23 -6 -38 -9 -16 -4 -48 -25 -73 -48 -90 -83 -92 -207 -5 -302 20 -22 23 -30 12 -34 -24 -8 -89 -72 -112 -109 -12 -19 -27 -53 -34 -76 l-12 -42 -16 31 c-16 31 -92 106 -118 117 -11 5 -11 8 3 17 27 16 66 90 73 135 28 171 -181 300 -324 201 -51 -36 -91 -113 -91 -175 0 -51 28 -116 65 -151 l24 -23 -44 -29 c-53 -35 -80 -71 -110 -145 l-22 -54 -31 41 c-17 23 -49 55 -72 72 l-41 31 24 26 c91 97 76 254 -31 322 -83 52 -179 47 -248 -13 -94 -83 -100 -227 -14 -308 l31 -29 -29 -15 c-46 -24 -109 -102 -132 -163 -17 -47 -20 -74 -18 -173 l3 -118 213 123 213 122 179 -78 c99 -44 184 -79 190 -79 6 0 86 43 178 96 92 53 275 157 407 232 132 74 242 137 244 139 8 6 -43 54 -72 70 l-28 14 25 20 c61 48 84 164 47 245 -35 77 -151 141 -216 119z" />
                            <path
                                d="M1789 1167 l30 -53 -469 -272 c-258 -150 -476 -275 -485 -278 -9 -4 -94 29 -200 76 l-184 82 -224 -121 c-122 -66 -230 -126 -240 -133 -16 -12 -16 -15 3 -46 l20 -32 47 24 c27 14 126 67 222 119 l174 95 41 -18 c22 -9 108 -47 189 -83 l148 -66 500 290 c275 160 501 290 503 288 1 -2 15 -26 31 -54 l29 -50 33 105 c18 58 34 111 35 119 2 10 -26 20 -102 37 -58 13 -111 23 -118 24 -9 0 -3 -18 17 -53z" />
                    </svg>
                </div>
                <div class="text-center"><span class="text-3xl block">{{$unassigned}}</span>Unassigned Lead</div>
            </a>
            @endcan
            <a href="/follow-up"
                class="p-4 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg flex justify-between items-center">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="#ccc" viewBox="0 0 16 16">
                        <path
                            d="M8 1a5 5 0 0 0-5 5v1h1a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V6a6 6 0 1 1 12 0v6a2.5 2.5 0 0 1-2.5 2.5H9.366a1 1 0 0 1-.866.5h-1a1 1 0 1 1 0-2h1a1 1 0 0 1 .866.5H11.5A1.5 1.5 0 0 0 13 12h-1a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h1V6a5 5 0 0 0-5-5z" />
                    </svg>
                </div>
                <div class="text-center"><span class="text-3xl block">{{$unfollowed}}</span>Unfollowed Lead</div>
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
                <div class="text-center"><span class="text-3xl block">{{$appointment}}</span>Upcoming Appointment</div>
            </a>
            <a href="/Appointment"
                class="p-4 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg flex justify-between items-center">

                <svg height="60" viewBox="0 -8 394 394" width="60" fill="#ccc" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="m292.476562 48.902344h-79.675781c-1.015625-.003906-1.984375-.429688-2.667969-1.179688l-28.914062-31.628906c-9.378906-10.242188-22.621094-16.078125-36.507812-16.09375h-95.253907c-27.300781.03125-49.425781 22.15625-49.457031 49.457031v278.214844c.03125 27.300781 22.15625 49.425781 49.457031 49.457031h295.085938c27.300781-.03125 49.425781-22.15625 49.457031-49.457031v-178.214844c-.03125-27.300781-22.15625-49.425781-49.457031-49.457031h-2.609375v-1.640625c-.03125-27.300781-22.15625-49.425781-49.457032-49.457031zm-238.550781 314.226562h-4.46875c-19.574219-.023437-35.433593-15.886718-35.457031-35.457031v-278.214844c.023438-19.574219 15.882812-35.433593 35.457031-35.457031h95.253907c9.953124.011719 19.449218 4.195312 26.171874 11.535156l28.910157 31.636719c3.339843 3.644531 8.054687 5.722656 13 5.730469h79.679687c19.574219.023437 35.433594 15.882812 35.457032 35.457031v1.640625h-189.085938c-27.300781.03125-49.425781 22.15625-49.457031 49.460938v178.210937c-.023438 19.570313-15.886719 35.433594-35.460938 35.457031zm290.617188-249.128906c19.574219.023438 35.433593 15.882812 35.457031 35.457031v178.214844c-.023438 19.570313-15.882812 35.433594-35.457031 35.457031h-256.167969c9.601562-9.296875 15.015625-22.09375 15.011719-35.457031v-178.214844c.019531-19.574219 15.882812-35.433593 35.457031-35.457031zm0 0" />
                    <path
                        d="m191.691406 245.570312h43v43c0 3.867188 3.136719 7 7 7 3.867188 0 7-3.132812 7-7v-43h43c3.867188 0 7-3.132812 7-7 0-3.867187-3.132812-7-7-7h-43v-43c0-3.867187-3.132812-7-7-7-3.863281 0-7 3.132813-7 7v43h-43c-3.863281 0-7 3.132813-7 7 0 3.867188 3.136719 7 7 7zm0 0" />
                </svg>
                <div class="text-center"><span class="text-3xl block">0</span>New File Open</div>
            </a>
            @can('access payment')
            <a href="/Appointment"
                class="p-4 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg flex justify-between items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="#ccc" class="bi bi-wallet2"
                    viewBox="0 0 16 16">
                    <path
                        d="m343.416 308.292-26.832 13.416 15.199 30.399c7.582 15.162 3.694 40.143-27.836 45.176-16.932 2.7-33.27-9.556-33.925-26.963-.035-.872-.018-38.568-.022-115.32h75v-30h-75v-82.5c0-28.948-23.552-52.5-52.5-52.5s-52.5 23.552-52.5 52.5v7.5h30v-7.5c0-12.406 10.094-22.5 22.5-22.5s22.5 10.094 22.5 22.5v82.5h-30v30h30c.016 120.877-.039 114.31.044 116.466 1.322 35.032 33.629 61.031 68.632 55.442 51.746-8.26 66.465-55.167 49.94-88.217z" />
                    <path fill-rule="evenodd"
                        d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z" />
                    <path
                        d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z" />
                    <path
                        d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z" />
                    <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z" />
                </svg>
                <div class="text-center"><span class="text-3xl block">0</span>Payment Due</div>
            </a>
            @endcan
            <a href="/Appointment"
                class="p-4 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg flex justify-between items-center">
                <svg width="60" height="60" fill="#ccc" viewBox="0 0 512 512">
                    <path d="M506.352,5.648c-39.256-13.092-81.806-3.045-111.068,26.217L288.379,138.768L65.64,43.31L23.213,85.735l180.313,137.886
			l-97.46,97.46l-63.64-21.215L0,342.294l106.066,63.64L169.706,512l42.426-42.427l-21.213-63.638l97.46-97.46l137.886,180.313
			l42.426-42.427l-95.458-222.739l106.904-106.904C509.399,87.456,519.446,44.906,506.352,5.648z" />
                    <path d="M479.297,266.048c-11.716-11.717-30.71-11.717-42.427,0l-8.967,8.967l25.455,59.398l25.939-25.939
			C491.012,296.757,491.012,277.764,479.297,266.048z" />
                    <path d="M245.952,32.701c-11.715-11.717-30.71-11.717-42.426,0l-25.939,25.94l59.398,25.455l8.967-8.969
			C257.669,63.412,257.669,44.418,245.952,32.701z" />
                </svg>
                <div class="text-center"><span class="text-3xl block">0</span>Under Process</div>
            </a>
            <a href="/Appointment"
                class="p-4 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg flex justify-between items-center">
                <svg version="1.1" width="60" height="60" fill="#ccc" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1000 1000"
                    enable-background="new 0 0 1000 1000" xml:space="preserve">
                    <metadata> Svg Vector Icons : http://www.onlinewebfonts.com/icon </metadata>
                    <g>
                        <path
                            d="M926.8,759.6c0,7.3,0,14.6,0,21.9c-0.4,1.8-0.9,3.5-1.1,5.3c-2.2,31.6-11.4,61.2-26.7,88.7c-23.6,42.3-57.5,73.9-101.6,94.3c-39.6,18.3-81.2,24.2-124.2,17.8c-45-6.7-84.4-25.7-117.8-56.6c-3.2-2.9-6.3-4.2-10.6-4.2c-155.2,0.1-310.3,0.1-465.5,0c-2,0-4,0.1-6,0.2c0-232,0-464,0-695.9c1.3-1,2.6-1.9,3.7-3c71.5-71.4,142.9-142.9,214.3-214.3c1.1-1.1,2-2.5,3-3.7c157.9,0,315.9,0,473.8,0c0.1,9.8,0.3,19.7,0.3,29.5c0,170.3,0,340.5-0.1,510.8c0,5,1.4,7.1,6.2,8.9c12.7,4.9,25.7,9.6,37.5,16.3c62.1,35.3,99.4,88.3,111.7,158.7C925.1,742.6,925.7,751.1,926.8,759.6z M136.8,294.6c0,190,0,379.3,0,568.7c122.9,0,245.4,0,368.1,0c-30.9-73.5-28.8-145,14.2-212.5c43-67.5,106.7-100.4,186.2-103.5c0-158.1,0-315.7,0-473.5c-116,0-231.7,0-348,0c0,73.8,0,147.1,0,220.8C283.6,294.6,210.5,294.6,136.8,294.6z M895.1,769c0.1-104.4-84.9-190-189.5-189.8c-105.9,0.2-189.9,84.6-189.9,189.9c0,105,85.3,189.6,189.7,189.6C809.8,958.7,895,873.5,895.1,769z" />
                        <path
                            d="M231.9,389.1c0-10.2,0-20.1,0-30.5c125.9,0,251.8,0,378.1,0c0,9.9,0,20,0,30.5C484.4,389.1,358.5,389.1,231.9,389.1z" />
                        <path
                            d="M231.9,452.3c0-10.2,0-20.2,0-30.5c126.2,0,252,0,378.2,0c0,10.1,0,20.1,0,30.5C484.3,452.3,358.5,452.3,231.9,452.3z" />
                        <path
                            d="M231.9,515.3c0-10,0-19.8,0-30.1c125.9,0,251.8,0,378.1,0c0,9.8,0,19.7,0,30.1C484.3,515.3,358.5,515.3,231.9,515.3z" />
                        <path
                            d="M231.9,578.6c0-10.3,0-20.2,0-30.9c2.3,0,4.2,0,6.2,0c69.3,0,138.6,0.1,207.9-0.1c5.2,0,7,1.2,6.7,6.6c-0.4,8-0.1,16-0.1,24.4C378.9,578.6,305.7,578.6,231.9,578.6z" />
                        <path
                            d="M816.1,836.6c-11.8,11.8-23.3,23.3-35,35c-22.4-22.4-45.4-45.4-68.6-68.7c-23.7,23.7-46.6,46.6-69.2,69.3c-12-12.1-23.6-23.8-35.3-35.6c22.4-22.4,45.3-45.3,68.1-68c-23.5-23.5-46.4-46.3-68.7-68.7c12.4-12.4,24-24,35.6-35.6c21.9,21.9,44.8,44.8,67.8,67.9c23.9-23.9,46.8-46.9,69.5-69.5c12.4,12.4,24,24,35.8,35.8c-22.5,22.5-45.5,45.5-69,69C770.6,791.2,793.6,814.1,816.1,836.6z" />
                    </g>
                </svg>
                <div class="text-center"><span class="text-3xl block">0</span>Rejected File</div>
            </a>
        </div>

        <div class="mt-8 md:grid grid-cols-12 gap-4">
            @if($today_appointment->count())
            <div class="col-span-3">
                <div class="p-2 bg-gray-300">
                    Today's call reminder
                </div>
                <div class="p-4 pb-2 bg-white">
                    @foreach($today_call as $call)
                    <div class="pb-2">{{$call->name}} <a href="tel:{{$call->phone}}">{{$call->phone}}</a></div>
                    @endforeach
                </div>
            </div>
            @endif

            @if($today_appointment->count())
            <div class="col-span-3">
                <div class="p-2 pb-2 bg-gray-300">
                    Today's appointment
                </div>
                <div class="p-4 pb-2 bg-white">
                    @foreach($today_appointment as $today)
                    <div class="pb-2">{{$today->name}} <a href="tel:{{$today->phone}}">{{$today->phone}}</a></div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>