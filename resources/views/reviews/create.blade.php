@extends('layout')
@section('content')

<h1>create a new review for {{ $movie->name }}</h1>

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ action('ReviewController@store', $movie->id)}}" method="post">
    @csrf
<div style="{{ $errors->has('value') ? 'background: red' : ''}}">
    <label for="value">value</label>
    <input name="value" type="number" value="{{ old('value') }}">
    {{ $errors->first('value')}}
</div>
<div style="{{ $errors->has('text') ? 'background: lightblue' : ''}}">
    <label for="text">text</label>
    <textarea name="text">{{ old('text') }}</textarea>
    {{ $errors->first('text')}}
</div>
<button type="submit">create</button>

</form>
@endsection