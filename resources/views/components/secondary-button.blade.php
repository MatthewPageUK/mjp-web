<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-white border border-primary-300 rounded-md font-semibold text-xs text-primary-700 uppercase tracking-widest shadow-sm hover:bg-primary-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 XXtransition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
