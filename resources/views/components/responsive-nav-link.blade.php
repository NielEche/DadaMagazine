@props(['active'])

@php
$classes = ($active ?? false)
            ? 'MinionPro-Regular block w-full pl-3 pr-4 py-2 border-l-4 border-transparent  focus:outline-none focus:text-black dark:focus:text-black  transition duration-150 ease-in-out'
            : 'MinionPro-Regular block w-full pl-3 pr-4 py-2 border-l-4 border-transparent text-left text-base font-medium text-black dark:text-black hover:text-black dark:hover:text-black  focus:outline-none focus:text-gray-800 dark:focus:text-black dark:focus:bg-transparent focus:border-transparent dark:focus:border-transparent transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
