<?php

namespace App\Console\Commands;

use app\Mail\noticiaemail;
use app\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;


class noticias extends Command
 

{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'noticia:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Email para los usuario regitrados en la tienda';


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
        //$users = User::select('email') -> get();

        $emails = User::pluck('email')-> toArray();
        $data=['title' => 'programacio','body' => 'php'];
        foreach($emails as $email ) {
           Mail::to($email) ->send(new noticiaemail ($data));//como puedo  enviar un email a un usuario 

        }


    }
}
