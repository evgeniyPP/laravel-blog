<h2>Добавить пост</h2>
<form method={{ $method }} enctype="multipart/form-data">
    {{ csrf_field() }}
    @foreach ($fields as $name => $field)
    {!! $errors->first($name, '<p class="help-block">:message</p>') !!}
    {!! $field !!}
    @endforeach
    <button type="submit">Добавить</button>
</form>