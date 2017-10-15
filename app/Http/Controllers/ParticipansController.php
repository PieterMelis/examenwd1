<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Player;
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

        $player = Player::where('enabled',1)->get();
        return view("wedstrijd")->with('Players',$player);

    }
    public function create()
    {
        return View::make('word.create');
    }

    public function store()
    {
        $rules = array(
            'name'       => 'required',
            'email'      => 'required|email|unique:Players',
            'adress'     => 'required' ,
            'city'       => 'required',
            'word'       => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);


        if ($validator->fails()) {
            return Redirect::to('wedstrijd')
                ->withErrors($validator);
        } else {
            $player             = new Player();
            $player->name       = Input::get('name');
            $player->email      = Input::get('email');
            $player->adress     = Input::get('adress');
            $player->city       = Input::get('city');
            $player->word       = Input::get('word');
            $player->ip         = Request::ip();
            $player->save();


            Session::flash('message', 'Dank u voor het meedoen');
            return Redirect::to('word');
        }
    }








}
