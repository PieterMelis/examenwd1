<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
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

    public function wedstrijd()
    {

        return view('wedstrijd');
    }
    public function win()
    {
        return view('win');
    }
    public function user_dashboard()
    {
        return view('user_dashboard');
    }
    public function playerView()
    {
        return view('playerView');
    }
















}
