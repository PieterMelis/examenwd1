<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Period;
use App\Players;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {


    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function playerView()
    {
        return view('playerView');
    }
    public function store(Request $req)
    {
        $time= date('Y-m-d');
        $periods=Period::all();
        $rules = array(
            'name'       => 'required|max:50',
            'email'      => 'required|email|unique:players|max:50',
            'adress'     => 'required|max:50' ,
            'city'       => 'required|max:50',
            'word'       => 'required|max:50'
        );
        $validator = Validator::make(Input::all(), $rules);


        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator);
        } else {


            foreach ($periods as $key => $value) {
                if ($value->startdate <= $time && $time <= $value->enddate) {
                    $period = $value->periodname;
                }
            }
            $player = new Players();
            $player->name       = Input::get('name');
            $player->email      = Input::get('email');
            $player->adress     = Input::get('adress');
            $player->city       = Input::get('city');
            $player->word       = Input::get('word');
            $player->enabled    = 1;
            $player->period     = $period;
            $player->ip_adress  = $req->ip();
            $player->save();
        }
        Session::flash('message', 'Dank u voor het meedoen');
        return Redirect::back();;
    }















}
