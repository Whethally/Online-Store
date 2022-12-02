<x-auth.form action="{{ route('market') }}" method="get">
	<div class="main-filters">
		<x-main.title>
			{!! $left = '<i class="fa-solid fa-filter"></i>' !!}{{ __('Поиск') }}
		</x-main.title>
		{{-- @if ($market->isEmpty())
            {{ __('Нет ни одного товара.') }}
        @else --}}
		<div class="filters-items">
			<div class="mb-3">
				<x-auth.input name="search" value="{{ request('search') }}" placeholder="{{ __('Поиск') }}"></x-auth.input>
			</div>
			<div class="filter-item form-control">
				<div class="filter-item-title">
					{{ __('Категория') }}
				</div>
				<div class="filter-item-content">
					<select class="form-control" name="category" value="{{ request('category') }}">
						<option value="">{{ __('Все') }}</option>
						@foreach ($categories as $category)
							<option {{ $category->id == request('category') ? 'selected' : '' }} value="{{ $category->id }}">
								{{ $category->name }}</option>
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
