<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="p-4 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
        <ul>
            <li>Dashboard</li>
            <li>Lead</li>
            <li>Follow Up</li>
            <li>Appointment</li>
            <li>Assessment</li>
            <li>File Submit</li>
            <li>Payments</li>
            <li>Processing</li>
            <li>Archive</li>
            <li>Reports</li>
        </ul>
    </div>
</x-app-layout>