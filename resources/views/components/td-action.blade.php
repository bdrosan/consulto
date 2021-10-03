@props(['allow','route','id'])

@php
$allow = trim(strtolower($allow));
$items = explode(',', $allow);
@endphp

<td class='py-2 px-6'>
    <div class="flex items-center justify-end">
        @if(in_array('edit',$items))
        <a href="{{ $route }}/{{ $id }}/edit" title="Edit">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mx-1" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>
        </a>
        @endif

        @if(in_array('delete',$items))
        <button type="button" onclick="deleteItem( <?= $id ?> )" title="Delete">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mx-1" fill="none" viewBox="0 0 24 24"
                stroke="#ef4444">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
            </svg>
        </button>
        @endif
        @if(in_array('view',$items))
        <a href="{{ $route }}/{{ $id }}" title="View">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </a>
        @endif
    </div>
</td>
@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
function deleteItem(id) {
    if (confirm("Do you really want to delete this?")) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '{{ $route }}/' + id,
            method: 'DELETE',
            success: function(data) {
                if (data == 1) {
                    alert("Successfully deleted.")
                    window.location.reload()
                } else {
                    console.log(data);
                }
            }
        })
    }

}
</script>
@endpush