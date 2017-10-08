<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ParticipansController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $participants = Participant::All()->get();
        return view("participants")->with('participants',$participants);

    }
    public function create()
    {
        return View::make('word.create');
    }

    public function store()
    {
        $rules = array(
            'name'       => 'required',
            'email'      => 'required|email|unique:participants',
            'adress'     => 'required' ,
            'city'       => 'required',
            'word'       => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);


        if ($validator->fails()) {
            return Redirect::to('word/create')
                ->withErrors($validator);
        } else {
            $participant             = new Participant();
            $participant->name       = Input::get('name');
            $participant->email      = Input::get('email');
            $participant->adress     = Input::get('adress');
            $participant->city       = Input::get('city');
            $participant->word       = Input::get('word');
            $participant->ip         = Request::ip();
            $participant->save();


            Session::flash('message', 'Dank u voor het meedoen');
            return Redirect::to('word');
        }
    }








}
