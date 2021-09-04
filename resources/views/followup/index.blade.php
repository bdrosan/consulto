<x-app-layout>
    <div class="overflow-x-auto">
        @if($leads->total()>0)
        <x-table th="Name,Phone,Country,Subject, Qualification, Result, IELTS" :data="$leads" link="follow-up" />
        @else
        <div class="p-4 bg-white rounded">No follow up available</div>
        @endif
    </div>
    <div class="mt-4">
        {{ $leads->links() }}
    </div>

</x-app-layout>