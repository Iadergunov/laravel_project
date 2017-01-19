<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('body', 'Body:') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>
<!-- Multiple select field-->
<div class="form-group">
    {!! Form::label('tagList', 'Tags:') !!}
    {!! Form::select('tagList[]', $tags, null, ['id' => 'tagList' ,'class' => 'form-control', 'multiple']) !!}
</div>

<div class="form-group">
    {!! Form::label('published_at', 'Publish on:') !!}
    {!! Form::input('date', 'published_at', date('Y-m-d'), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($Submit_button_text, ['class' => '"btn btn-primary form-control']) !!}
</div>

@section('footer')
    <script>
        $('#tagList').select2({
            placeholder: 'Choose a tag'
        });
    </script>
@endsection
