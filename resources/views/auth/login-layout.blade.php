<form method={{ $method }} class="auth-form login-form">
    {{ csrf_field() }}
    @if (isset($errors) && !empty($errors))
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    @foreach ($fields as $field)
        {!! $field !!}
    @endforeach
    <div class="form__btns">
        <button type="submit" class="btns__submit" name="login_form_submit">Войти</button>
        <a href={{ route('auth.signup_get') }} class="btns__links">Зарегистрироваться</a>
    </div>
</form>