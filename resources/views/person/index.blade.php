@extends('layouts.app')

@section('content')
    <h1>Persons</h1>
    @foreach($persons as $person)
            <h2>
                <a href="{{ action('NewPersonController@show', $person->id) }}">
                {{ $person->name }}
            </h2>
            
            
        @endforeach 

        
 
{{ $persons-> links() }}

@endsection