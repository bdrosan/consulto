<div class="overflow-x-auto">
    <table class="w-full table-auto">
        <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                @if($checkbox)
                <th class="py-2 px-6 text-left"><input type="checkbox" id="checkAll"></th>
                @endif
                @foreach($th as $head)
                <th class="py-2 px-6 text-left">{{trim($head)}}</th>
                @endforeach

                @if($link)
                <th></th>
                @endif
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
            @foreach($data as $row)
            <tr class="bg-white border-b border-gray-200 hover:bg-gray-100">
                @if($checkbox)
                <td class="py-2 px-6"><input type="checkbox" class="check" name="check[]" value="{{$row['id']}}">
                </td>
                @endif

                @if($td)

                @foreach($td as $rowData)
                <td class="py-2 px-6">
                    @if(trim(strtolower($rowData)) === 'created_at' || trim(strtolower($rowData)) === 'updated_at')
                    {{ date( 'd/m/Y', strtotime( $row[trim(strtolower($rowData))] )) }}
                    @else
                    {{$row[trim(strtolower($rowData))]}}
                    @endif
                </td>
                @endforeach

                @else
                @foreach($th as $rowData)
                <td class="py-2 px-6">
                    @if(trim(strtolower($rowData)) === 'created_at' || trim(strtolower($rowData)) === 'updated_at')
                    {{ date( 'd/m/Y', strtotime( $row[trim(strtolower($rowData))] )) }}
                    @else
                    {{$row[trim(strtolower($rowData))]}}
                    @endif
                </td>
                @endforeach

                @endif

                @if($link)
                <td class="py-2 px-6">
                    <div class="flex items-center justify-end">
                        @if($action)
                        <a href="{{ $link }}/{{ $row['id'] }}/edit">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mx-1" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </a>
                        <button type="button" onclick="deleteItem( <?= $row['id'] ?> )">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mx-1" fill="none" viewBox="0 0 24 24"
                                stroke="#ef4444">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                        @endif
                        <a href="{{ $link }}/{{ $row['id'] }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>