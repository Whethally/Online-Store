<div class="main-title">
	{{-- <i class="fa-solid fa-box"></i> --}}
	@isset($left)
		<div>
			{{ $left }}
		</div>
	@endisset
	{{ $slot }}
</div>
