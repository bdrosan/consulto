@if(Session::has('success'))
<div class="bg-green-300 p-4 my-2 rounded" id="success">
    {{ Session::get('success') }}
</div>
@push('scripts')
<script>
var id = document.getElementById('success');
setTimeout(function() {
    id.remove();
}, 5000);
</script>
@endpush
@endif