<?php

namespace App\Jobs;
use App\Notifications\sendNotificcation;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Mail\Email as CustomMail;
use Mail;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $email;
   
    public function __construct($email)
    {
        $this->email = $email;
        // $this->name  = $name;
        // $this->emp_mail =  $emp_mail;


    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {   
      
       $content = new CustomMail();        
        Mail::to($this->email,$this->name)->send($content);

        
    }
}
