<?php

namespace App\Http\Controllers;
use App\Question;
use App\Players;
use App\Winners;
use App\Period;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;


class questionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $question = Question::all();
        return View::make("question")
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
        $answer=Question::where('id',1)->get();
        $periods=Period::all();
        $today = date('Y-m-d');
        foreach ($periods as $key => $value)
        {
            if($today == $value->enddate) {
                foreach ($answer as $key => $answers){
                    $period = $value->periodname;
                    $OneAnswer = $answers->answer;
                    $endWinner = Players::where('enabled',1)
                        ->where('period', $period)
                        ->where('word', $OneAnswer)
                        ->orderByRaw("RAND()")
                        ->first();


                        $winner = new Winners();
                        $winner['player'] = $endWinner['name'];
                        $winner['period'] = $period;
                        $winner->save();
                    }
                Mail::raw('Sending emails with Mailgun and Laravel is easy!', function($message)
                {
                    $message->to('johndoe@gmail.com');
                });



                }

            }
        }


}

