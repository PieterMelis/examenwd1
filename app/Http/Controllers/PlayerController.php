<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Players;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class PlayerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $player = Players::where('enabled',1)->get();
        return view("wedstrijd")->with('Players',$player);

    }
    public function indexPlayer()
    {
        $player = Players::all();
        return View::make("Players")
            ->with('players', $player);

    }
    public function create()
    {
        return View::make('questions.create');
    }

    public function store(Request $req)
    {

        $rules = array(
            'name'       => 'required',
            'email'      => 'required|email|unique:players',
            'adress'     => 'required' ,
            'city'       => 'required',
            'word'       => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);


        if ($validator->fails()) {
            return Redirect::to('wedstrijd')
                ->withErrors($validator);
        } else {
            $player = new Players();
            $player->name = Input::get('name');
            $player->email = Input::get('email');
            $player->adress = Input::get('adress');
            $player->city = Input::get('city');
            $player->word = Input::get('word');
            $player->enabled = true;
            $player->ip_adress = $req->ip();
        }
            $player->save();



            Session::flash('message', 'Dank u voor het meedoen');
            return Redirect::to('home');
    }
    public function show($id)
    {

        $player = Players::find($id);

        return View::make('Player')
            ->with('players', $player);
    }








}
