<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel POST request</title>
</head>
<body>
 
    <form action="{{ action('ApiController@handleForm') }}" method="post">
        @csrf
 
        <input type="text" name="search" value="">
        <input type="submit" value="send">
    </form>
 
</body>
</html>