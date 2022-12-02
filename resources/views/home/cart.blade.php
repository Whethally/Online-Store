@extends('layouts.layout')
@extends('includes.footer')
@extends('includes.header')

@section('main')
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
						@if ($details['quantity'] == $details['amount'])
							@php danger("Товара ({$details["name"]}) больше нет в наличии.") @endphp
						@endif
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
								<input type="number" value="{{ $details['quantity'] }}" min="1" max="{{ $details['amount'] }}"
									class="form-control quantity update_cart">
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
			<tfoot>
				<tr>
					<td colspan="5" class="text-right">
						{{ __('Всего') }} {{ $total }} ₽
					</td>
				</tr>
				<tr>
					<td colspan="5" class="text-right">
						<x-main.block>
							<a class="btn" href="{{ route('market') }}">
								<i class="fa fa-angle-left"></i> {{ __('Продолжить покупки') }}</a>
							</a>
							<a class="btn" href="{{ route('checkout') }}">
								{{ __('Оплатить') }}</a>
							</a>
						</x-main.block>
					</td>
				</tr>
			</tfoot>
		@endif
	</table>

	{{-- cart table --}}

	{{-- <div class="cart-table">
		<div class="cart-table__header">
			<div class="cart-table__header-item">
				{{ __('Товар') }}
			</div>
			<div class="cart-table__header-item">
				{{ __('Цена') }}
			</div>
			<div class="cart-table__header-item">
				{{ __('Количество') }}
			</div>
			<div class="cart-table__header-item">
				{{ __('Итого') }}
			</div>
			<div class="cart-table__header-item">
			</div>
		</div>
		<div class="cart-table__body">
			@php $total = 0 @endphp
			@if (session('cart'))
				@foreach (session('cart') as $id => $details)
					@php $total += $details['price'] * $details['quantity'] @endphp
					<div class="cart-table__body-item" data-id="{{ $id }}">
						<div class="cart-table__body-item-img">
							<img class="" src="/images/{{ $details['image'] }}" alt="">
						</div>
						<div class="cart-table__body-item-name">
							{{ $details['name'] }}
						</div>
						<div class="cart-table__body-item-price">
							{{ $details['price'] }} ₽
						</div>
						<div class="cart-table__body-item-quantity">
							<input type="number" value="{{ $details['quantity'] }}" class="form-control quantity" />
						</div>
						<div class="cart-table__body-item-total">
							{{ $details['price'] * $details['quantity'] }} ₽
						</div>
						<div class="cart-table__body-item-actions">
							<button class="cart-btn remove_from_cart"><i class="fa-solid fa-trash cart-icon"></i></button>
						</div>
					</div>
				@endforeach
			@endif
		</div>
	</div> --}}

	<div class="flash-message"></div>
@endsection
