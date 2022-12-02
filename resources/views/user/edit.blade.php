@extends('layouts.layout')
@extends('includes.header')
@extends('includes.footer')

@section('main')
	{{-- edit post --}}
	<x-auth.form-blocks class="main-content">
		<x-auth.form-title>
			{{ __('Изменить пост') }}
		</x-auth.form-title>
		<x-auth.form-items>
			<x-auth.form action="{{ route('profile.update', $market->id) }}" method="POST" enctype="multipart/form-data">
				@method('PUT')
				<x-auth.form-item>
					<x-auth.label>{{ __('Заголовок') }}</x-auth.label>
					<x-auth.input name="name" id="name" value="{{ $market->name }}" />
				</x-auth.form-item>
				<x-auth.form-item>
					<x-auth.label>{{ __('Описание') }}</x-auth.label>
					<x-auth.input name="description" id="description" type="text" value="{{ $market->description }}" />
				</x-auth.form-item>
				<x-auth.form-item>
					<x-auth.label>{{ __('Цена') }}</x-auth.label>
					<x-auth.input name="price" id="price" type="number" value="{{ $market->price }}" />
				</x-auth.form-item>
				<x-auth.form-item>
					<x-auth.label>{{ __('Картинка') }}</x-auth.label>
					<x-auth.input name="image" id="image" type="file" value="{{ $market->image }}" />
				</x-auth.form-item>
				<x-auth.form-item>
					<x-auth.button type="submit">{{ __('Отправить') }}</x-auth.button>
				</x-auth.form-item>
			</x-auth.form>
		</x-auth.form-items>
	</x-auth.form-blocks>


	{{-- <form action="{{ route('profile.update', $market->id) }}" method="post" enctype="multipart/form-data">
		@csrf
		@method('PUT')
		<ul>
			<li>{{ $market->name }}</li>
		</ul>
		<input type="text" name="name" value="{{ $market->name }}">
		<ul>
			<li>{{ $market->description }}</li>
		</ul>
		<input type="text" name="description" value="{{ $market->description }}">
		<ul>
			<li>{{ $market->price }}</li>
		</ul>
		<input type="text" name="price" value="{{ $market->price }}">

		<input type="file" name="image" value="{{ $market->image }}">

		<input type="submit" value="Изменить">
	</form> --}}
@endsection
