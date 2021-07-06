@extends('layouts.app')

@section('content')
    
    <div class="container">
        
        <h1>Modifica {{$post->title}}</h1>

        @if ($errors->any())
            
            <div class="alert alert-danger">

                <ul>

                    @foreach ($errors->all() as $error)
                        
                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <div>

            <form action="{{ route('admin.posts.update',$post)}}" method="POST">
            
                @csrf
                @method('PATCH')

                <div>

                    <label for="title" class="label-control mt-3">Modifica il titolo</label>
                    <input type="text" name="title" id="title" value="{{ old('title',$post->title) }}" class="form-control mb-3 @error('title') is-invalid @enderror">
                    @error('title')
                        <p class="text-danger"> {{ $message }} </p>
                    @enderror

                    <label for="content" class="label-control">Modifica il contenuto</label>
                    <textarea type="text" name="content" id="content" class="form-control mb-3 @error('title') is-invalid @enderror" rows="5">{{ old('content',$post->content) }}</textarea>
                    @error('content')
                        <p class="text-danger"> {{ $message }} </p>
                    @enderror

                    <label class="label-control" for="category_id">Categoria</label>
                    <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id" name="category_id">
                    <option value="">Seleziona una categoria</option>
                        @foreach ($categories as $category)
                            <option @if (old('category_id',$post->category_id) == $category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <div>
                        <h3>TAGS</h3>
                        @foreach ($tags as $tag)
                            <span class="d-inline-block mr-3">
                                <input type="checkbox" id="tag{{$loop->iteration}}" name="tags[]" value="{{ $tag->id }}" @if (in_array($tag->id,old('tags',[])) && $errors->any()) 
                                checked 
                                @elseif (!$errors->any() && $post->tags->contains($tag->id)) 
                                checked 
                                @endif>
                                <label for="tag{{$loop->iteration}}">{{$tag->name}}</label>
                            </span>
                        @endforeach
                    </div>

                </div>

                <button type="submit" class="btn btn-info">INVIA</button>
            
            </form>

        </div>

    </div>
    
@endsection