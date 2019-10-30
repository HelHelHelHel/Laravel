<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\FavoriteMovie;

class FavoriteMovieController extends Controller
{
    //
    public function toggle(Request $request) 
    {
        $user_id = $request->input('user_id'); //t the value of the parameter user_id from the request and put it in a variable $user_id
        $movie_id = $request->input('movie_id');
        $favorite_movie = FavoriteMovie::where( 'user_id', $user_id )->where( 'movie_id', $movie_id )->first();

        if($favorite_movie === null)
        {
            $favorite_movie = new FavoriteMovie;
            $favorite_movie->user_id = $user_id;
            $favorite_movie->movie_id = $movie_id;
            $favorite_movie->save();
            //this means insert into `favorite_movies`(`user_id`, `movie_id`, `created_at`, `updated_at`) values(xyz)

            return [
                'status' => 'success',
                'message' => 'Movie was added to favorites',
                'data' => [
                    'favorite' => true
                ]
            ];
        } else {
            $favorite_movie->delete();

            return [
                'status' => 'success',
                'message' => 'Movie was removed from favorites',
                'data' => [
                    'favorite' => false
                ]
            ];
        }
        

    }

    public function status(Request $request) 
    {
        $user_id = $request->input('user_id'); //t the value of the parameter user_id from the request and put it in a variable $user_id
        $movie_id = $request->input('movie_id');
        //select* from `favorite_movies` where `user_id`=1 and `movie_id` = 488 limit 1- in the background done
        $favorite_movie = FavoriteMovie::where( 'user_id', $user_id )->where( 'movie_id', $movie_id )->first();
        if($favorite_movie === null) {
            return [
                'favorite' => false
            ];
        } else {
            return [
                'favorite' => true
            ];
        }

    }
}
