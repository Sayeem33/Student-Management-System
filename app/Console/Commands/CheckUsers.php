<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class CheckUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check all users and their admin status';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::all();
        
        $this->info('Total users: ' . $users->count());
        $this->line('');
        
        foreach ($users as $user) {
            $this->line('Email: ' . $user->email . ' | Admin: ' . ($user->is_admin ? 'YES' : 'NO'));
        }
        
        return 0;
    }
}
