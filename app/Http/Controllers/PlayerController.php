<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Players;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
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
        return View::make("Players")
            ->with('players',$player);

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


    public function show($id)
    {

        $player = Players::find($id);

        return View::make('showPlayer')
            ->with('player', $player);
    }

    public function destroy($id)
    {
        $player = Players::find($id);
        $player->enabled       = 0;
        $player->save();
        Session::flash('message', 'Deleted successfully  !');
        return Redirect::to('playersView');
    }







}
