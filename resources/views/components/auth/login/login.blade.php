<x-auth.form-blocks>
	<x-auth.form-title>
		{{ __('Авторизация') }}
	</x-auth.form-title>
	<x-auth.form-items>
		<x-auth.form action="{{ route('login.store') }}" method="POST">
			<x-auth.form-item>
				<x-auth.label>{{ __('Логин') }}</x-auth.label>
				<x-auth.input name="login" id="login" />
			</x-auth.form-item>
			<x-auth.form-item>
				<x-auth.label>{{ __('Пароль') }}</x-auth.label>
				<x-auth.input name="password" id="password" type="password" />
			</x-auth.form-item>
			<x-auth.form-item>
				<x-auth.checkbox name="agreement">
					{{ __('Запоминить') }}
				</x-auth.checkbox>
			</x-auth.form-item>
			<x-auth.form-item>
				<x-auth.button type="submit">{{ __('Отправить') }}</x-auth.button>
			</x-auth.form-item>
			<x-auth.form-item>
				<div class="reg-auth">
					<a class="text-info" href="{{ url('register') }}">{{ __('У вас нет аккаунта?') }}</a>
				</div>
			</x-auth.form-item>
		</x-auth.form>
	</x-auth.form-items>
</x-auth.form-blocks>
