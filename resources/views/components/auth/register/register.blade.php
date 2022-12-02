<x-auth.form-blocks>
	<x-auth.form-title>
		{{ __('Регистрация') }}
	</x-auth.form-title>
	<x-auth.form-items>
		<x-auth.form action="{{ route('register.store') }}" method="POST">
			<x-auth.form-item>
				<x-auth.label required>{{ __('Имя') }}</x-auth.label>
				<x-auth.input name="name" id="name" />
			</x-auth.form-item>
			<x-auth.form-item>
				<x-auth.label required>{{ __('Фамилия') }}</x-auth.label>
				<x-auth.input name="surname" id="surname" />
			</x-auth.form-item>
			<x-auth.form-item>
				<x-auth.label>{{ __('Отчество') }}</x-auth.label>
				<x-auth.input name="patronymic" id="patronymic" />
			</x-auth.form-item>
			<x-auth.form-item>
				<x-auth.label required>{{ __('Логин') }}</x-auth.label>
				<x-auth.input name="login" id="login" />
			</x-auth.form-item>
			<x-auth.form-item>
				<x-auth.label required>{{ __('Почта') }}</x-auth.label>
				<x-auth.input name="email" id="email" />
			</x-auth.form-item>
			<div class="form-password">
				<x-auth.form-item>
					<x-auth.label required>{{ __('Пароль') }}</x-auth.label>
					<x-auth.input name="password" id="password" type="password" />
				</x-auth.form-item>
				<x-auth.form-item>
					<x-auth.label required>{{ __('Повторите пароль') }}</x-auth.label>
					<x-auth.input name="password_confirmation" id="password_confirm" type="password" />
				</x-auth.form-item>
			</div>
			<x-auth.form-item>
				<x-auth.checkbox name="agreement">
					{{ __('Я согласен на обработку пользовательских данных') }}
				</x-auth.checkbox>

			</x-auth.form-item>
			<x-auth.form-item>
				<x-auth.button type="submit">{{ __('Отправить') }}</x-auth.button>
			</x-auth.form-item>
			<x-auth.form-item>
				<div class="reg-auth">
					<a class="text-info" href="{{ url('login') }}">{{ __('У вас есть аккаунт?') }}</a>
				</div>
			</x-auth.form-item>
		</x-auth.form>
	</x-auth.form-items>
</x-auth.form-blocks>
