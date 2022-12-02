@extends('layouts.layout')
@extends('includes.header')
@extends('includes.footer')

@section('main')
	<div class="profile">
		<h1>
			{{ __('Изменить профиль') }}
			|
			{{ Auth::user()->name }} {{ Auth::user()->surname }} {{ Auth::user()->patronymic }}
		</h1>


		{{-- add post --}}
		{{-- <form action="{{ route('profile.update', Auth::user()->id) }}" method="post">
		@csrf
		@method('PUT')
		<ul>
			<li>{{ Auth::user()->username }}</li>
		</ul>
		<input type="text" name="username" value="{{ Auth::user()->username }}">
		<ul>
			<li>{{ Auth::user()->email }}</li>
		</ul>
		<input type="text" name="email" value="{{ Auth::user()->email }}">
		<ul>
			<li>{{ __('Изменить пароль') }}</li>
		</ul>
		<input type="password" name="password" value="">

		<input type="submit" value="Изменить">
	</form> --}}


		{{-- delete post --}}

		{{-- <form action="{{ route('profile.destroy', Auth::user()->id) }}" method="post">
		@csrf
		@method('DELETE')
		<input type="submit" value="Удалить">
	</form> --}}

		{{-- logout --}}

		{{-- <form action="{{ route('logout') }}" method="get">
		@csrf
		<input type="submit" value="Выйти">
	</form> --}}
		<x-main.orders>
			<x-main.title>
				{!! $left = '<i class="fa-solid fa-box"></i>' !!}{{ __('Заказы') }}
			</x-main.title>
			<x-main.content>
				@if ($cart->isEmpty())
					{{ __('Нет ни одного заказа.') }}
				@else
					@foreach ($cart as $post)
						<x-main.block>
							<x-main.image>
								<img class="img-full" src="/images/{{ $post->market_image }}" alt="">
							</x-main.image>
							<x-main.content-items>
								<x-main.content-text>
									<x-main.content-info-item>
										<x-main.content-info-item-div>
											<x-main.content-div>
												{{ __('Название товара') }}
											</x-main.content-div>

											<x-main.description>
												{{ $post->market_name }}
											</x-main.description>
										</x-main.content-info-item-div>

										<x-main.content-info-item-div>
											<x-main.content-div>
												{{ __('Количество') }}
											</x-main.content-div>

											<x-main.description>
												x{{ $post->quantity }}
											</x-main.description>
										</x-main.content-info-item-div>

										<x-main.content-info-item-div>
											<x-main.content-div>
												{{ __('Категория') }}
											</x-main.content-div>
											<x-main.description>
												{{ $categories->where('id', $post->category_id)->first()->name }}
											</x-main.description>
										</x-main.content-info-item-div>
									</x-main.content-info-item>

									<x-main.content-info-item>
										<x-main.content-info-item-div>
											<x-main.content-div>
												{{ __('Статус') }}
											</x-main.content-div>

											<x-main.description>
												{{ $post->status_name }}
											</x-main.description>
										</x-main.content-info-item-div>

										@if ($post->status_id == 4)
											<x-main.content-info-item-div>
												<x-main.content-div>
													{{ __('Причина') }}
												</x-main.content-div>

												<x-main.description>
													{{ $post->reason }}
												</x-main.description>
											</x-main.content-info-item-div>
										@endif

										<x-main.content-info-item-div>
											<x-main.content-div>
												{{ __('Дата заказа') }}
											</x-main.content-div>

											<x-main.description>
												{{ $post->created_at->format('d M Y') }}
											</x-main.description>
										</x-main.content-info-item-div>
									</x-main.content-info-item>
								</x-main.content-text>

								<x-main.price>
									{{ number_format($post->price, 0, ',', ' ') }}
								</x-main.price>

								@if ($post->status_id == 1)
									<x-main.block>
										<form action="{{ route('delete_cart_user', $post->id) }}" method="post" accept-charset="UTF-8">
											@csrf
											@method('DELETE')
											<button onclick="return confirm('{{ __('Вы уверены что хотите отменить заказ?') }}')" class="btn"
												type="submit">
												{{ __('Отменить') }}
											</button>
										</form>
									</x-main.block>
								@endif

							</x-main.content-items>
						</x-main.block>
					@endforeach
					<x-main.name>
						{{ __('Всего потрачено:') }} {{ $total }} ₽
					</x-main.name>
				@endif
			</x-main.content>
		</x-main.orders>

		{{-- my posts --}}

		{{-- <x-main.main>
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
									{{ $categories->where('id', $post->category_id)->first()->name }}
									<x-main.name>
										{{ Str::limit($post->name, 26) }}
									</x-main.name>
									<x-main.description>
										{{ Str::limit($post->description, 26) }}
									</x-main.description>
								</x-main.content-text>
								<x-main.price>
									{{ number_format($post->price, 0, ',', ' ') }}
								</x-main.price>

								<x-main.block>
									<x-main.button href="{{ route('profile.edit', $post->id) }}">
										{{ __('Изменить') }}
									</x-main.button>
									<x-main.button href="{{ route('market.show', $post->id) }}">
										{{ __('Подробнее') }}
									</x-main.button>
									<form action="{{ route('profile.destroy', $post->id) }}" method="post" accept-charset="UTF-8">
										@csrf
										@method('DELETE')
										<button onclick="return confirm('{{ __('Вы уверены что хотите удалить пост?') }}')" class="btn"
											type="submit">
											{{ __('Удалить') }}
										</button>
									</form>
								</x-main.block>
							</x-main.content-items>
						</x-main.block>
					@endforeach
				@endif
			</x-main.content>
		</x-main.main> --}}

		{{-- add post --}}

		{{-- <x-auth.form-blocks class="main-content">
			<x-auth.form-title>
				{{ __('Добавить пост') }}
			</x-auth.form-title>
			<x-auth.form-items>
				<x-auth.form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data">
					<x-auth.form-item>
						<x-auth.label>{{ __('Заголовок') }}</x-auth.label>
						<x-auth.input name="name" id="name" />
					</x-auth.form-item>
					<x-auth.form-item>
						<x-auth.label>{{ __('Описание') }}</x-auth.label>
						<x-auth.input name="description" id="description" type="text" />
					</x-auth.form-item>
					<x-auth.form-item>
						<x-auth.label>{{ __('Цена') }}</x-auth.label>
						<x-auth.input name="price" id="price" type="number" />
					</x-auth.form-item>
					<x-auth.form-item>
						<x-auth.label>{{ __('Картинка') }}</x-auth.label>
						<x-auth.input name="image" id="image" type="file" />
					</x-auth.form-item>
					<x-auth.form-item>
						<select class="form-control" name="category_id" id="category_id">
							@foreach ($categories as $category)
								<option value="{{ $category->id }}">{{ $category->name }}</option>
							@endforeach
						</select>
					</x-auth.form-item>
					<x-auth.form-item>
						<x-auth.button type="submit">{{ __('Отправить') }}</x-auth.button>
					</x-auth.form-item>
				</x-auth.form>
			</x-auth.form-items>
		</x-auth.form-blocks> --}}
	</div>

@endsection
