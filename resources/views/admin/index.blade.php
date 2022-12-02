@extends('layouts.layout')
@extends('includes.header')
@extends('includes.footer')

@section('main')
	<div class="profile">
		<div class="main-block">
			<x-auth.form action="{{ route('dashboard') }}" method="get">
				<div class="main-filters">
					<x-main.title>
						{!! $left = '<i class="fa-solid fa-filter"></i>' !!}{{ __('Поиск') }}
					</x-main.title>
					{{-- @if ($market->isEmpty())
						{{ __('Нет ни одного товара.') }}
					@else --}}
					<div class="filters-items">
						<div class="filter-item form-control">
							<div class="filter-item-title">
								{{ __('Категория') }}
							</div>
							<div class="filter-item-content">
								<select class="form-control" name="status" value="{{ request('status') }}">
									<option value="">{{ __('Все') }}</option>
									@foreach ($statuses as $status)
										<option {{ $status->id == request('status') ? 'selected' : '' }} value="{{ $status->id }}">
											{{ $status->name }}</option>
									@endforeach
								</select>
							</div>
						</div>
						{{-- <div class="filter-item form-control">
							<div class="filter-item-title">
								{{ __('Сортировка') }}
							</div>
							<div class="filter-item-content">
								<select class="form-control" name="sort" value="{{ request('sort') }}">
									<option value="">{{ __('По умолчанию') }}</option>
									<option value="price_asc">{{ __('По возрастанию цены') }}</option>
									<option value="price_desc">{{ __('По убыванию цены') }}</option>
									<option value="name_asc">{{ __('По возрастанию названия') }}</option>
									<option value="name_desc">{{ __('По убыванию названия') }}</option>
								</select>
							</div>
						</div>
						<div class="filter-item form-control">
							<div class="filter-item-title">
								{{ __('Цена') }}
							</div>
							<div class="filter-item-content">
								<div class="row">
									<div class="col-6">
										<x-auth.input name="price_from" value="{{ request('price_from') }}" placeholder="{{ __('От') }}">
										</x-auth.input>
									</div>
									<div class="col-6">
										<x-auth.input name="price_to" value="{{ request('price_to') }}" placeholder="{{ __('До') }}">
										</x-auth.input>
									</div>
								</div>
							</div>
						</div> --}}
						<x-auth.button type="submit" class="w-100">
							{{ __('Применить') }}
						</x-auth.button>
						{{-- @endif --}}
					</div>
				</div>
			</x-auth.form>

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

									<x-main.content-info-item>
										<x-main.content-info-item-div>
											<x-main.content-div>
												{{ __('ФИО Заказчика') }}
											</x-main.content-div>

											<x-main.description>
												{{ $post->user_name }}
												{{ $post->user_surname }}
												{{ $post->user_patronymic }}
											</x-main.description>
										</x-main.content-info-item-div>
									</x-main.content-info-item>

									<br>

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

											<x-main.content-info-item>
												<x-main.content-info-item-div>
													<x-main.content-div>
														{{ __('Категория') }}
													</x-main.content-div>
													<x-main.description>
														{{ $categories->where('id', $post->category_id)->first()->name }}
													</x-main.description>
												</x-main.content-info-item-div>
											</x-main.content-info-item>
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

									<x-main.block>
										<x-main.button href="{{ route('edit_status', $post->id) }}">
											{{ __('Изменить статус') }}
										</x-main.button>

										<form action="{{ route('delete_cart', $post->id) }}" method="post" accept-charset="UTF-8">
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
						<x-main.name>
							{{ __('Всего потрачено:') }} {{ $total }} ₽
						</x-main.name>
					@endif
				</x-main.content>
			</x-main.orders>
		</div>

		{{-- <x-main.main>
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
								<div>
									<x-main.content-div>
										{{ __('ФИО Заказчика') }}
									</x-main.content-div>
									<div>
										{{ $post->user_name }}
										{{ $post->user_surname }}
										{{ $post->user_patronymic }}
									</div>
								</div>
								<br>
								<x-main.content-text>
									<div>
										<x-main.content-div>
											{{ __('Название товара') }}
										</x-main.content-div>
										<x-main.name>
											{{ $post->market_name }}
											x{{ $post->quantity }}
										</x-main.name>
									</div>
									<div>
										<x-main.content-div>
											{{ __('Статус') }}
										</x-main.content-div>
										<x-main.description>
											{{ $post->status_name }}
										</x-main.description>
									</div>
									<div>
										<x-main.content-div>
											{{ __('Дата заказа') }}
										</x-main.content-div>
										{{ $post->created_at->format('d M Y') }}
									</div>
								</x-main.content-text>
								<x-main.price>
									{{ number_format($post->price, 0, ',', ' ') }}
								</x-main.price>
								<x-main.block>
									<x-main.button href="{{ route('edit_status', $post->id) }}">
										{{ __('Изменить статус') }}
									</x-main.button>
									<form action="{{ route('delete_cart', $post->id) }}" method="post" accept-charset="UTF-8">
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
					<x-main.name>
						{{ __('Всего потрачено:') }} {{ $total }} ₽
					</x-main.name>
				@endif
			</x-main.content>
		</x-main.main> --}}

		<x-main.main>
			<x-main.title>
				{!! $left = '<i class="fa-solid fa-box"></i>' !!}{{ __('Товары') }}
			</x-main.title>
			<x-main.content>
				@if ($posts->isEmpty())
					{{ __('Нет ни одного товара.') }}
				@else
					@foreach ($posts as $post)
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
												{{ Str::limit($post->name, 26) }}
											</x-main.description>
										</x-main.content-info-item-div>

										<x-main.content-info-item>
											<x-main.content-info-item-div>
												<x-main.content-div>
													{{ __('Категория') }}
												</x-main.content-div>
												<x-main.description>
													{{ $categories->where('id', $post->category_id)->first()->name }}
												</x-main.description>
											</x-main.content-info-item-div>
										</x-main.content-info-item>
									</x-main.content-info-item>

									<x-main.content-info-item>
										<x-main.content-info-item-div>
											<x-main.content-div>
												{{ __('Описание') }}
											</x-main.content-div>

											<x-main.description>
												{{ Str::limit($post->description, 26) }}
											</x-main.description>
										</x-main.content-info-item-div>
									</x-main.content-info-item>
								</x-main.content-text>
								<x-main.price>
									{{ number_format($post->price, 0, ',', ' ') }}
								</x-main.price>

								<x-main.block>
									<x-main.button href="{{ route('dashboard.edit', $post->id) }}">
										{{ __('Изменить') }}
									</x-main.button>
									<x-main.button href="{{ route('market.show', $post->id) }}">
										{{ __('Подробнее') }}
									</x-main.button>

									<form action="{{ route('dashboard.destroy', $post->id) }}" method="post" accept-charset="UTF-8">
										@csrf
										@method('DELETE')
										<button onclick="return confirm('{{ __('Вы уверены что хотите удалить пост?') }}')" class="btn"
											type="submit">
											{{ __('Удалить') }}
										</button>
									</form>
									<div>
										<input type="checkbox" data-id="{{ $post->id }}" name="active" class="market-switch js-switch"
											{{ $post->active == 1 ? 'checked' : '' }}>
									</div>
								</x-main.block>
							</x-main.content-items>
						</x-main.block>
					@endforeach
				@endif
			</x-main.content>
		</x-main.main>
		<div class="main-block">
			<div class="main-content">
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
			</div>

			<div class="main-content">
				<x-auth.form-title>
					{{ __('Добавить категорию') }}
				</x-auth.form-title>
				<x-auth.form-items>
					<x-auth.form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
						<x-auth.form-item>
							<x-auth.label>{{ __('Название категории') }}</x-auth.label>
							<x-auth.input name="name" id="name" />
						</x-auth.form-item>
						<x-auth.form-item>
							<x-auth.button type="submit">{{ __('Отправить') }}</x-auth.button>
						</x-auth.form-item>
					</x-auth.form>
				</x-auth.form-items>
			</div>
		</div>

		<div class="main-content">
			@if ($users->isEmpty())
				{{ __('Нет категорий') }}
			@else
				<table class="table table-striped">
					<thead>
						<tr class="cart-tr">
							<th class="cart-th" scope="col">#</th>
							<th class="cart-th" scope="col">{{ __('Логин') }}</th>
							<th class="cart-th" scope="col">{{ __('Email') }}</th>
							<th class="cart-th" scope="col">{{ __('Дата регистрации') }}</th>
							<th class="cart-th" scope="col">{{ __('Действия') }}</th>
							<th class="cart-th" scope="col">{{ __('Статус') }}</th>
							<th class="cart-th" scope="col">{{ __('Админ') }}</th>


						</tr>
					</thead>
					<tbody>
						@foreach ($users as $user)
							<tr class="">
								<th scope="row">{{ $user->id }}</th>
								<td>{{ $user->username }}</td>
								<td>{{ $user->email }}</td>
								<td>{{ $user->created_at->diffForHumans() }}</td>
								<td>
									<form action="{{ route('destroy_user', $user->id) }}" method="post" accept-charset="UTF-8">
										@csrf
										@method('DELETE')
										<button onclick="return confirm('{{ __('Вы уверены что хотите удалить пользователя?') }}')"
											class="btn btn-primary" type="submit">
											{{ __('Удалить') }}
										</button>
									</form>
								</td>
								<td>
									<input type="checkbox" data-id="{{ $user->id }}" name="active" class="active-switch js-switch"
										{{ $user->active == 1 ? 'checked' : '' }}>
								</td>
								<td>
									<input type="checkbox" data-id="{{ $user->id }}" name="active_admin" class="admin-switch js-switch"
										{{ $user->admin == 1 ? 'checked' : '' }}>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			@endif
		</div>

		<div class="main-content">
			@if ($categories->isEmpty())
				{{ __('Нет категорий') }}
			@else
				<table class="table table-striped cart-table">
					<thead>
						<tr class="cart-tr">
							<th class="cart-th" scope="col">#</th>
							<th class="cart-th" scope="col">{{ __('Категория') }}</th>
							<th class="cart-th" scope="col">{{ __('Дата создания') }}</th>
							<th class="cart-th" scope="col">{{ __('Действия') }}</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($categories as $category)
							<tr class="">
								<th scope="row">{{ $category->id }}</th>
								<td>{{ $category->name }}</td>
								<td>{{ $category->created_at->diffForHumans() }}</td>
								<td>
									<form action="{{ route('destroy_category', $category->id) }}" method="post" accept-charset="UTF-8">
										@csrf
										@method('DELETE')
										<button onclick="return confirm('{{ __('Вы уверены что хотите удалить пользователя?') }}')"
											class="btn btn-primary" type="submit">
											{{ __('Удалить') }}
										</button>
									</form>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			@endif
		</div>



	</div>
	</div>
	<div class="flash-message"></div>
@endsection
