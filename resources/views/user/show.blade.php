@extends('layouts.layout')
@extends('includes.header')
@extends('includes.footer')

@section('main')
	<x-main.main>
		<x-main.title>
			{!! $left = '<i class="fa-solid fa-user"></i>' !!}{{ __('Информация о пользователе') }}
		</x-main.title>
		<x-main.block>
			<x-main.content-items>
				<x-main.block>
					<x-main.content-text>
						<x-main.name>
							{{ __('Имя') }}
						</x-main.name>
						<x-main.description>
							{{ $user->username }}
						</x-main.description>
					</x-main.content-text>
					<x-main.content-text>
						<x-main.name>
							{{ __('Дата регистрации') }}
						</x-main.name>
						<x-main.description>
							{{ $user->created_at->format('d M Y') }}
						</x-main.description>
					</x-main.content-text>
				</x-main.block>
			</x-main.content-items>
		</x-main.block>
	</x-main.main>
@endsection
