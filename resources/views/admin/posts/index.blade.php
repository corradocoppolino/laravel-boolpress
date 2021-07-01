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

    </div>
    
@endsection