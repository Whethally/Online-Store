@extends('market.layout')

@extends('market.header')

@section('main')
	<div class="main-admin">
		<div class="admin-panel">
			<div class="info-title"><i class="fa-solid fa-circle-info"></i>Данные о товаре</div>
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
		<div class="admin-panel">
			<div class="info-title"><i class="fa-solid fa-grip"></i>Категории товаров</div>
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
		<div class="admin-panel">
			<div class="info-title"><i class="fa-solid fa-flag-usa"></i>Заказы и их статусы</div>
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
	</div>
@endsection
