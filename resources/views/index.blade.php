@extends('layout')

@section ('content')
    <h1><?= $headline ?></h1>
    <p>
    Today is <?=$date ?></p>

    <p>
    <?php if($admin) : ?>
    My master <?php else : ?>
    you are not an administrator
<?php endif; ?>
    </p>

@endsection