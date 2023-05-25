<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Supporter;

class ResendVerificationEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'supporters:resend-verification-emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Resend verification emails to supporters who have not verified their email address, are older than 24 hours and haven\'t received two emails yet.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $supporters = Supporter::where('email_verified_at', null)
            ->where('created_at', '<', now()->subHours(12))
            ->where('verification_email_count', '<', 2)
            ->get();
        foreach ($supporters as $supporter) {
            $supporter->sendEmailVerificationNotification();
            $supporter->verification_email_count++;
            $supporter->save();
        }
        return Command::SUCCESS;
    }
}
