<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class Moviecontroller extends Controller
{
    public function index(Request $request)
    {
       $orderby = $request->input('orderby', 'name');
       if(!in_array($orderby, ['name', 'rating', 'year'])) {
           $orderby = 'name';
       }

       $orderway = $request->input('orderway', 'asc');
       $limit = $request->input('limit', 10);
       $page = max (1, $request->input('page', 1));
       $search = $request->input('search', null);
       $year = $request->input('year', null);
       $minrating = $request->input('minrating', null);
       
       
       // initialize the query builder
        $query = DB::table('movies');

        // modify the query builder
        $query->orderBy($orderby,  $orderway)
              ->limit($limit)
              ->offset($page * $limit - $limit);
        if ($search !== null) {
            $query->where('name', 'like', "%{$search}%");
        }
        if($year !== null) {
            $query->where('year', $year);
        }
        if($minrating !== null) {
            $query->where('rating','>=', $minrating);
        }

        // execute the query built by the query builder and get the result
        $movies = $query->get();

        return $movies;
    }

    public function show(Request $request) 
    {
        $id = $request->input('id');
        $movie = \App\Movie::find($id);
        $ratings =$movie->$ratings;
        return $ratings;
    }

    public function cast_and_crew(Request $request)
    {
        $id = $request->input('id');

        if($id === null) {
            return [];
        }

        //get person ids
        $people_ids = DB::table('movie_person')
            ->where('movie_id', $id)
            ->pluck('person_id');

        // use person ids to select people    
        $people = DB::table('people')
            ->whereIn('id', $people_ids)
            ->get();

        return $people;
       
    }
    
    
    //
    public function movies() 
    {
        // $query = "
        // SELECT *
        // FROM `movies`
        // WHERE `rating` > ?
        // ORDER BY `rating` DESC
        // LIMIT 10
        // ";

        // $query_builder = DB::table('movies');
        // $query_builder->limit(10);
        // $query_builder->orderBy('name', 'desc');
        // $query_builder->where('rating', '>', 8);

        // $movies = $query_builder->count();

        $movies = DB::table('movies')
            ->where('rating', '>', 8)
            ->orderBy('rating', 'desc')
            ->limit(10)
            ->get(); // this one has to be last, otherwise order does not matter

        //dd($movies);
        return $movies;
    }

    public function movie_of_the_week() 
    {
        $movie_id = 234;
 
        $movies = DB::table('movies')
            ->where('id', 234)
            
            ->first(); // this one has to be last, otherwise order does not matter

        // SELECT `genre_id`
        // FROM `genre_movie`
        // WHERE `movie_id` = 234

        $genre_ids = DB ::table('genre_movie')
           ->where('movie_id', $movies->id)
           ->pluck('genre_id');

        // SELECT *
        // FROM `genres`
        // WHERE `id` IN (1, 2, 3)
        $genres = DB::table('genres')
            ->whereIn('id', $genre_ids)
            ->pluck('name');

        $people_ids = DB::table('movie_person')
            ->where('movie_id', $movies->id)
            ->where('profession_id', 3)
            ->pluck('person_id');

        $people = DB::table('people')
            ->whereIn('id', $people_ids)
            ->limit(3)
            ->pluck('name');
       
            return [
            'movies'  => $movies,
            'genres' => $genres,
            'people' => $people,
        ];
    }

    public function show1(Request $request)
    {
        $id = $request->input('id');

        return \App\Movie::find($id);
    }

}
