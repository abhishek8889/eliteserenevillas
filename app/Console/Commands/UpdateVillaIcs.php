<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use App\Models\User;


class UpdateVillaIcs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'updatevillaics:cron';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        // $message = "hello for update ics cron job";
        // Log::info($message);
        // \Log::info("Testing Cron is Running ... !");
        // $user = new User();
        // $user->name = 'something';
        // $user->is_admin = 0;
        // $user->password = 'asdfadfadfdgdasfg';
        // $user->email = 'tesnew3@gmail.com';
        // $user->save();
        // return Command::SUCCESS;
    }
}
