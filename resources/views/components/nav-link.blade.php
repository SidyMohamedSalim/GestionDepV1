@props(['active'])

@php
$classes = $active ?? false ? 'inline-flex items-center px-1 pt-1 text-sm font-extrabold leading-5 text-gray-900
focus:outline-none focus:border-primary transition duration-150 ease-in-out text-primary ' : 'inline-flex items-center
px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700
hover:text-primary focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
