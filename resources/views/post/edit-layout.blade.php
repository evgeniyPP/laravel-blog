<h2>Редактировать пост</h2>
<form method={{ $method }}>
    {{ csrf_field() }}
    @foreach ($fields as $name => $field)
        {!! $errors->first($name, '<p class="help-block">:message</p>') !!}
        {!! $field !!}
    @endforeach
    <button type="submit">Изменить</button>
</form>