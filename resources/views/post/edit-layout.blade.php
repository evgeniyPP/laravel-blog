<h2>Редактировать пост</h2>
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
    {!!html_entity_decode($field)!!}
    @endforeach
    <button type="submit">Изменить</button>
</form>