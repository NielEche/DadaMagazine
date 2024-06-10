<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center  text-sm DINAlternateBold underline text-black p-3 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
