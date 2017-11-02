<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Players;
use App\Winners;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;

class PlayerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $winners = Winners::all();
        $player1 = Players::where('enabled',1)->where('period','Period1')->get();
        $player2 = Players::where('enabled',1)->where('period','Period2')->get();
        $player3 = Players::where('enabled',1)->where('period','Period3')->get();
        $player4 = Players::where('enabled',1)->where('period','Period4')->get();
        return View::make("Players")
            ->with('winners',$winners)
            ->with('players1',$player1)
            ->with('players2',$player2)
            ->with('players3',$player3)
            ->with('players4',$player4);

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

    public function destroy(Request $request, $id)
    {
        if($request->isMethod("POST")){
            $player = Players::find($id);
            $player->enabled       = 0;
            $player->save();
            Session::flash('message', 'Deleted successfully  !');
        }
        return Redirect::to('playersView');
    }
    public function DownloadExcel() {
        Excel::create('players', function($excel)
        {
            $excel->sheet('players', function($playersExcel) {
                $playersExcel->fromArray(Players::all(), null, 'A4', false, false);
            });
        })
            ->download('xls');
    }







}
