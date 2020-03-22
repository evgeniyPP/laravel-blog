<form method={{ $method }} class="auth-form login-form">
    {{ csrf_field() }}
    @foreach ($fields as $name => $field)
        {!! $errors->first($name, '<p class="help-block">:message</p>') !!}
        {!! $field !!}
    @endforeach
    <div class="form__btns">
        <button type="submit" class="btns__submit" name="login_form_submit">Войти</button>
        <a href={{ route('auth.signup_get') }} class="btns__links">Зарегистрироваться</a>
    </div>
</form>