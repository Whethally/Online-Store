@extends('market.layout')
@extends('market.header')
@extends('market.footer')

@section('main')
	<div class="main-info">
		<div class="info">
			<div class="info-title">Корзина</div>
			<div class="info-items">
				<div class="info-block">
					<div class="info-img">
						<img src="" alt="Img">
					</div>

					<div class="info-text">
						<div class="info-name">Name</div>
						<div class="info-desc">Desc</div>
					</div>

				</div>
			</div>
			<div class="info-button">
				<input type="submit" value="Отправить">
			</div>
		</div>
		<div class="info">
			<div class="info-title">Список желаемого</div>
			<div class="info-items">
				<div class="info-block">
					<div class="info-img">
						<img src="" alt="Img">
					</div>

					<div class="info-text">
						<div class="info-name">Name</div>
						<div class="info-desc">Desc</div>
					</div>

				</div>
			</div>
		</div>
	</div>
@endsection
