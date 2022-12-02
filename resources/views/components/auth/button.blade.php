{{-- @props(['color' => 'primary']) --}}

<button {{ $attributes->class(['button'])->merge([
    'type' => 'button',
]) }}>
	{{ $slot }}
</button>
