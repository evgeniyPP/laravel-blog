<form method={{ $method }} class="auth-form">
    {{ csrf_field() }}
    @foreach ($fields as $name => $field)
        {!! $errors->first($name, '<p class="help-block">:message</p>') !!}
        {!! $field !!}
    @endforeach
    <div class="form__btns">
        <button type="submit" class="btns__submit" name="login_form_submit">Зарегистрироваться</button>
    </div>
</form>