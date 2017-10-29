<?php

namespace App\Console\Commands;

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
