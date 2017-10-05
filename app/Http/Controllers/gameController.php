<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class gameController extends Controller
{



    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'word' => 'required|string|max:255',
        ]);
    }


    public function create(Request $request)
          {
                $word= new Word();
                $word->word = $request->word;
                $word->save();

             return Redirect::back();
         }
}
