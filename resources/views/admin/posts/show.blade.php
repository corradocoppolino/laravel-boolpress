@extends('layouts.app')

@section('content')
    
    <div class="container">
        
        <h1>{{ $post->title}} </h1>

        <h5>

            Categoria:

            @if ($post->category)
                {{$post->category->name}}
            @else
                nessuna categoria
            @endif

        </h5>

        <div>
            @foreach ($post->tags as $tag)
                <span class="badge badge-primary">{{$tag->name}}</span>
            @endforeach
        </div>

        <p>{{ $post->content}}</p>

        <div>
            <a class="btn btn-info"href="{{route('admin.posts.edit',$post)}}">MODIFICA</a>
        </div>

    </div>
    
@endsection