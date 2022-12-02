@section('header')
	<div class="header-items">
		<div class="header-block">
			<div class="header-logo">
				<a href="{{ route('market') }}">
					<img class="logo-color" width="32" src="{{ asset('/assets/img/logo.svg') }}" alt="Logo">
				</a>

			</div>

			<div class="header-text">
				<a href="{{ route('market') }}">Каталог</a>
			</div>
			<div class="header-text">
				<a href="{{ route('about') }}">О нас</a>
			</div>
		</div>
		@guest
			<div class="header-block">
				{{-- <div class="header-text">
					<a href="#"><i class="fa-solid fa-magnifying-glass"></i></a>
				</div> --}}
				<x-auth.form action="{{ route('market') }}" method="get">
					<x-auth.input name="search" value="{{ request('search') }}" placeholder="{{ __('Поиск') }}"></x-auth.input>
				</x-auth.form>
				<div class="header-text">
					<a href="{{ route('login') }}">Авторизация</a>
				</div>
				<a class="header-text registration-btn reg-link" href="{{ url('register') }}">Регистрация</a>
				<div class="header-text">
					<a href="{{ route('cart') }}" class="btn">
						<i class="fa fa-shopping-cart cart-icon" aria-hidden="true"></i> {{ __('Корзина') }}
						<span>[ {{ count((array) session('cart')) }} ]</span>
					</a>
				</div>

			</div>
		@endguest
		@auth
			<div class="header-block">
				{{-- <div class="header-text">
					<a href="#"><i class="fa-solid fa-magnifying-glass"></i></a>
				</div> --}}
				<x-auth.form action="{{ route('market') }}" method="get">
					<x-auth.input name="search" value="{{ request('search') }}" placeholder="{{ __('Поиск') }}"></x-auth.input>
				</x-auth.form>
				<div class="header-text">
					<a href="{{ route('profile') }}">Профиль</a>
				</div>
				<div class="header-text">
					<a href="{{ route('logout') }}">Выйти</a>
				</div>
				@if (Auth::user()->admin === 1)
					<div class="header-text">
						<a href="{{ route('dashboard') }}">{{ __('Админка') }}</a>
					</div>
				@endif
				<div class="header-text">
					<a href="{{ route('cart') }}" class="btn">
						<i class="fa fa-shopping-cart cart-icon" aria-hidden="true"></i> {{ __('Корзина') }}
						<span>[ {{ count((array) session('cart')) }} ]</span>
					</a>
				</div>
			@endauth
		</div>
	@endsection
