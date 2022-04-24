@extends('layouts.app-master')

@section('content')
    
    {{-- <h1 class="mb-3">Laravel 8 User Roles and Permissions Step by Step Tutorial - codeanddeploy.com</h1> --}}

    <div class="bg-light p-4 rounded">
        <h2>Tasks</h2>
        <div class="lead">
            Manage your Tasks here.
            <a href="{{ route('posts.create') }}" class="btn btn-primary btn-sm float-right">Add Task</a>
        </div>
        
        <div class="mt-2">
            @include('layouts.partials.messages')
        </div>

        <table class="table table-bordered">
          <tr>
             <th width="1%">No</th>
             <th>Task title</th>
            <th>Member name</th>
            <th>when finished display it as done please</th>
             <th width="3%" colspan="3">Action</th>
          </tr>
            @foreach ($posts as $key => $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>

                <td>
                          {{ $post->getUserName() }}
                </td>
                {{-- <form method="POST" action="{{ route('posts.complete') }}">
                @csrf
                
                                <input type="checkbox" 
                                name="is_done"
                                value="{{ old('is_done') }}"
                                >
                                <button type="submit" class="btn btn-primary">press when done</button>
                            </td>
                </form>
                 --}}

                 <td>

                  @if($post->is_done == 1)
                <div id="done">
                
                      <a href="{{route('reopen',['id' => $post->id])}}">re-Open</a>
                    {{-- <a href ={{url('/'.$post->id.'/complete')}} class="alaa">reopen</a> --}}
                   </td>
                </div>
                @else
                <div class="alaa">
          
                <a href="{{route('done',['id' => $post->id])}}">Done</a>

                    {{-- <a href ={{url('/'.$post->id.'/complete')}} class="alaa">done</a> --}}
                   </td>
                </div>
                @endif
                <td>
               
                    <a class="btn btn-info btn-sm" href="{{ route('posts.show', $post->id) }}">Show</a>
                </td>
                <td>
                    <a class="btn btn-primary btn-sm" href="{{ route('posts.edit', $post->id) }}">Edit</a>
                </td>
                <td>
                    {!! Form::open(['method' => 'DELETE','route' => ['posts.destroy', $post->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </table>

        <div class="d-flex">
            {!! $posts->links() !!}
        </div>

    </div>
@endsection