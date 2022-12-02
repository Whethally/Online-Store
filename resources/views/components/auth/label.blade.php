@props(['required' => false])

{{-- {{ $required ? '1' : '0' }} --}}

<label for="floatingInput" {{ $attributes->class(['floatingInput', $required ? 'required' : '']) }} disabled>
	{{ $slot }}
</label>
