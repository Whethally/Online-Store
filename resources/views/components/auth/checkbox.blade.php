@php($id = Str::uuid())

<div class="form-check">
	<input type="checkbox"
		{{ $attributes->class(['switch-input'])->merge([
		    'value' => 1,
		    'checked' => !!old($attributes->get('name')),
		]) }}
		value="" id="{{ $id }}">

	<label class="switch" for="{{ $id }}">
	</label>
	<label for="{{ $id }}">
		{{ $slot }}
	</label>
</div>
