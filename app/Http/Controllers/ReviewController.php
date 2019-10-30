<?php
namespace App\Http\Controllers;
use App\Http\Requests\ReviewRequest;
use App\Movie;
use App\Review;
use Illuminate\Http\Request;
class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($movie)
    {
//        $reviews = Review::where('movie_id', $movie)->get();
        if(\Gate::denies('admin')) {
            return 'go away, you are not admin';
        }
        if(\Gate::allows('admin')) {
            $movie   = Movie::findOrFail($movie);
            $reviews = $movie->reviews()->get();
            return view('reviews.index', compact('reviews', 'movie'));
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($movie)
    {
//        if(!auth()->check()){
////            return 'go away!';
//            return redirect(action('ReviewController@index', $movie));
//        }
        $movie = Movie::findOrFail($movie);
        return view('reviews.create', compact('movie'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store($movie, ReviewRequest $request)
    {
        // here comes validation
//        $this->validate($request, [
//            'value' => 'required|numeric|min:0|max:10',
//            'text'  => 'required|min:10|max:160'
//        ], [
//            'value.required' => 'Oh come on! You need to provide a rating!',
//            'text.required'  => 'awerqwer',
//            'value.numuric'  => 'You stupid! Don\'t you know rating MUST be a number?!'
//        ]);
        $review = new Review();
//        $review->user_id  = auth()->user()->id;
        $review->user_id  = auth()->id();
        $review->movie_id = $movie;
        $review->text     = $request->input('text');
        $review->rating   = $request->input('value');
        $review->save();
        return redirect(action('ReviewController@index', $movie));
    }
    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}