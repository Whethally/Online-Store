@extends('layouts.layout')
@extends('includes.footer')
@extends('includes.header')

@section('main')
	<div class="main">
		<div class="main-block">
			@include('home.filter')
			<x-main.main>
				<x-main.title>
					{!! $left = '<i class="fa-solid fa-box"></i>' !!}{{ __('Товары') }}
				</x-main.title>
				<x-main.content>
					@if ($market->isEmpty())
						{{ __('Нет ни одного товара.') }}
					@else
						@foreach ($market as $post)
							<x-main.block>
								<x-main.image>
									<img class="img-full" src="/images/{{ $post->image }}" alt="">
								</x-main.image>

								<x-main.content-items>
									<x-main.content-text>
										<x-main.content-info-item>
											<x-main.content-info-item-div>
												<x-main.content-div>
													{{ __('Название товара') }}
												</x-main.content-div>

												<x-main.description>
													{{ Str::limit($post->name, 16) }}
												</x-main.description>
											</x-main.content-info-item-div>

											<x-main.content-info-item-div>
												<x-main.content-div>
													{{ __('Категория') }}
												</x-main.content-div>
												<x-main.description>
													{{ $categories->where('id', Str::limit($post->category_id, 16))->first()->name }}
												</x-main.description>
											</x-main.content-info-item-div>
										</x-main.content-info-item>

										<x-main.content-info-item>
											<x-main.content-info-item-div>
												<x-main.content-div>
													{{ __('Описание') }}
												</x-main.content-div>
												<x-main.description>
													{{ Str::limit($post->description, 16) }}
												</x-main.description>
											</x-main.content-info-item-div>
										</x-main.content-info-item>
									</x-main.content-text>
									<x-main.price>
										{{ number_format($post->price, 0, ',', ' ') }}
									</x-main.price>

									<x-main.block>
										<x-main.button href="{{ route('market.show', $post->id) }}">
											{{ __('Подробнее') }}
										</x-main.button>
										<x-main.button href="{{ route('add.to.cart', $post->id) }}">
											{{ __('Добавить') }}
										</x-main.button>
									</x-main.block>
								</x-main.content-items>
							</x-main.block>
						@endforeach
					@endif
				</x-main.content>
			</x-main.main>
			<x-auth.form action="{{ route('market') }}" method="get">
				<div class="main-cart">
					<x-main.title>
						{!! $left = '<i class="fa-solid fa-cart-shopping"></i>' !!}{{ __('Корзина') }}
					</x-main.title>
					@if ($market->isEmpty())
						{{ __('Корзина пуста') }}
					@else
						<div class="cart-items">

							@if (session('cart'))
								@foreach (session('cart') as $id => $details)
									<div class="cart-items">
										<x-main.image>
											<img class="img-full" src="/images/{{ $details['image'] }}" alt="">
										</x-main.image>
										<div class="cart-info">
											<div class="cart-name">
												<p>{{ $details['name'] }}</p>
											</div>
											<div class="cart-desc">
												<p>₽ {{ $details['price'] }}</p>
											</div>
											<div class="cart-desc">
												<p>x{{ $details['quantity'] }}</p>
											</div>
										</div>
									</div>
								@endforeach
							@endif
							<div class="">
								@php $total = 0 @endphp
								@foreach ((array) session('cart') as $id => $details)
									@php $total += $details['price'] * $details['quantity'] @endphp
								@endforeach
								<div class="">
									<p>{{ __('Всего') }}: <span class="">₽ {{ $total }}</span></p>
								</div>
								<div class="">
									<i class="fa-solid fa-star"></i>
									<span>{{ count((array) session('cart')) }}</span>
								</div>
							</div>
						</div>
						<a href="{{ route('cart') }}" class="cart-button">{{ __('Перейти') }}</a>
				</div>
				@endif
		</div>
		</x-auth.form>
		<div class="flash-message"></div>
	@endsection
