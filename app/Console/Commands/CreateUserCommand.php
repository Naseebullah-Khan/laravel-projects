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
    protected $signature = 'user:create {--name=} {--email=} {--password=}';

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
        $userName = $this->option('name') ?? "Admin";
        $userEmail = $this->option('email') ?? "admin@hotmail.com";
        $userPassword = $this->option('password') ?? "password";
        User::create([
            'name' => $userName,
            'email' => $userEmail,
            'password' => bcrypt($userPassword),
        ]);

        $this->info("User created: \nName: {$userName}\nEmail: {$userEmail}\nPassword: {$userPassword}");
    }
}
