<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class play extends Controller
{


  protected $redirectTo = '/home';

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('guest');
  }

  /**
   * Get a validator for an incoming registration request.
   *
   * @param  array  $data
   * @return \Illuminate\Contracts\Validation\Validator
   */
  protected function validator(array $data)
  {
      return Validator::make($data, [
          'word' => 'required|string|max:255',
      ]);
  }


  protected function create(array $data)
  {
      return word::create([
          'word' => $data['word']
      ]);
  }
}
