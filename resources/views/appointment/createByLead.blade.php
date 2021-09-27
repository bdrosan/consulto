<x-app-layout>
    <div class="px-4 py-2 bg-white">
        Set new appointment for {{$lead->name}}
    </div>
    <div class="p-4">
        <input type="datetime-local" name="date">
    </div>
</x-app-layout>