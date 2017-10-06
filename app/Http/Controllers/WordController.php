<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Word;

use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Contracts\Support\MessageBag;


class WordController extends Controller
{
    public function index()
    {

        $word = Word::all();
        return View::make("word.index")
            ->with('word', $word);

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
