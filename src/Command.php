<?php

namespace App\Console\Commands;

use \Illuminate\Console\Command;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a user';

    /**
     * Create a new command instance.
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
        $class = config(
            'auth.providers.' . config(
                'auth.guards.' . config(
                    'auth.defaults.guard'
                ) . '.provider'
            ) . '.model'
        );
        $user = new $class;
        $fillables = $user->getFillable();
        foreach($fillables as $key => $fillable) {
            if ($fillable == 'password') {
                $user->password = \Hash::make($this->secret(($key+1) . "/" . count($fillables) . " User $fillable"));
            } else {
                $user->$fillable = $this->ask(($key+1) . "/" . count($fillables) . " User $fillable");
            }
        }
        if ($this->confirm("Do you want to create the user?", true)) {
            $user->save();
            $this->info("User created (id: {$user->id})");
        }

        return true;
    }
}
