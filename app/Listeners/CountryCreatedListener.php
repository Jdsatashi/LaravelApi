<?php

namespace App\Listeners;

use App\Events\CountryCreated;
use App\Jobs\SendEmailJob;
use App\Mail\MailNotify;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class CountryCreatedListener
{

    public function __construct()
    {
        //
    }

    public function handle(CountryCreated $event)
    {
        $country = $event->country;
        SendEmailJob::dispatch($country)->delay(now()->addSeconds(10));
    }
}
