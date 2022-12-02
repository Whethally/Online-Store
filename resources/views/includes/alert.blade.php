@if ($alert = session()->pull('alert'))
	<div x-data="{ showMessage: true }" x-show="showMessage" x-on:click="showMessage = false" class="alert" x-transition
		x-init="setTimeout(() => showMessage = false, 7000)">
		<i class="fa-solid fa-circle-exclamation"></i> {{ $alert }}
	</div>
@endif
@if ($alert = session()->pull('danger'))
	<div x-data="{ showMessage: true }" x-show="showMessage" x-on:click="showMessage = false" class="alert danger" x-transition
		x-init="setTimeout(() => showMessage = false, 7000)">
		<i class="fa-solid fa-circle-exclamation"></i> {{ $alert }}
	</div>
@endif
@if ($alert = session()->pull('success'))
	<div x-data="{ showMessage: true }" x-show="showMessage" x-on:click="showMessage = false" class="alert success" x-transition
		x-init="setTimeout(() => showMessage = false, 7000)">
		<i class="fa-solid fa-circle-exclamation"></i> {{ $alert }}
	</div>
@endif
@if ($alert = session()->pull('warning'))
	<div x-data="{ showMessage: true }" x-show="showMessage" x-on:click="showMessage = false" class="alert warning" x-transition
		x-init="setTimeout(() => showMessage = false, 7000)">
		<i class="fa-solid fa-circle-exclamation"></i> {{ $alert }}
	</div>
@endif
{{-- @if ($alert = session()->pull('alert'))
	<div class="alert alert-success mb-0 rounded-0 text-center small py-2" x-data="{ showMessage: true }" x-show="showMessage"
		x-init="setTimeout(() => showMessage = false, 7000)">
		{{ $alert }}
	</div>
@endif --}}
{{-- @if ($alert = session()->pull('alert-danger'))
	<div class="alert alert-danger mb-0 rounded-0 text-center small py-2" x-data="{ showMessage: true }" x-show="showMessage"
		x-init="setTimeout(() => showMessage = false, 7000)">
		{{ $alert }}
	</div>
@endif --}}
