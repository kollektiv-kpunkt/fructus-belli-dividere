<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Supporter;
use Illuminate\Support\Facades\DB;

class AddTimeseriesEntry extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'supporters:log';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add a new entry to the timeseries table';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $supporters = Supporter::all();
        $supportersCount = $supporters->count();
        DB::table('timeseries')->insert([
            'count' => $supportersCount,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return Command::SUCCESS;
    }
}
