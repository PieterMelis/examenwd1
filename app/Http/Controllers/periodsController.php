<?php

namespace App\Http\Controllers;
use App\Period;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class periodsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $periods = Period::all();
        return view("allPeriods")->with('periods',$periods);
    }
    public function edit($id)
    {
        $period = Period::find($id);
        return view("editPeriod")->with('period', $period);
    }
    public function update($id)
    {

        $rules = array(
            'periodname'      => 'required',
            'startdate'      => 'required|date',
            'enddate'     => 'required|date' ,
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('period/'. $id .'/edit')
                ->withErrors($validator)
                ->withInput();
        } else {

            $time_start = strtotime(Input::get('startdate'));
            $time_end = strtotime(Input::get('enddate'));
            $startdate = date('Y-m-d',$time_start);
            $enddate = date('Y-m-d',$time_end);

            $period                 = Period::find($id);
            $period->periodname     = Input::get('periodname');
            $period->startdate      = $startdate;
            $period->enddate        = $enddate;
            $period->save();

            Session::flash('message', ' added');
            return Redirect::back();
        }
    }
}
