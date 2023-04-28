<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use \Carbon\Carbon;
use App\Models\HouseRent;
use \Exception;

class DemoCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
        try {
            $house_rent = HouseRent::whereMonth(
                'date',
                '=',
                Carbon::now()->subMonth()->month
            )->get();

            foreach ($house_rent as $data) {
                HouseRent::create(
                    [
                        'house_id' => $data['house_id'], 'rent' => $data['rent'] + $data['baki'],
                        'baki' => $data['rent'] + $data['baki'], 'date' => Carbon::now()
                    ]
                );
            }
            \Log::info("cron run successfully in KWV Business.");
        } catch (Exception $e) {
            \Log::info($e);
        };
        // dd($house_rent);
    }
}
