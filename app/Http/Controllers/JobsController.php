<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Jobs\TestJob;
use App\Jobs\EmailJob;
use App\Mail\TestEmail;
use App\User;


class JobsController extends Controller
{
    public function setJob($userId)
    {
        $user = User::findOrFail($userId);
        TestJob::dispatch($user);
    }

    public function sendEmail()
    {
        //Mail::queue((new TestEmail())->onConnection('EmailJob')->onQueue('emails'));
        EmailJob::dispatch()->onQueue('emails');
    }
}
