@props(['active'])

@php
$classes = ($active ?? false)
? 'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-xl font-medium leading-5 text-dark focus:outline-none focus:border-dark transition duration-150 ease-in-out'
: 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-xl font-medium leading-5 text-gray-500 hover:text-dark hover:border-dark focus:outline-none focus:text-gray-700 focus:dark transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>