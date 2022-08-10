@props(['type' => 'button', 'color' => 'gray', 'icon' => '', 'class' => ''])

@if ($color == 'gray')
<button type="{{ $type }}" class="{{ 'inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150' }}">
    @if ($icon !== '')
    <i class="{{ $icon.' cursor-pointer select-none mr-3' }}"></i>
    @endif
    {{ $slot }}
</button>
@endif

@if ($color == 'green')
<button type="{{ $type }}" class="{{ 'inline-flex items-center px-4 py-2 bg-green-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring ring-green-300 disabled:opacity-25 transition ease-in-out duration-150' }}">
    @if ($icon !== '')
    <i class="{{ $icon.' cursor-pointer select-none mr-3' }}"></i>
    @endif
    {{ $slot }}
</button>
@endif

@if ($color == 'red')
<button type="{{ $type }}" class="{{ 'inline-flex items-center px-4 py-2 bg-red-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150' }}">
    @if ($icon !== '')
    <i class="{{ $icon.' cursor-pointer select-none mr-3' }}"></i>
    @endif
    {{ $slot }}
</button>
@endif