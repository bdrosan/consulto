@if ($errors->any())
<div class="bg-red-200 p-4 my-2">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif