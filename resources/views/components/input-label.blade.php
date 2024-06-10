@props(['value'])

<label {{ $attributes->merge(['class' => 'NHaasGroteskDSPro-65Md block text-sm text-black dark:text-black']) }}>
    {{ $value ?? $slot }}
</label>
