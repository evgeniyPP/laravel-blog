<h2>Добавить пост</h2>
<form method={{ $method }}>
    {{ csrf_field() }}
    @if (isset($errors) && !empty($errors))
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    @foreach ($fields as $field)
    {!!$field!!}
    @endforeach
    <button type="submit">Добавить</button>
</form>