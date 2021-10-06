<div class="overflow-x-auto">
    <table class="w-full table-auto">
        <tbody class="text-gray-600 font-light">

            @foreach($th as $row)
            <tr class="bg-white border-b border-gray-200 hover:bg-gray-100">
                <td class="py-2 px-6">{{strtok($row,':')}}</td>
                <td class="py-2 px-6">
                    @if(explode(":", $row)[1] ?? '' == 'date')
                    {{ date_format( date_create( $rows[ str_replace( " ", "_", trim( strtolower( strtok( $row ,':') ) ) ) ] ), 'l d M Y h:i a' ) }}
                    @else
                    {{$rows[ str_replace( " ", "_", trim( strtolower( $row ) ) ) ]}}
                    @endif
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>