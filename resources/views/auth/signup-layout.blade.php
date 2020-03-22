<form method={{ $method }} class="auth-form">
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
        <button type="submit" class="btns__submit" name="login_form_submit">Зарегистрироваться</button>
    </div>
</form>