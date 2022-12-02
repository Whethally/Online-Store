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
			<x-auth.form action="{{ route('update_status', $cart->id) }}" method="post" enctype="multipart/form-data">
				@method('PUT')
				<x-main.description>
					{{ __('Название товара') }}
				</x-main.description>
				{{ $cart->name }}
				<x-main.description>
					{{ __('Статус заказа') }}
				</x-main.description>
				<x-auth.form-item>
					<select class="form-control" name="status_id" id="status_id">
						@foreach ($statuses as $status)
							<option value="{{ $status->id }}" @if ($status->id == $cart->status_id) selected @endif>
								{{ $status->name }}</option>
						@endforeach
					</select>
				</x-auth.form-item>
				<div class="form-reason">

				</div>
				{{-- <div class="reason"><x-main.description>{{ __('Причина отказа') }}</x-main.description><x-auth.form-item><textarea class="form-control" name="reason" id="reason" cols="30" rows="10">{{ $cart->reason }}</textarea></x-auth.form-item></div> --}}

				<x-auth.form-item>
					<x-auth.button type="submit">{{ __('Отправить') }}</x-auth.button>
				</x-auth.form-item>
			</x-auth.form>
		</x-auth.form-items>
	</x-auth.form-blocks>
@endsection
