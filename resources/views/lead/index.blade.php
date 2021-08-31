<x-app-layout>
    <div class="mb-5">
        <a href="/lead/create" class="px-5 py-2 text-sm uppercase text-indigo-600 font-semibold outline-none border border-indigo-600 hover:text-white hover:bg-indigo-600 focus:border-purple-200 focus:outline-none active:border-transparent active:text-grey-900 transition-all">New</a>
    </div>
    <div class="overflow-x-auto">
        <div class="md:grid grid-cols-4 gap-4">
            <div class="col-span-3 w-full overflow-x-auto">
                @if($leads->total()>0)
                <table class="min-w-max w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Name</th>
                            <th class="py-3 px-6 text-left">Phone</th>
                            <th class="py-3 px-6 text-left">Email</th>
                            <th class="py-3 px-6 text-left">Address</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @foreach($leads as $lead)
                        <tr class="bg-white border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6">
                                {{$lead['name']}}
                            </td>
                            <td class="py-3 px-6">
                                {{$lead['phone']}}
                            </td>
                            <td class="py-3 px-6">
                                {{$lead['email']}}
                            </td>
                            <td class="py-3 px-6">
                                {{$lead['address']}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <div class="p-4">No Lead Available</div>
                @endif
            </div>
        </div>
    </div>

</x-app-layout>