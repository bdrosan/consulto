<table class="min-w-max w-full table-auto">
    <thead>
        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
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
            @if($td)

            @foreach($td as $rowData)
            <td class="py-2 px-6">{{$row[trim($rowData)]}}</td>
            @endforeach

            @else
            @foreach($th as $rowData)
            <td class="py-2 px-6">{{$row[trim(strtolower($rowData))]}}</td>
            @endforeach

            @endif

            @if(isset($link))
            <td>
                <a href="{{ $link }}/{{ $row['id'] }}">
                    <svg class="w-5 h-5 mx-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
            </td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>