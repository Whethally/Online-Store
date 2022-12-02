<div class="content-price">
	{{-- {{ number_format($post->price, 0, ',', ' ') }} {{ __('₽') }} --}}
	{{-- number format with slot component --}}

	{{ $slot }} {{ __('₽') }}
</div>
