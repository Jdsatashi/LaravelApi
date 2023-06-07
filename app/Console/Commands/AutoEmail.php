<?php

namespace App\Console\Commands;

use App\Jobs\SendEmailJob;
use App\Mail\MailNotify;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class AutoEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:auto';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    public function handle()
    {
        Mail::to('jdsatashi@gmail.com')->send(new MailNotify(null));
    }
}
