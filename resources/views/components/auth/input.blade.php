@props(['value' => ''])

<input id="floatingInput"
	{{ $attributes->class(['form-control'])->merge([
	    'type' => 'text',
	    'value' => old($attributes->get('name')) ?: $value,
	]) }}>
