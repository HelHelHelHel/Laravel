@extends('layouts.app')

@section('content')
<h1>Create new person</h1>
<form method="post" action="{{ action('NewPersonController@store') }}">
    @csrf    
    <div class="form-group">
          <label for="exampleInputEmail1">name</label>
          <input type="name" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="name">
          
        </div>
        <div class="form-group">
          <label for="Photo1">Photo</label>
          <input type="photo" name="photo_url" class="form-control" id="photo" placeholder="photo">
        </div>
        <div class="form-group">
                <label for="biography">Bio</label>
                <input type="text" name="biography" class="form-control" id="biography" placeholder="bio">
        </div>
        <div class="form-group">
                <label for="profession">Profession</label>
                <select name="profession_id" id="profesion">
                    @foreach($professions as $profession)
                    <option value="{{ $profession->id }}" >{{ $profession->name }}</option>
                    @endforeach
                </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

      @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
@endsection