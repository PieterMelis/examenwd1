<?php

namespace App\Http\Controllers;
use App\Question;
use App\Players;
use App\Winners;
use App\Period;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class questionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $question = Question::all();
        return View::make("question")
            ->with('question', $question);
    }

    public function questionView()
    {
        $question = Question::all();
        return View::make("wedstrijd")
            ->with('question', $question);
    }

    public function viewWinner()
    {
        $winner = Winners::all();

        return View::make("welcome")
            ->with('winner', $winner);
    }

    public function update(Request $request, $id)
    {
        $rules = array(
            'question'      => 'required',
            'answer'      => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        } else {

            $question               = Question::find($id);
            $question->question     = Input::get('question');
            $question->answer       = Input::get('answer');
            $question->save();

            Session::flash('message', ' added');
            return Redirect::back();
        }
    }

    public function makeWinners()
    {

        $periods=Period::all();
        $today = Carbon::today();
        foreach ($periods as $key => $value)
        {
            if($today->toDateString() == $value->enddate) {
                $period = $value->periodname;

                $endWinner = Players::where('enabled',1)->where('word', 'Sweden')->where('period', $period);

                        $nowWinner = $endWinner->orderByRaw("RAND()")
                            ->take(1)
                            ->get()
                            ->first();


                        $winner = new Winners();
                        $winner['player'] = $nowWinner['name'];
                        $winner->period = $period;
                        $winner->save();



            }
        }
    }

}

