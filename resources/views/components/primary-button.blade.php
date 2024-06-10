<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center text-lg DINAlternateBold underline text-black p-3 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
