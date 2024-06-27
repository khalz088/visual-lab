<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2  border  rounded-md font-semibold text-xs text-white uppercase tracking-widest bg-green-700 text-white  hover:border-green-700 hover:border-2   hover:text-green-800 hover:bg-white transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
