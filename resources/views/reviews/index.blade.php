@extends ('layout')
@section ('content')

    <h1>Reviews of {{ $movie->name}}</h1>
        
    @if($reviews->count() == 0)
        <p>no reviews yet</p>
    @else 
        @foreach($reviews as $review)
            <h3>{{ $review->rating}}</h3>
            <p>{{ $review->text}}</p>
            @if($review->user)
            <p>made with love by {{ $review->user->name }}</p>
            @endif
        @endforeach  
    @endif
        
    {{-- @if(auth()->check() && \Gate::allows('create_review', $movie))
    <a href="{{ action('ReviewController@create', $movie->id) }}">create a review</a> 
    @endif --}}

    @can('create_review')
    <a href="{{ action('ReviewController@create', $movie->id) }}">create a review</a> 
    @endcan
   
    <a href="{{ action('NewMovieController@show', $movie->id) }}">Back</a> 
    
    
@endsection