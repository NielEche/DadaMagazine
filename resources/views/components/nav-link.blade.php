@props(['active'])

@php
$classes = ($active ?? false)
            ? 'MinionPro-Regular font-bold inline-flex items-center px-1 pt-1  text-lg  leading-5 text-black dark:text-black focus:outline-none  transition duration-150 ease-in-out'
            : 'MinionPro-Regular font-bold inline-flex items-center px-1 pt-1  border-transparent text-lg  leading-5 text-black dark:text-black  hover:border-black focus:outline-none focus:text-black dark:focus:text-black   transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
