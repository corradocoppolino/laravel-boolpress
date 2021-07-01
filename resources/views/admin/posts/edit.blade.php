@extends('layouts.app')

@section('content')
    
    <div class="container">
        
        <h1>Modifica {{$post->title}}</h1>

        <div>

            <form action="{{ route('admin.posts.update',$post)}}" method="POST">
            
                @csrf
                @method('PATCH')

                <div>

                    <label for="title" class="label-control mt-3">Modifica il titolo</label>
                    <input type="text" name="title" id="title" value="{{ $post->title }}" class="form-control mb-3">

                    <label for="content" class="label-control">Modifica il contenuto</label>
                    <textarea type="text" name="content" id="content" class="form-control mb-3" rows="5">{{ $post->content }}</textarea>

                </div>

                <button type="submit" class="btn btn-info">INVIA</button>
            
            </form>

        </div>

    </div>
    
@endsection