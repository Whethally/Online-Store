@extends('layouts.layout')
@extends('includes.header')
@extends('includes.footer')

@section('main')
	<x-main.main>

		<x-main.title>
			{!! $left = '<i class="fa-solid fa-box"></i>' !!}{{ __('Информация о товаре') }}
		</x-main.title>
		<x-main.content class="market-show">
			<x-main.block>
				<x-main.image>
					<img class="img-full" src="/images/{{ $market->image }}" alt="">
				</x-main.image>

				<x-main.content-items>
					<x-main.content-text>
						<x-main.name>
							{{ Str::limit($market->name, 26) }}

						</x-main.name>
						<x-main.description>
							{{ Str::limit($market->description, 1000) }}
						</x-main.description>
					</x-main.content-text>
					<x-main.price>
						{{ number_format($market->price, 0, ',', ' ') }}
					</x-main.price>
					<x-main.description>
						{{ __('Автор поста') }} : <a href="{{ route('profile.show', $market->user_id) }}">{{ $username }}</a>
					</x-main.description>
				</x-main.content-items>
			</x-main.block>
		</x-main.content>
	</x-main.main>
@endsection
