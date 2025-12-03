<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Pest\Support\Str;

class CreateUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create {--count=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new user in the system';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $count = (int) $this->option('count') ?? 1;
        $bar = $this->output->createProgressBar($count);
        $bar->start();
        for ($i = 1; $i <= $count; $i++) {
            $userName = Str::random(5);
            $userEmail = $userName . '@example.com';
            $userPassword = "password";
            User::create([
                'name' => $userName,
                'email' => $userEmail,
                'password' => bcrypt($userPassword),
            ]);
            // $this->info("User created: \n{$i}. Name: {$userName}\nEmail: {$userEmail}\nPassword: {$userPassword}");
            $bar->advance();
        }
        $bar->finish();
        $this->newLine();
        $this->info("Successfully created {$count} user(s).");

    }
}
