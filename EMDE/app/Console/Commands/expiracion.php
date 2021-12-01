<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class expiracion extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:expiracion';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = ' expiracion de usuario cada 5 min automaticamente ';

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
        $users = User::where('expiracion', 0) -> get(); //eso me vuelve muchas users

        foreach ($users as $user){
            
            $user ->  update(['expiracion' => 1]);

        }
        
    }
}
