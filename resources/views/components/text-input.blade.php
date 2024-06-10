@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'HalyardDisplay border-b-2 border-black dark:border-black my-3 focus:border-white dark:focus:border-white focus:ring-white dark:focus:ring-white rounded-md shadow-sm']) !!}>
