<div class="overflow-x-auto">
    <table {{ $attributes->merge(['class' => 'w-full table-auto']) }}>
        {{ $slot }}
    </table>
</div>