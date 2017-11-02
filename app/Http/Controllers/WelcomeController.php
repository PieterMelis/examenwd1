<?php

namespace App\Http\Controllers;
use App\Question;

use App\Winners;
use Illuminate\Support\Facades\View;
use App\Period;

class WelcomeController extends Controller
{
    public function index(){

        return view('welcome');
    }
    public function viewWinner()
    {
        $winner = Winners::all();

        return View::make("welcome")
            ->with('winner', $winner);
    }
    public function questionView()
    {
        $periods=Period::all();
        $time= date('Y-m-d');
        $question = Question::all();
        foreach ($periods as $key => $value) {

            if ($value->startdate <= $time && $time <= $value->enddate) {

                $dTime=  $value->enddate;
                return View::make("wedstrijd")
                    ->with('question', $question)
                    ->with('dTime', $dTime);
            }elseif (!!$value->startdate <= $time && $time <= $value->enddate) {
                return view('noGame');
            }
        }
    }

}
