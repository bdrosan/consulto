<x-app-layout>
    <div class="px-4 py-2 mb-4 bg-white">
        <a href="{{route('appointment.create')}}"
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
        <x-error />
        <x-success />

        <div>
            <h2 class="text-xl">Appointments</h2>
            @if($appointments->count())
            <x-table>
                <thead>
                    <x-tr class="bg-gray-200 hover:bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <x-th>Name</x-th>
                        @can('access all appointments')<x-th>Counselor</x-th>@endcan
                        <x-th>Time</x-th>
                        <x-th>Agenda/Conversation</x-th>
                        <x-th>Status</x-th>
                        <x-th>Visited?</x-th>
                        <x-th></x-th>
                    </x-tr>
                </thead>
                <x-tbody>
                    @foreach($appointments as $appointment)
                    <x-tr>
                        <x-td><a href="{{route('lead.show',$appointment->lead_id)}}"
                                class="text-blue-500 hover:underline">{{$appointment->name}}</a>
                        </x-td>
                        @can('access all appointments')<x-td>{{$appointment->counselor}}</x-td>@endcan
                        <x-td>{{ \Carbon\Carbon::parse($appointment->time)->format('l d M Y h:i a') }}</x-td>
                        <x-td>{{$appointment->conversation ?? $appointment->agenda}}</x-td>
                        <x-td>
                            @if((strtotime($appointment->time) - time())>0)
                            <span class="bg-green-300 p-1 rounded-md">Upcoming</span>
                            @else
                            <span class="bg-red-300 p-1 rounded-md">Expired</span>
                            @endif
                        </x-td>
                        <x-td>
                            @if((strtotime($appointment->time) - time())<=0) @if($appointment->visited==1)
                                <div class="text-green-700 flex gap-2">YES</div>
                                @else
                                <div class="flex gap-4 items-center">
                                    <div class="text-red-700">NO</div>
                                    <a href="{{ route('appointment.edit', $appointment->id) }}"
                                        class="text-blue-500 text-xs whitespace-nowrap border border-blue-500 p-1 rounded">Add
                                        Visit
                                    </a>
                                </div>
                                @endif
                                @endif
                        </x-td>
                        <x-td-action allow="view,edit,delete" route="appointment" id="{{$appointment->id}}" />
                    </x-tr>
                    @endforeach
                </x-tbody>
            </x-table>
            @else
            <div class="bg-white p-4">
                No appointment found
            </div>
            @endif

            <div class="mt-4">
                {{ $appointments->links() }}
            </div>
        </div>

    </div>
</x-app-layout>