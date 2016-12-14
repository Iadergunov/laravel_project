@extends('app')

@section('title')
    Articles
@stop

@section('content')
    <h1>Articles</h1>
    @foreach($articles as $article)
        <article>
            <h2><a href="{{action('Articles_controller@show_article', [$article->id])}}">{{ $article->title }}</a></h2>
        </article>
        <div class="body">
            <p>{{ $article->body }}</p>
        </div>
        <button class="fa fa-btn fa-trash">Delete article></button>
    @endforeach

@stop

@section('footer')
    <script>

        $('.fa-trash').on('click', function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "/articles/delete",
                data: {
                    id_article:{{$article->id}}
                }
            });
        });
    </script>
@stop