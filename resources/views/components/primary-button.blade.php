<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-6 py-3 bg-imk-600 border border-transparent rounded-full font-bold text-xs text-white uppercase tracking-widest hover:bg-imk-500 focus:bg-imk-500 active:bg-imk-600 focus:outline-none focus:ring-2 focus:ring-imk-500 focus:ring-offset-2 transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-0.5']) }}>
    {{ $slot }}
</button>
