@props(['href' => '#', 'color' => 'gray', 'class' => '', 'icon' => ''])

<a href="{{ $href }}" class="{{ 'inline-flex items-center px-4 py-2 bg-'.$color.'-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-'.$color.'-700 active:bg-'.$color.'-900 focus:outline-none focus:border-'.$color.'-900 focus:ring ring-'.$color.'-300 disabled:opacity-25 transition ease-in-out duration-150 '.$class }}">
    @if ($icon !== '')
    <i class="{{ $icon.' cursor-pointer select-none mr-3' }}"></i>
    @endif
    {{ $slot }}
</a>