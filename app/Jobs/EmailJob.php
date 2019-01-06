<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
//use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\TestEmail;
use App\Events\SendingEmail;

class EmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        event(new SendingEmail());
        //Mail::send(new TestEmail());
    }

    public function failed()
    {
        Log::channel('emails')->alert('Not sent!');
    }

    /*public function retryUntil()
    {
        return now()->addSecond(15);
    }*/
}
