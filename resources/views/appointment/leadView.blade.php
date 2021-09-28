<x-app-layout>
    <div class="px-4 py-2 bg-white">
        <a href="{{route('appointment.createByLead', $lead_id)}}"
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
    <div class="p-4">
        <table class="w-full table-auto">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-2 px-6 text-left">Date Time</th>
                    <th class="py-2 px-6 text-left">Agenda</th>
                    <th class="py-2 px-6 text-left">Status</th>
                    <th class="py-2 px-6 text-left">Visited?</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach($appointments as $appointment)
                <?php
                $current = strtotime(date("Y-m-d"));
                $date    = strtotime($appointment->time);

                $datediff = $date - $current;
                $difference = floor($datediff / (60 * 60 * 24));
                ?>
                <tr class="bg-white border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-2 px-6">{{$appointment->time}}</td>
                    <td class="py-2 px-6">{{$appointment->agenda}}</td>
                    <td class="py-2 px-6">
                        @if($difference>0)
                        <span class="bg-green-300 p-1 rounded-md">Upcoming</span>
                        @else
                        <span class="bg-red-300 p-1 rounded-md">Expired</span>
                        @endif
                    </td>
                    <td class="py-2 px-6">
                        @if($difference<=0) @if($appointment->visited==1)
                            <span class="text-green-700">Yes</span>
                            @else
                            <span class="text-red-700">No</span>
                            @endif
                            @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>