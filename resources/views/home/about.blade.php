@extends('layouts.layout')
@extends('includes.header')
@extends('includes.footer')

@section('main')
	<div class="main">
		<div class="main-item">
			<div class="main-filters">
				<div class="filters-title">
					<i class="fa-solid fa-address-card"></i>{{ __('Наши контакты') }}
				</div>
				<div class="filters-items">
					<div class="filters-block">?</div>
					<div class="filters-block">?</div>
					<div class="filters-block">?</div>
					<div class="filters-block">?</div>
					<div class="filters-block">?</div>
				</div>
			</div>
			<div class="main-maps">
				<div class="maps-title">
					<i class="fa-solid fa-map-pin"></i> {{ __('Карта') }}
				</div>
				<iframe
					src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2303.9343333979455!2d55.96836561575093!3d54.72836987799595!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x43d93b1cbbd6c60f%3A0x62b1dd12a3728852!2sUksivt!5e0!3m2!1sen!2sru!4v1663069284622!5m2!1sen!2sru"
					width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
					referrerpolicy="no-referrer-when-downgrade"></iframe>
			</div>
		</div>
		<div class="main-contacts">
			<x-auth.form-title>
				{{ __('Свяжись с нами') }}
			</x-auth.form-title>

			<x-auth.form-items action="" method="POST">
				<x-auth.form-item>
					<x-auth.label>{{ __('Имя') }}</x-auth.label>
					<x-auth.input type="name" name="name" id="name" />
				</x-auth.form-item>
				<x-auth.form-item>
					<x-auth.label>{{ __('Email') }}</x-auth.label>
					<x-auth.input type="email" name="email" id="email" />
				</x-auth.form-item>
				<x-auth.form-item>
					<x-auth.label>{{ __('Телефон') }}</x-auth.label>
					<x-auth.input type="еуду" name="phone" id="phone" />
				</x-auth.form-item>
				<x-auth.form-item>
					<x-auth.label>{{ __('Сообщение') }}</x-auth.label>
					<x-auth.textarea name="message" id="message" />
				</x-auth.form-item>
				<x-auth.form-item>
					<x-auth.button>{{ __('Отправить') }}</x-auth.button>
				</x-auth.form-item>
			</x-auth.form-items>

		</div>



		{{-- <div class="main-maps">
			<div class="maps-title">
				<i class="fa-solid fa-map-pin"></i> {{__('Карта')}}
			</div>
			<iframe
				src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2303.9343333979455!2d55.96836561575093!3d54.72836987799595!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x43d93b1cbbd6c60f%3A0x62b1dd12a3728852!2sUksivt!5e0!3m2!1sen!2sru!4v1663069284622!5m2!1sen!2sru"
				width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
				referrerpolicy="no-referrer-when-downgrade"></iframe>
		</div> --}}
	</div>
@endsection
