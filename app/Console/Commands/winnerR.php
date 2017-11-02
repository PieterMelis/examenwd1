<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Mail;
use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Period;
use App\Players;
use App\Winners;
use App\Question;
class winnerR extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pickRandom:winnerR';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pick random a winner!!!!';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $answer=Question::where('id',1)->get();
        $periods=Period::all();
        $today = date('Y-m-d');
        foreach ($periods as $key => $value)
        {
            if($today == $value->enddate) {
                foreach ($answer as $key => $answers) {
                    $period = $value->periodname;
                    $OneAnswer = $answers->answer;
                    $endWinner = Players::where('enabled', 1)
                        ->where('period', $period)
                        ->where('word', $OneAnswer)
                        ->orderByRaw("RAND()")
                        ->first();


                    $winner = new Winners();
                    $winner['player'] = $endWinner['name'];
                    $winner['period'] = $period;
                    $winner->save();

                    Mail::raw("The winner of ". $period ." is ". $endWinner['name'], function($message)
                    {
                        $message->subject('Winner of the period' );

                        $message->from('volvo@pietermelis.com', 'Laravel');

                        $message->to('pietermelis123@gmail.com');
                    });
                }

            }
        }
    }
}
