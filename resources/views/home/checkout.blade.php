@extends('layouts.layout')
@extends('includes.footer')
@extends('includes.header')

@section('main')
	<div class="checkout_main">
		<h1>{{ __('Оплата') }}</h1>

		<table id="cart" class="table table-striped cart-table">
			@if (!session('cart'))
				{{ __('пусто') }}
			@else
				<thead>
					<tr class="cart-tr">
						<th class="cart-th" style="width:50%">{{ __('Товар') }}</th>
						<th class="cart-th" style="width:10%">{{ __('Цена') }}</th>
						<th class="cart-th" style="width:8%">{{ __('Количество') }}</th>
						<th class="cart-th" style="width:22%">{{ __('Итого') }}</th>
						<th class="cart-th" style="width:10%"></th>
					</tr>
				</thead>
				<tbody>
					@php $total = 0 @endphp
					@if (session('cart'))
						@foreach (session('cart') as $id => $details)
							@php $total += $details['price'] * $details['quantity'] @endphp
							<tr class="cart-tr-body" data-id="{{ $id }}">
								<td data-th="Product">
									<div class="cart-info">
										<div class="cart-img">
											<img class="img-full" src="/images/{{ $details['image'] }}" alt="">
										</div>
										<h3>{{ $details['name'] }}</h3>
									</div>
								</td>
								<td class="price" data-th="Price">{{ $details['price'] }} ₽</td>
								<td data-th="quantity">
									{{ $details['quantity'] }}
								</td>
								<td data-th="Subtotal" class="update_cart">
									{{ $details['price'] * $details['quantity'] }} ₽
								</td>
								<td class="actions" data-th="">

									<button class="cart-btn remove_from_cart"><i class="fa-solid fa-trash cart-icon"></i></button>

								</td>
							</tr>
						@endforeach
					@endif
				</tbody>
			@endif
		</table>

		<x-auth.form action="{{ route('cart_order') }}" method="POST">
			<x-auth.form-item>
				<input type="hidden" name="market_id" value="{{ $id }}">
				<x-auth.form-item>
					<x-auth.label>{{ __('Пароль') }}</x-auth.label>
					<x-auth.input name="password" id="password" type="password" />
				</x-auth.form-item>
				<x-auth.button type="submit">{{ __('Отправить') }}</x-auth.button>
			</x-auth.form-item>
		</x-auth.form>
	</div>
@endsection
