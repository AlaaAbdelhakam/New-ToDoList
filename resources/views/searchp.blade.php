{{-- <!DOCTYPE html>
<html>
<head>
<meta name="_token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
</head>
<body>--}}
{{-- @extends('layouts.app-master')
@section('content')
@foreach($posts as $post)
    <article>
        <h1>{{$post->title}}</h1>
        <h6><i class="far fa-clock"></i> {{$post->created_at}} </h6>
        <h6><span class="badge badge-secondary">{{$post->description}}</span></h6>
        {{-- <img src="{{asset($post->img)}}" alt="this is hack img"> --}}
        <!-- <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Error est totam, inventore, neque voluptate hic illo eius, exercitationem nesciunt atque doloribus et suscipit reprehenderit quasi quae numquam esse distinctio ullam!</p> -->
        <div class="mt-3 pt-3">
            <a class="btn btn-primary" href="{{route('posts.show',['post' => $post->id])}}">Show</a>        </div>
        <hr>
    </article>
@endforeach
@endsection --}}

{{-- </body>
</html> --}}