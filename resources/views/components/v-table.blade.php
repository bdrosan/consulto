<div class="overflow-x-auto">
    <table class="min-w-max w-full table-auto">
        <tbody class="text-gray-600 font-light">

            @foreach($th as $row)
            <tr class="bg-white border-b border-gray-200 hover:bg-gray-100">

                <td class="py-2 px-6">{{$row}}</td>
                <td class="py-2 px-6">{{$rows[ trim( strtolower( $row ) ) ]}}</td>

            </tr>
            @endforeach

        </tbody>
    </table>
</div>