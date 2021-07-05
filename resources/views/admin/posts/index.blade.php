@extends('layouts.app')

@section('content')
    
    <div class="container">
        
        <h1>I miei Post</h1>

        @if (@session('deleted'))
          
        <div class="alert alert-danger" role="alert">
          <strong>{{ session('deleted') }}</strong> è stato eliminato correttamente
        </div>

        @endif

        <table class="table table-dark">
            <thead>
              <tr>
                <th>ID</th>
                <th>TITLE</th>
                <th colspan="3">ACTIONS</th>
              </tr>
            </thead>

            
            <tbody>
                
                @foreach ($posts as $post)
                <tr>
                  <th>{{$post->id}}</th>
                  <td>{{$post->title}}</td>
                  <td>
                      @if ($post->category)
                        {{$post->category->name}}
                      @else
                        -----
                      @endif
                  </td>
                  <td><a class="btn btn-info" href="{{route('admin.posts.show', $post)}}">SHOW</a></td>
                  <td><a class="btn btn-info" href="{{route('admin.posts.edit', $post)}}">EDIT</a></td>
                  <td>
                      <form action="{{ route('admin.posts.destroy',$post) }}" method="POST">
                      
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">DELETE</button>

                      </form>
                  </td>
                </tr>
                @endforeach
                
            </tbody>

          </table>

          @foreach($categories as $category)
            <h3>{{ $category->name }}</h3>
            <ul>
                @forelse ($category->posts as $post_category)
                    {{-- qui viene stampato quello che trovo --}}
                    <li>{{ $post_category->title }}</li>
                @empty
                    {{-- se non trovo nulla stampo quello che metto qui --}}
                    <li>nessun post presente</li>
                @endforelse
            </ul>
          @endforeach

    </div>
    
@endsection