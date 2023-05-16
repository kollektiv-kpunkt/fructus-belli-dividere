<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Supporter;
use Illuminate\Support\Facades\DB;

class SupporterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Truncate supporters table
        Supporter::truncate();

        // Create a random number of supporters between 500 and 1000
        $supporters = Supporter::factory()->count(rand(500, 1000))->create();
    }
}
