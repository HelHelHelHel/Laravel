@extends('layout')

@section('content')
    <h1>{{ $movie->name }}</h1>
    <p>{{ $movie->year }}</p>
   
   <ul>
       @foreach($movie->genres as $genre)
       <li>{{ $genre->name }}</li>
       @endforeach
   </ul>
   
   
    <div>
        <img style="width: 10rem" src="{{ $movie->poster_url }}" alt="">
    </div>

    <p>
        <a href="/movies">Back to list of movies</a>
    </p>

    <p>
        <a href="{{ url('/movies') }}">Back to list of movies</a>
    </p>
@can('admin')
    <p>
        <a href="{{ action('NewMovieController@index', $movie->id) }}">Reviews</a>
    </p>
@endcan
    <p>
        <a href="{{ route('movie_index') }}">Back to list of movies</a>
    </p>
@endsection