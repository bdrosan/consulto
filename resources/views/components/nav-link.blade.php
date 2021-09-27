@props(['active'])

@php
$classes = ($active ?? false)
? 'inline-flex items-center px-2 pt-1 bg-white font-medium leading-5 text-blue-900 focus:outline-none
focus:border-indigo-700 transition duration-150 ease-in-out'
: 'inline-flex items-center px-2 pt-1 font-medium leading-5 hover:text-white hover:border-gray-300 focus:outline-none
focus:text-gray-500 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>