@extends('layouts.app')

@section('content')
    
    <div class="container">
        
        <h1>Nuovo post</h1>

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

            <form action="{{ route('admin.posts.store') }}" method="POST">
            
                @csrf
                @method('POST')

                <div>

                    <div class="mb-3">
                        <label for="title" class="label-control mt-3">Modifica il titolo</label>
                        <input type="text" value="{{old('title')}}" name="title" id="title" class="form-control @error('title') is-invalid @enderror">
                        
                        @error('title')
                            <div class="text-danger mb-3">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="content" class="label-control">Modifica il contenuto</label>
                        <textarea  type="text" name="content" id="content" class="form-control @error('content') is-invalid @enderror" rows="5">{{old('content')}}</textarea>
                        @error('content')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="label-control" for="category_id">Categoria</label>
                        <select class="form-control" name="category_id" id="category_id" name="category_id"  @error('category_id') is-invalid @enderror>
                            <option value="">Seleziona una categoria</option>
                            @foreach ($categories as $element)
                                <option @if (old('category_id') == $category->id) selected @endif value="{{$element->id}}">{{$element->name}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="text-danger mb-3">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-info">INVIA</button>
            
            </form>

        </div>

    </div>
    
@endsection