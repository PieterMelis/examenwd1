<?php

namespace App\Http\Controllers;
use App\Question;
use App\Players;
use App\Winner;
use App\Period;
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

    public function viewWinners()
    {
        $winners = Players::where('enabled',1)->where('word','sweden')->inRandomOrder()->first();

            $winner = new Winner();
            $winner->player = $winners->name;
            $winner->period = 2017;
            $winner->save();

        return View::make("winner")
            ->with('players',$winner);
    }
}

