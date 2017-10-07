<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParticipansController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $participants = Participant::where('enabled',1)->get();
        return view("participants")->with('participants',$participants);

    }
    public function create()
    {
        return View::make('word.create');
    }

    public function store()
    {
        $rules = array(
            'word'       => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);


        if ($validator->fails()) {
            return Redirect::to('word/create')
                ->withErrors($validator);
        } else {
            $word = new Word;
            $word->word       = Input::get('word');
            $word->save();


            Session::flash('message', 'Dank u voor het meedoen');
            return Redirect::to('word');
        }
    }
}
